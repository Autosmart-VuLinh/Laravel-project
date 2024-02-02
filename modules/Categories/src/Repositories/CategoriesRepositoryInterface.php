<?php

namespace Modules\Categories\src\Repositories;

use App\Models\Categories;

use App\Repositories\RepositoryInterface;


interface CategoriesRepositoryInterface extends RepositoryInterface
{
    public function getCategories();
    public function getAllCategories();
}
