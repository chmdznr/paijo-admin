<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Identitas
    Route::apiResource('identita', 'IdentitasApiController');

    // Pengukuran
    Route::post('pengukurans/media', 'PengukuranApiController@storeMedia')->name('pengukurans.storeMedia');
    Route::apiResource('pengukurans', 'PengukuranApiController');

    // Trik
    Route::post('triks/media', 'TrikApiController@storeMedia')->name('triks.storeMedia');
    Route::apiResource('triks', 'TrikApiController');

    // Catatan
    Route::post('catatans/media', 'CatatanApiController@storeMedia')->name('catatans.storeMedia');
    Route::apiResource('catatans', 'CatatanApiController');
});
