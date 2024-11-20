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

    public function create(array $payLoad = []){
       $model =  $this->model->create($payLoad);
       return $model->fresh();
    }

    //Status 3/11/2024 start 
    public function update(int $id = 0, array $payLoad = []){
        $model = $this->findById($id);
        return $model->update($payLoad);
    }

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []){
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    // public function updateByWhere($condition = [], array $payload = []){
    //     $query = $this->model->newQuery();
    //     foreach($condition as $key => $val){
    //         $query->where($val[0], $val[1] , $val[2]);
    //     }
    //     return $query->update($payload);
    // }
    //end
    public function delete(int $id = 0){
        return $this->findById($id)->delete();
    }

    // public function forceDelete(int $id = 0){
    //     return $this->findById($id)->forceDelete();
    // }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        array $join = [],
        array $extend = [],
        int $perPage = 1
        ){
        $query = $this->model->select($column)
                    ->where(function($query) use ($condition){
                        $query->where('name','LIKE','%'.$condition['keyword'].'%');
                            //   ->orWhere('email','LIKE','%'.$condition['keyword'].'%')
                            //   ->orWhere('address','LIKE','%'.$condition['keyword'].'%')
                            //   ->orWhere('phone','LIKE','%'.$condition['keyword'].'%')
                            if(asset($condition['publish']) && $condition['publish'] != -1){
                                $query->where('publish','=',$condition['publish']);
                            }
                            return $query;
                    });
                    // ->join($join)
                    // ->get()->paginate($perpage);
        if(!empty($join)){
            $query ->join(...$join);
        }

        return $query->paginate($perPage)
                    ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    public function all(){
        return $this->model->all();
    }

    // Tìm một bản ghi theo ID, với các cột và quan hệ được chỉ định. (31/10/2024)

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
}
