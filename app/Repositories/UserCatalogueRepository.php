<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * Class UserService
 * @package App\Service
 */

class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(
        User $model
    )
    {
        $this->model = $model;
    }
    // public function getAllPaginate(){
    //     return User::paginate(10);
    // }

}
