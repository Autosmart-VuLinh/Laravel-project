<?php

namespace Modules\User\src\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getUsers()
    {
        return $this->getAll();
    }
}
