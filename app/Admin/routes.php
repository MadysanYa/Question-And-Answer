<?php

use Illuminate\Routing\Router;

Admin::routes();



    
    Route::group([
        'prefix'        => config('admin.route.prefix'),
        'namespace'     => config('admin.route.namespace'),
        'middleware'    => config('admin.route.middleware'),
        'as'            => config('admin.route.prefix') . '.',
    ], function (Router $router) {

        // $router->get('/dfdsfdsfdsfsdffss', 'HomeController@index')->name('home');
        $router->resource('/', ApplicationController::class);
        $router->resource('networks', NetworkController::class);
        $router->resource('applications', ApplicationController::class);
        $router->resource('mobileapps', MobileappController::class);
		$router->resource('contract', ContractController::class);
		$router->resource('ipt', IptController::class);
		$router->resource('inventory', InventoryController::class);
		$router->resource('task', TaskController::class);
		$router->resource('history', HistoryController::class);
		$router->resource('transfer', TransferController::class);
		$router->resource('document', DocumentController::class); 
		$router->resource('wifi', WifiController::class); 
		$router->resource('vendor', VendorController::class); 
		$router->resource('invoice', InvoiceController::class); 
    });






