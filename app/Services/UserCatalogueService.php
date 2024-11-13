<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCatalogueService
 * @package App\Service
 */

class UserCatalogueService implements UserCatalogueServiceInterface
{

    protected $userCatalogueRepository;
    public function __construct(
        UserCatalogueRepository $userCatalogueRepository
    ){
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    //13/11/2024
    public function paginateSelect(){
        return[
            'id',
            'email',
            'phone',
            'address',
            'name',
            'publish'
        ];
    }
    public function paginate($request){
        $condition['keyword'] = addcslashes($request->input('keyword'), "'\"\\%");
        $condition['publish'] = $request->integer('publish');
        //$user = $this->userRepository->getAllPaginate();
        $perPage = $request->integer('perpage');
        $user = $this->userCatalogueRepository->pagination($this->paginateSelect(), $condition,[],['path' => 'user/index'],$perPage);
        return $user;
    }

    //gửi infor user 13/11/2024
    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send','re_password']);
            //$carbonDate = Carbon::createFromFormat('Y-m-d',$payLoad['birthday']);
            //$payLoad['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payLoad['birthday'] = $this->converBirthdayDate($payLoad['birthday']);
            $payLoad['password'] = Hash::make($payLoad['password']);

            $user = $this->userCatalogueRepository->create($payLoad);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }

    //Cập nhật infor 13/11/2024
    public function update($id, $request){
        DB::beginTransaction();
        try{
            $payLoad = $request->except(['_token','send']);
            $payLoad['birthday'] = $this->converBirthdayDate($payLoad['birthday']);
            $user = $this->userCatalogueRepository->update($id, $payLoad);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }

    private function converBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    //Xoá infor Admin
    public function destroy($id){
        DB::beginTransaction();
        try{
            $user = $this->userCatalogueRepository->delete($id);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }

    // Status 13/11/2024
    public function updateStatus($post = []){
        DB::beginTransaction();
        try{
            $payLoad[$post['field']] = (($post['value'] == 1)?0:1);
            $user = $this->userCatalogueRepository->update($post['modelId'], $payLoad);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateStatusAll($post){
        //dd($post);
        DB::beginTransaction();
        try{
            $payLoad[$post['field']] = $post['value'];
            $flag = $this->userCatalogueRepository->updateByWhereIn('id', $post['id'], $payLoad);

            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }
}
