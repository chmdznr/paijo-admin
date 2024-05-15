<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Identitas
    Route::delete('identita/destroy', 'IdentitasController@massDestroy')->name('identita.massDestroy');
    Route::resource('identita', 'IdentitasController');

    // Pengukuran
    Route::delete('pengukurans/destroy', 'PengukuranController@massDestroy')->name('pengukurans.massDestroy');
    Route::post('pengukurans/media', 'PengukuranController@storeMedia')->name('pengukurans.storeMedia');
    Route::post('pengukurans/ckmedia', 'PengukuranController@storeCKEditorImages')->name('pengukurans.storeCKEditorImages');
    Route::resource('pengukurans', 'PengukuranController');

    // Trik
    Route::delete('triks/destroy', 'TrikController@massDestroy')->name('triks.massDestroy');
    Route::post('triks/media', 'TrikController@storeMedia')->name('triks.storeMedia');
    Route::post('triks/ckmedia', 'TrikController@storeCKEditorImages')->name('triks.storeCKEditorImages');
    Route::resource('triks', 'TrikController');

    // Catatan
    Route::delete('catatans/destroy', 'CatatanController@massDestroy')->name('catatans.massDestroy');
    Route::post('catatans/media', 'CatatanController@storeMedia')->name('catatans.storeMedia');
    Route::post('catatans/ckmedia', 'CatatanController@storeCKEditorImages')->name('catatans.storeCKEditorImages');
    Route::resource('catatans', 'CatatanController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
