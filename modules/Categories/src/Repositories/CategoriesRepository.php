<?php

namespace Modules\Categories\src\Repositories;


use Modules\Categories\src\Models\Categories;
use App\Repositories\BaseRepository;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;


class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface

{

  public function getModel()
  {
    return Categories::class;
  }

  public function getCategories()
  {
    return $this->model->with('subCategories')->select(['id', 'name', 'slug', 'parent_id', 'created_at'])->whereParentId(0)->latest();
  }

  public function getAllCategories()
  {
    return $this->model->all();
  }

}
