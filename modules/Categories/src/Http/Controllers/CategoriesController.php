<?php

namespace Modules\Categories\src\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Categories\src\Http\Requests\CategoryRequest;
use Modules\Categories\src\Models\Categories;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $categoryRepo;
    public function __construct(CategoriesRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function index()
    {
        $pageTitle = "Quản lý danh mục";
        return view('categories::list', compact('pageTitle'));
    }

    public function data()
    {
        $categories = $this->categoryRepo->getCategories();

        $categories = DataTables::of($categories)
            // ->addColumn('edit', function ($category) {
            //     return '<a href="' . route('admin.categories.edit', $category->id) . '" class="btn btn-warning">Sửa</a>';
            // })
            // ->addColumn('delete', function ($category) {
            //     return '<a href="' . route('admin.categories.delete', $category->id) . '" class="btn btn-danger delete-action">Xóa</a>';
            // })
            // ->addColumn('link', function ($category) {
            //     return '<a href="" class="btn btn-primary">Xem</a>';
            // })
            // ->editColumn('created_at', function ($category) {
            //     return Carbon::parse($category->created_at)->format('d-m-Y H:i:s');
            // })
            // ->rawColumns(['edit', 'delete', 'link'])
            ->toArray();

        $categories['data'] = $this->getCategoriesTable($categories['data']);
        return $categories;
    }

    public function getCategoriesTable($categories, $char = '', &$result = [])
    {
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $result[] = [
                    'id' => $category['id'],
                    'name' => $char . $category['name'],
                    'slug' => $category['slug'],
                    'parent_id' => $category['parent_id'],
                    'created_at' => Carbon::parse($category['created_at'])->format('d-m-Y H:i:s'),
                    "edit" => '<a href="' . route('admin.categories.edit', $category['id']) . '" class="btn btn-warning">Sửa</a>',
                    "delete" => '<a href="' . route('admin.categories.delete', $category['id']) . '" class="btn btn-danger delete-action">Xóa</a>',
                    "link" => '<a href="" class="btn btn-primary">Xem</a>'
                ];
                if (!empty($category['sub_categories'])) {
                    $this->getCategoriesTable($category['sub_categories'], $char . '|--', $result);
                }
            }
        }
        return $result;
    }

    public function create()
    {
        $pageTitle = "Thêm mới danh mục";
        $categories = $this->categoryRepo->getAllCategories();
        return view('categories::add', compact('pageTitle', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepo->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);
        return redirect(route('admin.categories.index'))->with('mess', __('categories::messages.create.success'));
    }
    public function edit($id)
    {
        $pageTitle = "Cập nhật danh mục";
        $category = $this->categoryRepo->find($id);
        $categories = $this->categoryRepo->getAllCategories();
        if (!$category) {
            abort(404);
        }

        return view('categories::edit', compact('pageTitle', 'category', 'categories'));
    }
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token'); //Loại bỏ token
        $this->categoryRepo->update($id, $data);
        return back()->with('mess', __('categories::messages.update.success'));
    }
    public function delete($id)
    {
        $this->categoryRepo->delete($id);
        return back()->with('mess', __('categories::messages.delete.success'));
    }
}
