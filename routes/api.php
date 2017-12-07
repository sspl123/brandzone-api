<?php

use Illuminate\Http\Request;

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



Route::get('api', ['middleware' => 'cors', function()
{
  }]);
  
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::get('user-list', 'API\UserController@index');
Route::get('users/{id}', 'API\UserController@show');


Route::put('users/{id}', 'API\UserController@update');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::put('userstatus/{id}', 'API\UserController@updatestatus');
});
});
Route::group(['middleware' => 'auth:api'], function(){
	
	Route::post('details', 'API\UserController@details');
});
Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');





//CRUD for store
Route::middleware('auth:api')->get('/store', function (Request $request) {
    return $request->store();
});
Route::post('/store', function (Request $request) {
    return $request->store();
});
Route::group(['middleware' => 'auth:api'], function(){

Route::get('stores/{id}', 'API\StoreController@show');
Route::get('store-list', 'API\StoreController@index');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::post('add-store', 'API\StoreController@create');
Route::put('stores/{id}', 'API\StoreController@update');   
Route::delete('stores/{id}', 'API\StoreController@destroy');

});
});






//CRUD for products
Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->product();
});

Route::post('/product', function (Request $request) {
    return $request->product();
});


Route::group(['middleware' => 'auth:api'], function(){

Route::get('products/{id}', 'API\ProductController@show');
Route::get('product-list', 'API\ProductController@index');
Route::get('favourite-products', 'API\ProductController@getFavouriteProducts');
Route::get('testprodfab', 'API\ProductController@favouriteProductsTest');

 Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::post('add-product', 'API\ProductController@create');
Route::put('products/{id}', 'API\ProductController@update');   
Route::delete('products/{id}', 'API\ProductController@destroy');
  });

});




//CRUD for category
Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->category();
});

Route::post('/category', function (Request $request) {
    return $request->category();
});

Route::group(['middleware' => 'auth:api'], function(){

Route::delete('category/{id}', 'API\CategoryController@destroy');
Route::get('category-list', 'API\CategoryController@index');   
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::post('add-category', 'API\CategoryController@create');
});
});


//CRUD for customer

Route::middleware('auth:api')->get('/Ahlancustomer', function (Request $request) {
    return $request->Ahlancustomer();
});
Route::post('/Ahlancustomer', function (Request $request) {
    return $request->Ahlancustomer();
});

Route::group(['middleware' => 'auth:api'], function(){

Route::get('customer-list', 'API\AhlancustomerController@index');
Route::get('customer/{mobileno}', 'API\AhlancustomerController@show');
Route::post('add-customer', 'API\AhlancustomerController@create');
Route::resource('API', 'AhlancustomerController');

});
//CRUD for statements
Route::middleware('auth:api')->get('/Ahlanstatement', function (Request $request) {
    return $request->Ahlanstatement();
});
Route::post('/Ahlanstatement', function (Request $request) {
    return $request->Ahlanstatement();
});
Route::group(['middleware' => 'auth:api'], function(){
//Route::get('ahlancustomer/{mobileno}', 'API\AhlancustomerController@display');
//Route::get('statements-list/{mobileno}', 'API\AhlanstatementController@getStatementList');
Route::get('myapi', 'API\AhlanstatementController@test');
Route::delete('statements/{id}', 'API\AhlanstatementController@destroy');
Route::get('statements/{royaltyid}', 'API\AhlanstatementController@show');
Route::get('statement-list/{mobileno}', 'API\AhlanstatementController@getStatementList');
Route::post('add-statement', 'API\AhlanstatementController@create');
});

//crud for favourate
Route::middleware('auth:api')->get('/Favouriteproduct', function (Request $request) {
    return $request->Favouriteproduct();
});
Route::post('/Favouriteproduct', function (Request $request) {
    return $request->Favouriteproduct();
});
Route::group(['middleware' => 'auth:api'], function(){
Route::post('add-favourite', 'API\FavouriteproductController@create');
Route::get('favourite', 'API\FavouriteproductController@show');
});

