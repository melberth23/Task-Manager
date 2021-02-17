<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('projects', 'Projects@index');
Route::post('projects', 'Projects@save');
Route::post('updateproject', 'Projects@update');
Route::get('projects/{id}', 'Projects@display');
Route::put('projects/{project}', 'Projects@setStatus');
Route::delete('projects/{id}', 'Projects@delete');
Route::post('tasks', 'Tasks@save');
Route::put('tasks/{task}', 'Tasks@setStatus');
Route::delete('tasks/{id}', 'Tasks@delete');