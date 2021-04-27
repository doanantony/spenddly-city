<?php

Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout');
Route::resource('promocodes', 'Promocodes\PromocodesController');













Route::get('stats', 'StatsController@index');

Route::get('me', 'Profile\DetailsController@index');
Route::patch('me/details', 'Profile\DetailsController@update');
Route::patch('me/details/auth', 'Profile\AuthDetailsController@update');
Route::put('me/avatar', 'Profile\AvatarController@update');
Route::delete('me/avatar', 'Profile\AvatarController@destroy');
Route::put('me/avatar/external', 'Profile\AvatarController@updateExternal');
Route::get('me/sessions', 'Profile\SessionsController@index');
Route::resource('users', 'Users\UsersController', [
    'except' => 'create'
]);
Route::put('users/{user}/avatar', 'Users\AvatarController@update');
Route::put('users/{user}/avatar/external', 'Users\AvatarController@updateExternal');
Route::delete('users/{user}/avatar', 'Users\AvatarController@destroy');

Route::get('users/{user}/activity', 'Users\ActivityController@index');
Route::get('users/{user}/sessions', 'Users\SessionsController@index');

Route::get('/sessions/{session}', 'SessionsController@show');
Route::delete('/sessions/{session}', 'SessionsController@destroy');

Route::get('/activity', 'ActivityController@index');

Route::resource('roles', 'Authorization\RolesController', [
    'except' => 'create'
]);
Route::get("roles/{role}/permissions", 'Authorization\RolePermissionsController@show');
Route::put("roles/{role}/permissions", 'Authorization\RolePermissionsController@update');

Route::resource('permissions', 'Authorization\PermissionsController', [
    'except' => 'create'
]);

Route::get('/settings', 'SettingsController@index');