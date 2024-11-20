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

    public function paginateSelect(){
        return[
            'id',
            'name',
            'description',
            'publish',
        ];
    }
    public function paginate($request){
        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => $request->integer('publish')
        ];
        //$user = $this->userRepository->getAllPaginate();
        $perPage = $request->integer('perpage');
        $user = $this->userCatalogueRepository->pagination(
            $this->paginateSelect(), 
            $condition,
            [],
            ['path' => 'user/catalogue/index'],
            $perPage);
        return $user;
    }

    //gửi infor user 20/11/2024
    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send']);
            
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

    //Cập nhật infor 20/11/2024
    public function update($id, $request){
        DB::beginTransaction();
        try{
            $payLoad = $request->except(['_token','send']);
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

    // Status 20/11/2024
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
