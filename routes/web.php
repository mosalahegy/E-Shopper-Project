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

// === Admin Routes === //

Route::group(['middleware' => ['web','isAdmin']],function(){
    // Dashboard
    Route::get('/dashboard','AdminController@index');
    
    // Admin Roles On Users
    Route::resource('/dashboard/users','UserController');
    Route::get('/dashboard/users/{id}/delete','UserController@destroy');
    Route::get('/dashboard/users/{id}/approve','UserController@approve');
    Route::get('/dashboard/users/{id}/disable','UserController@disable');

    // Admin Roles On Sitesettings
    Route::resource('/dashboard/sitesettings','SitesettingController');
    Route::get('/dashboard/sitesettings/{id}/delete','SitesettingController@destroy');

    // Admin Roles On Categoris
    Route::resource('/dashboard/categories','CategoryController');
    Route::get('/dashboard/categories/{id}/delete','CategoryController@destroy');
    Route::get('/dashboard/categories/{id}/approve','CategoryController@approve');
    Route::get('/dashboard/categories/{id}/disable','CategoryController@disable');

    // Admin Roles On Products
    Route::resource('/dashboard/products','ProductController');
    Route::get('/dashboard/products/{id}/delete','ProductController@destroy');
    Route::get('/dashboard/products/{id}/approve','ProductController@approve');
    Route::get('/dashboard/products/{id}/disable','ProductController@disable');
    
    // Admin Roles On Sliders
    Route::resource('/dashboard/sliders','SliderController');
    Route::get('/dashboard/sliders/{id}/delete','SliderController@destroy');
    Route::get('/dashboard/sliders/{id}/approve','SliderController@approve');
    Route::get('/dashboard/sliders/{id}/disable','SliderController@disable');
    
    // Admin Roles On Brands
    Route::resource('/dashboard/brands','BrandController');
    Route::get('/dashboard/brands/{id}/delete','BrandController@destroy');
    Route::get('/dashboard/brands/{id}/approve','BrandController@approve');
    Route::get('/dashboard/brands/{id}/disable','BrandController@disable');

    // Admin Roles On Advertisements
    Route::resource('/dashboard/advertisements','AdvertisementController');
    Route::get('/dashboard/advertisements/{id}/delete','AdvertisementController@destroy');
    Route::get('/dashboard/advertisements/{id}/approve','AdvertisementController@approve');
    Route::get('/dashboard/advertisements/{id}/disable','AdvertisementController@disable');
    // Admin Roles On Contacts Messages
    Route::get('/dashboard/contacts','ContactController@showAll');
    Route::get('/dashboard/contacts/{id}','ContactController@show');
    Route::get('/dashboard/contacts/{id}/delete','ContactController@destroy');
    Route::get('/dashboard/contacts/{id}/approve','ContactController@approve');
    Route::get('/dashboard/contacts/{id}/disable','ContactController@disable');
    Route::post('/dashboard/contacts/reply','ContactController@reply');
    // Admin Profile
    Route::get('/dashboard/profile/{id}','AdminController@profile');   
    Route::patch('/dashboard/profile/{id}/change-background-image','AdminController@changeBackGroundImage'); 
    Route::patch('/dashboard/profile/{id}/changeimage','AdminController@changeProfileImage');
});

// === Admin Routes === //



// === Website Routes === //

Route::get('/','PagesController@index');
Route::get('/products','PagesController@products');
Route::get('/products/search','PagesController@search');
Route::get('/products-details','PagesController@productsDetails');
Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@store');
Route::group(['middleware' => ['auth']],function(){

    Route::get('/cart','CartController@index');
    Route::get('/add-to-cart/{id}','CartController@add');
    Route::get('/cart/{id}/delete','CartController@delete');

    Route::get('/wishlist','WishlistController@index');
    Route::get('/add-to-wishlist/{id}','WishlistController@add');
    Route::get('/wishlist/{id}/delete','WishlistController@delete');

});
Route::get('/single/{id}','PagesController@singleProduct');
Route::get('/price',function(){
    dd(Request::all());
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','UserController@logout');
// === Website Routes === //

// === Auth Routes === //

Auth::routes();

// === Auth Routes === //