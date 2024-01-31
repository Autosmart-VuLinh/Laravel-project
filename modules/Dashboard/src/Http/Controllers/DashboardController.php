<?php

namespace Modules\Dashboard\src\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $pageTitle = "Trang tổng quát";
        return view("dashboard::dashboard", compact('pageTitle'));
    }
}
