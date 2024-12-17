<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Client
    Route::apiResource('clients', 'ClientApiController');

    // Brand
    Route::apiResource('brands', 'BrandApiController');

    // Vehicle
    Route::post('vehicles/media', 'VehicleApiController@storeMedia')->name('vehicles.storeMedia');
    Route::apiResource('vehicles', 'VehicleApiController');

    // Suplier
    Route::apiResource('supliers', 'SuplierApiController');

    // Payment Status
    Route::apiResource('payment-statuses', 'PaymentStatusApiController');

    // Pickup
    Route::post('pickups/media', 'PickupApiController@storeMedia')->name('pickups.storeMedia');
    Route::apiResource('pickups', 'PickupApiController');

    // Carrier
    Route::apiResource('carriers', 'CarrierApiController');

    // Pickup State
    Route::apiResource('pickup-states', 'PickupStateApiController');
});
