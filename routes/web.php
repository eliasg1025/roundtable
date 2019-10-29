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

Auth::routes(['verify' => true]);

Route::get('/', 'InicioController@index')->name('home');

Route::get('/planes','PlanesController@index')->name('planes');
Route::get('/pagos/{product}/{slug}','PagosController@index')->name('pagos');
Route::post('/pagos/process-payment', 'PagosController@processPayment');

Route::get('/contact','contactController@contacto')->name('contacto');

// Edit profile routes
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/user', 'ProfileController@update');
Route::post('/profile/upload-user-image/{type}', 'ProfileController@uploadUserImage');
Route::post('/profile/add-account-image', 'ProfileController@addAccountImage');
Route::delete('/profile/delete-account-image/{id}', 'ProfileController@deleteAccountImage');
Route::post('/profile/add-account-video', 'ProfileController@addAccountVideo');
Route::delete('/profile/delete-account-video/{id}', 'ProfileController@deleteAccountVideo');

Route::post('/profile/add-product', 'ProfileController@addProduct');
Route::post('/profile/edit-product/{id}', 'ProfileController@editProduct');
Route::delete('/profile/delete-product/{id}', 'ProfileController@deleteProduct');
Route::post('/profile/add-product-cert', 'ProfileController@addProductCert');
Route::post('/profile/edit-product-cert/{id}', 'ProfileController@editProductCert');
Route::delete('/profile/delete-product-cert/{id}', 'ProfileController@deleteProductCert');

Route::post('/profile/add-cert', 'ProfileController@addCert');
Route::post('/profile/edit-cert/{id}', 'ProfileController@editCert');
Route::delete('/profile/delete-cert/{id}', 'ProfileController@deleteCert');

Route::post('/profile/update-contact-info', 'ProfileController@updateContactInfo');
Route::post('/validacion/process-ruc-file', 'ValidacionController@processRucFile');
Route::post('/meet/accept-meet', 'MeetController@acceptMeet');

Route::get('/business', 'BusinessController@index')->name('business');
Route::post('/business/create-meet', 'MeetController@createMeet');

Route::get('/business/category/{slug}', 'BusinessController@category')->name('business.category');

Route::get('/business/profile/{slug}', 'BusinessController@show')->name('business.show');

// Api
Route::get('/profile/messages', 'Api\MessagesController@index');
Route::get('/profile/operations', 'Api\OperationsController@index');

Route::get('/test', function () {
	$operation = App\Operation::where('name', 'Solicitar verificación')->first();
	return response()->json($operation);
});
