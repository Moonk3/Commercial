<?php

namespace App\Repositories\Interfaces;



/**
 * @package
 */

interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $modelId);
    public function create(array $payLoad);
    public function update(int $id = 0, array $payLoad = []);
    public function delete(int $id = 0);
}

