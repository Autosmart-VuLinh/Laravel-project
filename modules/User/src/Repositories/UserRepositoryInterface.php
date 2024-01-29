<?php

namespace Modules\User\src\Repositories;

use App\Models\User;
use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function getUsers();
}
