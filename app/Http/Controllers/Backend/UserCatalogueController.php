<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
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
        UserCatalogueRepository $userCatalogueRepository
    )
    {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request){

        // echo 123;die();

        $userCatalogues = $this->userCatalogueService->paginate($request);

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

        $config['seo'] = config('apps.usercatalogue');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogues'
        ));
    }
    public function create(){


        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'create';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            //compact biến provinces sang bên view (user.create)
        ));
    }

    public function store(StoreUserCatalogueRequest $request){
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success','Thêm mới user thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Thêm mới user không thành công. Hãy thử lại');
    }

    //Edit Infor Admin (20/11/2024)
    public function edit($id){
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'edit';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue',//compact biến provinces sang bên view (user.store)
        ));
    }

    public function update($id, StoreUserCatalogueRequest $request){
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.catalogue.index')->with('success','Cập nhật user thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Cập nhật user không thành công. Hãy thử lại');
    }

    //Delete Infor Admin
    public function delete($id){
        $config['seo'] = config('apps.usercatalogue');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue',
        ));
    }

    public function destroy($id){
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success','Xoá user thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Xoá user không thành công. Hãy thử lại');
    }
}
