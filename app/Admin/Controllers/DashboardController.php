<?php

namespace App\Admin\Controllers;

use Encore\Admin\Layout\Content;
use App\Repositories\TestRepository;
use App\Repositories\UserRepository;
use Encore\Admin\Controllers\AdminController;

class DashboardController extends AdminController
{
    public $testRepository;
    public $userRepository;

    public function __construct(TestRepository $testRepo, UserRepository $userRepo)
    {
        $this->testRepository = $testRepo;
        $this->userRepository = $userRepo;
    }
    
    public function index(Content $content)
    {
        $countTest = $this->testRepository->allTest()->count();
        $countUser = $this->userRepository->allUser()->count();

        $content->header('Dashboard');
        $content->body(view('admin.dashboard', [
            "total_test" => $countTest,
            "total_user" => $countUser
        ]));

        return $content;
    }
}
