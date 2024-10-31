<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;
//use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictService;


class UserController extends Controller
{

    protected $userService;
    protected $provinceRepository;
    //protected $districtRepository;

    public function __construct(
        UserService $userService,
        ProvinceService $provinceRepository,
        //DistrictService $districtRepository,
    )
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        //$this->districtRepository = $districtRepository;
    }

    public function index(){

        $users = $this->userService->paginate();

        $config = [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' =>[
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];

        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }

    //Tạo 1 view cho Add Nhân viên (30/10/2024)
    public function create(){

        $provinces = $this->provinceRepository->all();

        $config = [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
                'backend/library/finder.js',
            ]
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces', //compact biến provinces sang bên view (user.create)
        ));
    }

    // private function config(){
    //     return [
    //         'js' =>[
    //             'backend/js/plugins/switchery/switchery.js'
    //         ],
    //         'css' =>[
    //             'backend/css/plugins/switchery/switchery.css'
    //         ]
    //     ];
    // }

    public function store(StoreUserRequest $request){
        echo 1;
        die();
    }
}
