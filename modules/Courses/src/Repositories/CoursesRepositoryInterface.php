<?php

namespace Modules\Courses\src\Repositories;

use App\Models\Courses;

use App\Repositories\RepositoryInterface;


interface CoursesRepositoryInterface extends RepositoryInterface

{
    public  function getAllCourses();
}
