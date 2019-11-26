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
    return view('welcome');
})->name('welcome');

Auth::routes();
// unit
Route::get('unit/get_models/{id}','UnitController@get_models')->name('unit.get_models');
Route::resource('unit', 'UnitController');


//impl
Route::get('impl/get_models','ImplController@get_models')->name('impl.get_models');
Route::resource('impl', 'ImplController');
//access
Route::get('access/get_models','AccessController@get_models')->name('access.get_models');
Route::resource('access', 'AccessController');

// unitmodel
route::get('/unitmodel/get_models','UnitmodelController@get_models');
Route::resource('unitmodel', 'UnitmodelController');

// Vend
Route::get('/vend/otc','VendController@otc_create')->name('vend.otc');
Route::get('/vend/unit','VendController@unit_create')->name('vend.unit');
Route::post('/vend/otc','VendController@otc_store')->name('vend.otc');
Route::post('/vend/unit','VendController@unit_store')->name('vend.unit');
Route::post('/vend/purchage','VendController@purchage')->name('vend.purchage');

// home
Route::get('/home', 'HomeController@index')->name('home');

//customer
Route::post('customer/show_/{id}','CustomerController@show_')->name('customer.show_');
Route::post('customer/checkout','CustomerController@checkout')->name('customer.checkout');
Route::resource('customer', 'CustomerController');

// bills
route::get('/bill/get_models/{id}','BillController@get_models')->name('bill.get_models');
Route::resource('bill', 'BillController');

// contact
Route::post('/contact/delete_contact/{id}','ContactController@delete_contact')->name('contact.delete_contact');
route::get('/contact/get_contacts/{id}','ContactController@get_contacts')->name('contact.get_contacts');
Route::post('contact/{id}/store','ContactController@user_store')->name('contact.user.store');
Route::resource('contact', 'ContactController');

// Address
Route::post('/address/delete_address/{id}','AddressController@delete_address')->name('address.delete_address');
route::get('/address/get_addresses/{id}','AddressController@get_addresses')->name('address.get_addresses');
Route::post('address/{id}/store','AddressController@user_store')->name('address.user.store');
Route::resource('address', 'AddressController');

// Document 
Route::post('document/{id}/store','DocumentController@user_store')->name('document.user.store');
Route::get('/document/get_documents/{id}','DocumentController@get_documents')->name('document.get_documents');
Route::post('/document/delete_document/{id}','DocumentController@delete_document')->name('document.delete_document');

// bill
Route::resource('bill', 'BillController');