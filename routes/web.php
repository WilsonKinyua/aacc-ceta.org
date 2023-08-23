<?php

Route::get('/', 'PublicController@index')->name('home');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/organization', 'PublicController@organization')->name('organization');
Route::get('/organization/{slug}', 'PublicController@organizationTeamDetails')->name('organization.team-details');
Route::get('/what-we-do', 'PublicController@whatWeDo')->name('what-we-do');
Route::get('/member-churches', 'PublicController@memberChurches')->name('member-churches');
Route::get('/member-churche/{slug}', 'PublicController@memberChurch')->name('member-church');
Route::get('/posts', 'PublicController@posts')->name('posts');
Route::get('/post/{slug}', 'PublicController@post')->name('post');
Route::get('/gallery', 'PublicController@gallery')->name('gallery');
Route::get('/gallery/{id}/list', 'PublicController@galleryCategory')->name('gallery.category');
Route::get('/aacc-statements', 'PublicController@statements')->name('statements');
Route::get('/careers', 'PublicController@careers')->name('careers');
Route::get('/policies', function () {
    return view('public.policies');
})->name('policies');
Route::get('/african-pulse', function () {
    return view('public.african-pulse');
})->name('african-pulse');
Route::get('/contacts', 'PublicController@contacts')->name('contacts');
Route::post('/contact/create', 'PublicController@contactMessage')->name('contact.create');

// ====================================================== Events ========================================================================
Route::get('/aacc-9th-theological-institute', function () {
    return view('public.events.aacc-9th-theological-institute');
})->name('aacc-9th-theological-institute');
Route::get('/symposium-on-addressing-misleading-theologies-on-power-and-authority', function () {
    return view('public.events.symposium-on-addressing-misleading-theologies-on-power-and-authority');
})->name('symposium-on-addressing-misleading-theologies-on-power-and-authority');
Route::get('/webinar-for-young-people-on-migration-trafficking-in-persons-and-modern-slavery', function () {
    return view('public.events.webinar-for-young-people-on-migration-trafficking-in-persons-and-modern-slavery');
})->name('webinar-for-young-people-on-migration-trafficking-in-persons-and-modern-slavery');
Route::get('/day-of-the-african-child', function () {
    return view('public.events.day-of-the-african-child');
})->name('day-of-the-african-child');
Route::get('/ecumenical-commemorations-of-the-world-environment-day', function () {
    return view('public.events.ecumenical-commemorations-of-the-world-environment-day');
})->name('ecumenical-commemorations-of-the-world-environment-day');

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

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');
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
