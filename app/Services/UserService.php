<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Service
 */

class UserService implements UserServiceInterface
{

    protected $userRepository;
    public function __construct(
        UserRepository $userRepository
    ){
        $this->userRepository = $userRepository;
    }
    public function paginate(){
        $user = $this->userRepository->getAllPaginate();
        return $user;
    }

    //gửi infor user 1/11/2024
    public function create($request){
        DB::beginTransaction();
        try{

            $payLoad = $request->except(['_token','send','re_password']);
            $carbonDate = Carbon::createFromFormat('Y-m-d',$payLoad['birthday']);
            $payLoad['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payLoad['password'] = Hash::make($payLoad['password']);

            $user = $this->userRepository->create($payLoad);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }
}
