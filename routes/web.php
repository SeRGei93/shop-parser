<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function (){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/article-category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/article', 'ArticleController', ['as' => 'admin']);
    Route::resource('/product-category', 'ProductCategoryController', ['as' => 'admin']);
    Route::resource('/product', 'ProductController', ['as' => 'admin']);
});

Route::get('/', function () {
    return view('index');
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::get('/parser', 'Admin\ParserController@getProducts')->name('parser');

/** авторизация */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
