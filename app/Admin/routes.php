<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\BoreyController;
use App\Admin\Controllers\MapPriceIndicatorController;

Admin::routes();

    Route::group([
        'prefix'        => config('admin.route.prefix'),
        'namespace'     => config('admin.route.namespace'),
        'middleware'    => config('admin.route.middleware'),
        'as'            => config('admin.route.prefix') . '.',
    ], function (Router $router) {

        $router->resource('/', ApplicationController::class);
        $router->resource('property_researchs', PropertyResearchConteroller::class);
        $router->resource('property_indicators',  PropertyIndicatorController::class);
        $router->resource('property_appraisals', PropertyAppraisalController::class);
        $router->resource('map_price_indicators',  MapPriceIndicatorController::class);  
        $router->resource('title_indicators',  TitleIndicatorController::class); 
        $router->resource('risk_indicators',  RiskIndicatorController::class);  
        $router->resource('branches', BranchController::class);
        $router->resource('reference_id', ReferenceController::class);
        $router->resource('regions', RegionController::class);
        $router->resource('provinces', ProvincesController::class);
        $router->resource('districts', DistrictController::class);
        $router->resource('communes', CommuneController::class);
        $router->resource('villages', VillageController::class);
        $router->resource('information_types', InformationTypeController::class);
        $router->resource('property_types', PropertyTypeController::class);
        $router->resource('boreys', BoreyController::class);
        $router->resource('dashboard', DashboardController::class);
    });

