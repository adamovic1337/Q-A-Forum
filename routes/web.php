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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/question/{question}/reply', 'ReplyController@index')->name('question.replies');
Route::get('/category/{category}', 'HomeController@categoryFilter')->name('category.filter');
Route::any('/search', 'HomeController@searchFilter')->name('search');
Route::get('/question/create', 'QuestionController@create')->name('question.create')->middleware('jwt:user,admin');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/profile', 'AuthController@profile')->middleware('jwt:user,admin');

Route::get('/admin', 'AdminController@index')->name('adminDashboard')->middleware('jwt:admin');

Route::get('/admin/categories', 'CategoryController@adminIndex')->middleware('jwt:admin');
Route::put('/admin/categories/{category}', 'CategoryController@adminUpdate')->name('admin.category.update');
Route::delete('/admin/categories/{category}', 'CategoryController@adminDelete')->name('admin.category.delete');
Route::post('/admin/categories/', 'CategoryController@adminInsert')->name('admin.category.insert');

Route::get('/admin/questions', 'QuestionController@adminIndex')->middleware('jwt:admin');
Route::delete('/admin/question/{question}', 'QuestionController@adminDelete')->name('admin.question.delete');

Route::get('/admin/replies', 'ReplyController@adminIndex')->middleware('jwt:admin');
Route::delete('/admin/replies/{reply}', 'ReplyController@adminDelete')->name('admin.reply.delete');

Route::get('/admin/roles', 'RoleController@adminIndex')->middleware('jwt:admin');
Route::post('/admin/roles/', 'RoleController@adminInsert')->name('admin.role.insert');
Route::put('/admin/roles/{role}', 'RoleController@adminUpdate')->name('admin.role.update');
Route::delete('/admin/roles/{role}', 'RoleController@adminDelete')->name('admin.role.delete');

Route::get('/admin/users', 'AuthController@adminIndex')->middleware('jwt:admin');
Route::delete('/admin/users/{user}', 'AuthController@adminDelete')->name('admin.user.delete');
