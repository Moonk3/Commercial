<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * Class UserService
 * @package App\Service
 */

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    // public function all(){
    //     //dữ liệu muốn lấy ra sử dụng thì phải lấy ở controller và compact sang view (30/10/2024)
    //     return Province::all();
    // }

    protected $model;

    public function __construct(
        Province $model
    ){
        $this->model = $model;
    }
}
