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

Route::group(['namespace' => 'Frontend'], function () {

    Route::any('/','IndexController@index')->name('index');
    Route::any('/blogs/{id?}','IndexController@blogs')->name('blogs');
    Route::any('/blogscategory/{id?}','IndexController@blogscategory')->name('blogs');

//
});
Route::group(['namespace' => 'Backend'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'Blog'], function () {
        Route::any('/blogs', 'BlogController@blogs')->name('blog');
        Route::any('edit-blog/{id?}', 'BlogController@edit_blog')->name('blog-edit');
        Route::any('delete-blog/{id?}', 'BlogController@delete_blog')->name('blog-delete');
        Route::any('/category', 'BlogController@category')->name('category');
        Route::any('edit-category/{id?}', 'BlogController@edit_category')->name('category-edit');
        Route::any('delete-category/{id?}', 'BlogController@delete_category')->name('category-delete');
        Route::any('/author', 'BlogController@author')->name('author');
        Route::any('delete-author/{id?}', 'BlogController@delete_author')->name('author-delete');
        Route::any('edit-author/{id?}', 'BlogController@edit_author')->name('author-edit');
        Route::any('/tags', 'BlogController@tags')->name('tags');
        Route::any('edit-tags/{id?}', 'BlogController@edit_tags')->name('tags-edit');
        Route::any('delete-tags/{id?}', 'BlogController@delete_tags')->name('tags-delete');
    });

    Route::group(['prefix' => 'Slide'], function () {
        Route::any('slide-front', 'SlideController@slide_front')->name('slide-front');
        Route::any('/advertisement', 'SlideController@advertisements')->name('advertisement');
        Route::any('slide-front-edit/{id?}', 'SlideController@slide_front_edit')->name('slide-front-edit');
        Route::get('slide-delete/{id}', 'SlideController@slide_delete')->name('slide-delete');
        Route::get('advertisement-delete/{id}', 'SlideController@advertisement_delete')->name('advertisement-delete');
        Route::any('advertisement-edit/{id?}', 'SlideController@advertisement_edit')->name('advertisement-edit');


    });
});


