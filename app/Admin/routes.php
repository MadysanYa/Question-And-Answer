<?php

use Illuminate\Routing\Router;

Admin::routes();

    Route::group([
        'prefix'        => config('admin.route.prefix'),
        'namespace'     => config('admin.route.namespace'),
        'middleware'    => config('admin.route.middleware'),
        'as'            => config('admin.route.prefix') . '.',
    ], function (Router $router) {

        $router->resource('/', ApplicationController::class);
        $router->resource('property_researchs', PropertyResearchConteroller::class);
        $router->resource('property_indicator',  PropertyIndicatorController::class);
<<<<<<< HEAD
		$router->resource('appraisal', AppraisalController::class); 
        $router->resource('branches', BranchController::class);
        $router->resource('region', RegionController::class);
=======
		$router->resource('property_appraisals', PropertyAppraisalController::class); 
        
>>>>>>> 6a610777ec0add2a16fb7566c14f469cfb475e4d
    });






