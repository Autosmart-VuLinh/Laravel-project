<?php

namespace Modules\User\src\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;

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
        $pageTitle = "Danh người dùng";
        $listUsers = $this->userRepo->getUsers(10);
        return view('user::list', compact('pageTitle', 'listUsers'));
    }

    public function data()
    {
        $users = $this->userRepo->getAllUsers();
        return DataTables::of($users)
            ->addColumn('edit', function ($user) {
                return '<a href="' . route('admin.users.edit', $user->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($user) {
                return '<a href="' . route('admin.users.delete', $user->id) . '" class="btn btn-danger">Xóa</a>';
            })
            ->editColumn('created_at', function ($users) {
                return Carbon::parse($users->created_at)->format('d-m-Y H:i:s');
            })
            ->rawColumns(['edit', 'delete'])
            ->toJson();
    }
    public function create()
    {
        $pageTitle = "Thêm mới người dùng";
        return view('user::add', compact('pageTitle'));
    }

    public function store(UserRequest $request)
    {
        $this->userRepo->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('admin.users.index'))->with('mess', __('user::messages.create.success'));
    }
    public function edit($id)
    {
        $pageTitle = "Cập nhật người dùng";
        $user = $this->userRepo->find($id);
        if (!$user) {
            abort(404);
        }

        return view('user::edit', compact('pageTitle', 'user'));
    }
    public function update(UserRequest $request, $id)
    {
        $data = $request->except('_token', 'password'); //Loại bỏ token
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $this->userRepo->update($id, $data);
        return redirect()->back()->with('mess', __('user::messages.update.success'));
    }
    public function delete($id)
    {
        return view('user::detail', compact('id'));
    }
}
