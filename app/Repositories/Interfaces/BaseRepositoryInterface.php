<?php

namespace App\Repositories\Interfaces;



/**
 * @package
 */

interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $modelId);
}

