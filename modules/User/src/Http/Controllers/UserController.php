<?php

namespace Modules\User\src\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepository;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        $users = $this->userRepo->getUsers();
        dd($users);
        return view('user::list');
    }


    public function detail($id)
    {
        return view('user::detail', compact('id'));
    }

    public function create()
    {
        $user = User::create([
            'name' => 'Vũ Hồng Lĩnh',
            'email' => 'vulinh12@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        dd($user);
    }
}
