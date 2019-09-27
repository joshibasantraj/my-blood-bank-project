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

Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/contact_us','FrontendController@contact_us')->name('contact_us');
Route::get('/about_us','FrontendController@about_us')->name('about_us');
Route::get('/donor_register','FrontendController@register')->name('donor_register');
Route::get('/request','FrontendController@request')->name('request');
Route::get('/view_request','FrontendController@view_request')->name('view_request');
Route::get('/camps','FrontendController@camps')->name('camps');
Route::get('/signin','FrontendController@signin')->name('signin');
Route::get('/search','FrontendController@search')->name('search');
Route::get('/donorhelp','FrontendController@donorhelp')->name('donorhelp');
Route::get('/camp-images/{id}','FrontendController@allcampimages')->name('camp_galleries');


Route::resource('store_Donor','DonorRegistrationController');
Route::post('donor_login','DonorRegistrationController@donor_login')->name('donor_login');

Route::resource('store_request','RequestController');






Route::resource('contact','ContactController');

Route::resource('news','NewsController');
Route::resource('image','ImageController');



Route::get('/searchblood','DonorRegistrationController@searchblood')->name('searchblood');

Auth::routes();

Route::get('/register', function(){
    return redirect()->route('login');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::get('/','HomeController@admin')->name('admin');
    Route::resource('camp','CampController');
    Route::resource('donor','DonorController');
    Route::resource('blood_request','AdminRequestController');
    Route::get('/profile','DonorController@adminProfile')->name('admin-profile');          
    Route::put('/profile/{id}','DonorController@UpdateAdmin')->name('admin-update');
    Route::resource('blood','BloodController');
    Route::resource('contact','ContactController');
});



Route::group(['prefix'=>'donor','middleware'=>['auth','donor']], function(){
    Route::get('/','HomeController@donor')->name('donor');
    Route::get('change_profile','DonorPanelController@change_profile')->name('change_profile');
    Route::put('update_profile/{id}','DonorPanelController@update_profile')->name('update_profile');
    Route::get('signout','DonorPanelController@signout')->name('signout');
    Route::resource('donorpanel','DonorPanelController');
    Route::get('donationhistory','DonorPanelController@donationhistory')->name('blood_history');
    Route::get('view_request','DonorPanelController@request_view')->name('request_view');
    Route::get('change_password','DonorPanelController@change_password')->name('change_password');
    Route::put('update_password/{id}','DonorPanelController@update_password')->name('update_password');

});
