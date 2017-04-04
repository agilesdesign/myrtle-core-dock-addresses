<?php

Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {
    Route::resource('types', \Myrtle\Core\Addresses\Http\Controllers\Administrator\AddressTypesController::class, ['except' => ['show']]);
});

Route::group(['prefix' => 'docks/addresses/types', 'as' => 'docks.addresses.types.'], function () {
    Route::post('seed', ['uses' => \Myrtle\Core\Addresses\Http\Controllers\Administrator\AddressTypesSeedController::class . '@store', 'as' => 'seed.store']);
    Route::get('seed', ['uses' => \Myrtle\Core\Addresses\Http\Controllers\Administrator\AddressTypesSeedController::class . '@create', 'as' => 'seed.create']);
});