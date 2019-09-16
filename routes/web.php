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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', 'PermissionDataController@index_upload');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'VerifyController@index');
Route::get('/view', 'PermissionDataController@index_view');
/*
 * Permission data management
 */
Route::get('/view/{id}', function ($id) {
	return "Showing " . $id;
})->name('show_permission_data');

Route::post('/verify/{id}', function ($id) {
	return 'Verifying ' . $id;
})->name('accept_permission_data');

Route::delete('/verify/{id}', function ($id) {
	return 'Deleting ' . $id;
})->name('delete_permission_data');

/*
 * Uploading things
 */
Route::prefix('upload')->group(function() {
	Route::post('/submit', 'PermissionDataController@submit')->name('submit_data');
	Route::get('/submit', 'PermissionDataController@index_upload');
});

Auth::routes();
