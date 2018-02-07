<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/en');
});

Route::get('/login', 'HomeController@login');
Route::post('/loginAction', 'HomeController@loginAction');
Route::get('/logoutAction', 'HomeController@logoutAction');

Route::get('/{lang}', 'CategoryController@index');

Route::get('/{lang}/gallery', 'InstagramController@index');
Route::get('{lang}/gallery/{monthName}/{year}', 'InstagramController@viewByMonth');

Route::get('/{lang}/category/{category}', 'CategoryController@category');

Route::get('/{lang}/admin/post/', 'AdminController@view');
Route::get('/{lang}/admin/post/insert', 'AdminController@insert');
Route::get('/{lang}/admin/post/update/{slug}', 'AdminController@update');

Route::post('/updatePostAction/{id}', 'AdminController@updatePostAction');
Route::post('/insertPostAction', 'AdminController@insertPostAction');
Route::get('/deletePostAction/{slug}', 'AdminController@deletePostDB');

//
Route::get('{lang}/admin/instagram/', 'InstagramController@view');
Route::get('{lang}/admin/instagram/insert/', 'InstagramController@insert');
Route::get('{lang}/admin/instagram/update/{id}', 'InstagramController@update');

Route::post('/updateInstagramAction/{id}', 'InstagramController@updateInstagramAction');
Route::post('/insertInstagramAction', 'InstagramController@insertInstagramAction');
Route::get('/deleteInstagramAction/{id}', 'InstagramController@deleteInstagramDB');

Route::get('/{lang}/{slug}', 'PostController@index');

