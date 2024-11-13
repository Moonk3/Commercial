<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;

//use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;

class UserCatalogueController extends Controller
{

    protected $userCatalogueService;
    //protected $districtRepository;
    protected $userCatalogueRepository;

    public function __construct(
        UserCatalogueService $userCatalogueService,
        //ProvinceRepository $provinceRepository,
        //DistrictService $districtRepository,
        UserCatalogueRepository $userCatalogueRepository,
    )
    {
        $this->userCatalogueService = $userCatalogueService;
        //$this->provinceRepository = $provinceRepository;
        //$this->districtRepository = $districtRepository;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request){

        echo 123;die();

        $users = $this->userCatalogueService->paginate($request);

        $config = [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' =>[
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];

        $config['seo'] = config('apps.user');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }

    //Tạo 1 view cho Add Nhân viên (30/10/2024)
    public function create(){

        //$provinces = $this->provinceRepository->all();

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
        $template = 'backend.user.user.store';
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
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới user thành công');
        }
        return redirect()->route('user.index')->with('error','Thêm mới user không thành công. Hãy thử lại');
    }

    //Edit Infor Admin (2/11/2024)
    public function edit($id){
        $user = $this->userCatalogueRepository->findById($id);

        //$provinces = $this->provinceRepository->all();

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
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces', 
            'user',//compact biến provinces sang bên view (user.store)
        ));
    }

    public function update($id, UpdateUserRequest $request){
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.index')->with('success','Cập nhật user thành công');
        }
        return redirect()->route('user.index')->with('error','Cập nhật user không thành công. Hãy thử lại');
    }

    //Delete Infor Admin
    public function delete($id){
        $config['seo'] = config('apps.user');
        $user = $this->userCatalogueRepository->findById($id);
        $template = 'backend.user.user.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'user',
        ));
    }

    public function destroy($id){
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.index')->with('success','Xoá user thành công');
        }
        return redirect()->route('user.index')->with('error','Xoá user không thành công. Hãy thử lại');
    }
}
