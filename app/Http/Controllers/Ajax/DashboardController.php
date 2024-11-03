<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $userService;
    public function __construct(
        UserService $userService
    ){
        $this->userService  = $userService;
    }

    public function changeStatus(Request $request){
        $post = $request->input();
        $serviceInterfaceNamespace = '\App\Services\\' . ucfirst($post['model']) . 'Service';
        if (class_exists($serviceInterfaceNamespace)) {
            $serviceInstance = app($serviceInterfaceNamespace);
        }
        $serviceInstance->updateStatus($post);
        // $flag = $serviceInstance->updateStatus($post);

        // return response()->json(['flag' => $flag]); 
    }

    // public function changeStatusAll(Request $request){
    //     $post = $request->input();
    //     $serviceInterfaceNamespace = '\App\Services\\' . ucfirst($post['model']) . 'Service';
    //     if (class_exists($serviceInterfaceNamespace)) {
    //         $serviceInstance = app($serviceInterfaceNamespace);
    //     }
    //     $flag = $serviceInstance->updateStatusAll($post);
    //     return response()->json(['flag' => $flag]); 

    // }
   
   
}