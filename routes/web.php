<?php

Route::get('/', 'PublicController@index')->name('home');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/organization', 'PublicController@organization')->name('organization');
Route::get('/what-we-do', 'PublicController@whatWeDo')->name('what-we-do');
Route::get('/member-churches', 'PublicController@memberChurches')->name('member-churches');
Route::get('/member-churche/{slug}', 'PublicController@memberChurch')->name('member-church');
Route::get('/post/{slug}', 'PublicController@post')->name('post');

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

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::resource('galleries', 'GalleryController');

    // Statement
    Route::delete('statements/destroy', 'StatementController@massDestroy')->name('statements.massDestroy');
    Route::post('statements/media', 'StatementController@storeMedia')->name('statements.storeMedia');
    Route::post('statements/ckmedia', 'StatementController@storeCKEditorImages')->name('statements.storeCKEditorImages');
    Route::resource('statements', 'StatementController');

    // Career
    Route::delete('careers/destroy', 'CareerController@massDestroy')->name('careers.massDestroy');
    Route::post('careers/media', 'CareerController@storeMedia')->name('careers.storeMedia');
    Route::post('careers/ckmedia', 'CareerController@storeCKEditorImages')->name('careers.storeCKEditorImages');
    Route::resource('careers', 'CareerController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Member Church Center
    Route::delete('member-church-centers/destroy', 'MemberChurchCenterController@massDestroy')->name('member-church-centers.massDestroy');
    Route::resource('member-church-centers', 'MemberChurchCenterController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Member Church Contact
    Route::delete('member-church-contacts/destroy', 'MemberChurchContactController@massDestroy')->name('member-church-contacts.massDestroy');
    Route::post('member-church-contacts/media', 'MemberChurchContactController@storeMedia')->name('member-church-contacts.storeMedia');
    Route::post('member-church-contacts/ckmedia', 'MemberChurchContactController@storeCKEditorImages')->name('member-church-contacts.storeCKEditorImages');
    Route::resource('member-church-contacts', 'MemberChurchContactController');
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
