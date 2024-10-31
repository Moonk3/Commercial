<?php

namespace App\Repositories;

use App\Models\Base;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
/**
 * Class UserService
 * @package App\Service
 */

class BaseRepository implements BaseRepositoryInterface
{
    // public function all(){
    //     //dữ liệu muốn lấy ra sử dụng thì phải lấy ở controller và compact sang view (30/10/2024)
    //     return Base::all();
    // }
    protected $model;

    public function __construct(
        Model $model
    ){
        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }
}
