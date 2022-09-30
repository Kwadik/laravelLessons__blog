<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
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

Route::group([
    'namespace' => 'App\Http\Controllers\Main',
], function () {

    Route::get('/', 'IndexController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Personal',
    'prefix' => 'personal',
    'middleware' => [
        'auth',
        'verified',
    ],
], function () {

    Route::group([
        'namespace' => 'Main',
    ], function () {

        Route::get('/', 'IndexController')->name('personal.main.index');
    });

    Route::group([
        'namespace' => 'Liked',
    ], function () {

        Route::get('/liked', 'IndexController')->name('personal.liked.index');
    });

    Route::group([
        'namespace' => 'Comment',
    ], function () {

        Route::get('/comment', 'IndexController')->name('personal.comment.index');
    });
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => [
        'auth',
        'admin',
        'verified',
    ],
], function () {

    Route::group([
        'namespace' => 'Main',
    ], function () {

        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group([
        'namespace' => 'Category',
        'prefix' => 'categories',
    ], function () {

        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group([
        'namespace' => 'Tag',
        'prefix' => 'tags',
    ], function () {

        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group([
        'namespace' => 'Post',
        'prefix' => 'posts',
    ], function () {

        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group([
        'namespace' => 'User',
        'prefix' => 'users',
    ], function () {

        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
