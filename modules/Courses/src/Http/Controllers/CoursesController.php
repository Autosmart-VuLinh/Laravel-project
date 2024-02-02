<?php

namespace Modules\Courses\src\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Courses\src\Repositories\CoursesRepository;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $coursesRepo;
    public function __construct(CoursesRepository $coursesRepo)
    {
        $this->coursesRepo = $coursesRepo;
    }
    public function index()
    {
        $pageTitle = "Quản lý khóa học";
        $listUsers = $this->coursesRepo->getUsers(10);
        return view('courses::list', compact('pageTitle', 'listUsers'));
    }

    public function data()
    {
        $courses = $this->coursesRepo->getAllCourses();
        return DataTables::of($courses)
            ->addColumn('edit', function ($course) {
                return '<a href="' . route('admin.users.edit', $course->id) . '" class="btn btn-warning">Sửa</a>';
            })
            ->addColumn('delete', function ($course) {
                return '<a href="' . route('admin.users.delete', $course->id) . '" class="btn btn-danger delete-action">Xóa</a>';
            })
            ->editColumn('created_at', function ($course) {
                return Carbon::parse($course->created_at)->format('d-m-Y H:i:s');
            })
            ->rawColumns(['edit', 'delete'])
            ->toJson();
    }
    public function create()
    {
        $pageTitle = "Thêm mới khóa học";
        return view('courses::add', compact('pageTitle'));
    }

    public function store(CoursesRequest $request)
    {
        $this->coursesRepo->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('admin.courses.index'))->with('mess', __('courses::messages.create.success'));
    }
    public function edit($id)
    {
        $pageTitle = "Cập nhật khóa học";
        $course = $this->coursesRepo->find($id);
        if (!$course) {
            abort(404);
        }

        return view('courses::edit', compact('pageTitle', 'courses'));
    }
    public function update(CoursesRequest $request, $id)
    {
        $data = $request->except('_token', 'password'); //Loại bỏ token
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $this->coursesRepo->update($id, $data);
        return back()->with('mess', __('user::messages.update.success'));
    }
    public function delete($id)
    {
        $this->coursesRepo->delete($id);
        return back()->with('mess', __('user::messages.delete.success'));
    }
}
