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
        $router->resource('property_appraisals', PropertyAppraisalController::class);
       //$router->resource('property_indicator_hqs',  PropertyIndicatorHqController::class);   
        $router->resource('branches', BranchController::class);
        $router->resource('reference_id', ReferenceController::class);
        $router->resource('regions', RegionController::class);
        $router->resource('provinces', ProvincesController::class);
        $router->resource('districts', DistrictController::class);
        $router->resource('communes', CommuneController::class);
        $router->resource('villages', VillageController::class);
        $router->resource('information_types', InformationTypeController::class);
        $router->resource('property_types', PropertyTypeController::class);
        $router->resource('file', File::class);
        
        
    });

