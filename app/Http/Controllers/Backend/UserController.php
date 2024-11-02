<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
//use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;

class UserController extends Controller
{

    protected $userService;
    protected $provinceRepository;
    //protected $districtRepository;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        //DistrictService $districtRepository,
        UserRepository $userRepository,
    )
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        //$this->districtRepository = $districtRepository;
        $this->userRepository = $userRepository;
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
            ]
        ];
        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $template = 'backend.user.store';
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
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới user thành công');
        }
        return redirect()->route('user.index')->with('error','Thêm mới user không thành công. Hãy thử lại');
    }

    //Edit Infor Admin (2/11/2024)
    public function edit($id){
        $user = $this->userRepository->findById($id);

        $provinces = $this->provinceRepository->all();

        $config = [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        $template = 'backend.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces', 
            'user',//compact biến provinces sang bên view (user.store)
        ));
    }

    public function update($id, UpdateUserRequest $request){
        if($this->userService->update($id, $request)){
            return redirect()->route('user.index')->with('success','Cập nhật user thành công');
        }
        return redirect()->route('user.index')->with('error','Cập nhật user không thành công. Hãy thử lại');
    }

    //Delete Infor Admin
    public function delete($id){
        $config['seo'] = config('apps.user');
        $user = $this->userRepository->findById($id);
        $template = 'backend.user.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'user',
        ));
    }

    public function destroy($id){
        if($this->userService->destroy($id, $request)){
            return redirect()->route('user.index')->with('success','Xoá user thành công');
        }
        return redirect()->route('user.index')->with('error','Xoá user không thành công. Hãy thử lại');
    }
}
