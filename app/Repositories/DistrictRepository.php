<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * Class UserService
 * @package App\Service
 */

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    // public function all(){
    //     //dữ liệu muốn lấy ra sử dụng thì phải lấy ở controller và compact sang view (30/10/2024)
    //     return District::all();
    // }
    protected $model;

    public function __construct(
        District $model
    )
    {
        $this->model = $model;
    }

    public function findDistrictByProvinceId(int $province_id = 0){
        return $this->model->where('province_code','=',$province_id)->get();
    }
    
}
