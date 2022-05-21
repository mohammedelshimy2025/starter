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
});

Route::get('/adualt', function () {
    return 'Not adualt';
})->name('adualt.not');

Route::get('/landing', function () {
    return view('landing');
});

Route::group(['prefix' =>  LaravelLocalization::setLocale()] , function(){

  Route::group(['prefix' => 'offers'] , function(){
        Route::get('create' ,'OfferController@create');
        Route::post('store' ,'OfferController@store')->name('offer.store');

        Route::get('edit/{id}' ,'OfferController@editOffer')->name('offers.edit');
        Route::post('update/{id}' ,'OfferController@update')->name('offers.update');
        Route::get('delete/{id}' ,'OfferController@delete')->name('offers.delete');
        Route::get('all' ,'OfferController@getalldb')->name('offers.all');

        // Event And Listener
        Route::get('video' ,'OfferController@eventAndListener');

  });

});

// Form Login And Register / Admin
Route::get('/login/admin', 'Auth\LoginAdminController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Login And Admin Store Register
Route::post('/login/admin', 'Auth\LoginAdminController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// Form Login And Register / Admin
Route::get('/login/writer', 'Auth\LoginAdminController@showWriterLoginForm');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');
// Login And Register Store Admin
Route::post('/login/writer', 'Auth\LoginAdminController@writerLogin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter');


Route::get('site', 'HomeController@site')->middleware('auth:web');
Route::get('admins', 'Auth\LoginAdminController@admin')->middleware('auth');


Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
Route::view('/writer', 'writer')->middleware('auth:writer');


##################### Start Relations Route ############################


##################### Start Has One Relations Route ############################

Route::get('has-one/{id}' , 'Relations\RelationController@hasOne');
Route::get('has-one-reserve' , 'Relations\RelationController@hasOneRelationReserve');
Route::get('get-user-has-phone' , 'Relations\RelationController@getUserHasPhone');
Route::get('get-user-not-has-phone' , 'Relations\RelationController@getUserNotHasPhone');
Route::get('get-user-has-phone-with-condition' , 'Relations\RelationController@getUserHasPhoneWithCondition');

##################### End Has One Relations Route ############################

##################### Start One To Many Relations Route ############################

Route::get('has-many' , 'Relations\RelationController@gethospital');
Route::get('hospital' , 'Relations\RelationController@hospital');
Route::get('doctor/{hospital_id}' , 'Relations\RelationController@doctor')->name('hospital.doctor');
Route::get('delete/{hospital_id}' , 'Relations\RelationController@deleteHospital')->name('delete.hospital');

Route::get('hospital_has_doctors' , 'Relations\RelationController@hospitalHasDoctors');
Route::get('hospital_not_has_doctors' , 'Relations\RelationController@hospitalNotHasDoctors');
Route::get('hospital_has_doctors_male' , 'Relations\RelationController@hospitalHasDoctorsMale');


##################### End One To Many Relations Route ############################

##################### Start Many To Many Relations Route ############################

Route::get('doctor-service' , 'Relations\RelationController@getDoctorService');




##################### End Many To Many Relations Route ############################

################################## End Relations Route ###############################

Route::group(['prefix' => 'dashboard'] , function(){
  Route::get('create' , 'LoginController@create');
  Route::post('store' , 'LoginController@store')->name('login.store');

  Route::get('edit/{id}' , 'LoginController@edit');
  Route::post('update/{id}' , 'LoginController@update')->name('login.update');

});

Route::group(['prefix' =>  LaravelLocalization::setLocale()] , function(){

  Route::group(['prefix' => 'backEnd'] , function(){

    Route::get('create' , 'backEnd\backEndController@create');
    Route::post('store' , 'backEnd\backEndController@store')->name('sall.store');

    // Route::get('edit/{id}' , 'LoginController@edit');
    // Route::post('update/{id}' , 'LoginController@update')->name('login.update');

  });

});


Route::resource('mp3', 'Mp3Controller');

Route::get('mp3/{id}','Mp3Controller@download');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/redirect/{service}', 'SocialiteController@redirectToFacebook');
Route::get('/callback/{service}', 'SocialiteController@facebookCallback');
