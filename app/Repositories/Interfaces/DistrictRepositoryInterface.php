<?php

namespace App\Repositories\Interfaces;



/**
 * @package
 */

interface DistrictRepositoryInterface
{
    public function all();
    public function findDistrictByProvinceId(int $province_id);
}
