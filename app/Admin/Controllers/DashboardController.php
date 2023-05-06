<?php

namespace App\Admin\Controllers;

use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function index(Content $content)
    {
        $content->header('Dashboard');
        $content->body(view('admin.dashboard'));

        return $content;
    }
}
