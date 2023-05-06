<?php

use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;

Admin::routes();
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->resource('/', DashboardController::class);
    $router->resource('dashboards', DashboardController::class);
    $router->resource('tests', TestController::class);
    $router->resource('answers', AnswerController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('results', ResultController::class);
    $router->resource('users', UserAdminController::class);
    $router->resource('user-answers', UserAnswerController::class);
});

