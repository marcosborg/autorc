<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Company
    Route::apiResource('companies', 'CompanyApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Company Type
    Route::apiResource('company-types', 'CompanyTypeApiController');

    // Client
    Route::apiResource('clients', 'ClientApiController');

    // Brand
    Route::apiResource('brands', 'BrandApiController');

    // Vehicle
    Route::post('vehicles/media', 'VehicleApiController@storeMedia')->name('vehicles.storeMedia');
    Route::apiResource('vehicles', 'VehicleApiController');
});