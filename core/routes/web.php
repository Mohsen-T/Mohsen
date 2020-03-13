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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/hotel', 'HomeController@hotelView')->name('hotel');
Route::get('/bus-listing', 'HomeController@buslisting')->name('buslisting');
Route::get('/bus-payment', 'HomeController@buspayment')->name('buspayment');
Route::get('/flight-listing', 'HomeController@flightlisting')->name('flightlisting');
Route::get('/flight-payment', 'HomeController@flightpayment')->name('flightpayment');
Route::get('/holiday-detail', 'HomeController@holidaydetail')->name('holidaydetail');
Route::get('/holiday-listing', 'HomeController@holidaylisting')->name('holidaylisting');
Route::get('/holiday-payment', 'HomeController@holidaypayment')->name('holidaypayment');
Route::get('/hotel-detail', 'HomeController@hoteldetail')->name('hoteldetail');
Route::get('/hotel-listing', 'HomeController@hotellisting')->name('hotellisting');
Route::get('/hotel-payment', 'HomeController@hotelpayment')->name('hotelpayment');

Route::get('/about-us', 'HomeController@aboutus')->name('aboutus');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog-overview', 'HomeController@blogoverview')->name('blogoverview');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'home'], function () {
        Route::get('/', 'HomeController@index')->name('user.home');

        Route::group(['prefix' => 'security'], function() {
            Route::get('/', 'SecurityController@index')->name('security');

            Route::post('/creategauth', 'SecurityController@creategauth')->name('security.creategauth');
            Route::post('/verifyCreateAuth', 'SecurityController@verifyCreateAuth')->name('security.verifyCreateAuth');
            Route::post('/disableTwoFactorAuth', 'SecurityController@disableTwoFactorAuth')->name('security.disableTwoFactorAuth');
            Route::post('/sendSmsAuth', 'SecurityController@sendSmsAuth')->name('security.sendSmsAuth');
            Route::post('/changePass', 'SecurityController@changePass')->name('security.changePass');
            Route::post('/verify2FAuth', 'SecurityController@verify2FAuth')->name('security.verify2FAuth');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@index')->name('account');

            Route::post('/detail-update', 'ProfileController@detailUpdate')->name('profile.detail.update');
            Route::post('/smsverify', 'ProfileController@smsverify')->name('profile.smsverify');
            Route::post('/resendsmsverify', 'ProfileController@resendsmsverify')->name('profile.resendsmsverify');
            Route::post('/verifyCode', 'ProfileController@verifyCode')->name('profile.verifyCode');
        });
    });
});

Route::group(['prefix' => 'admin'], function () {

    // General Settings
    Route::get('/general', 'GeneralController@index')->name('general');
    Route::post('/general/update', 'GeneralController@update')->name('general.update');
    Route::get('/logo', 'GeneralController@logo')->name('logo');
    Route::post('/logo/update', 'GeneralController@logoupdate')->name('logo.update');
    Route::get('/change-profile', 'GeneralController@changeprofile')->name('change.profile');
    Route::post('/profile/update', 'GeneralController@updateprofile')->name('profile.update');
    Route::post('/password/update', 'GeneralController@updatepass')->name('password.update');

    //User Management
    Route::get('/users', 'UserlogController@index')->name('users');
    Route::post('/user/search', 'UserlogController@userSearch')->name('search.users');
    Route::get('/user/{user}', 'UserlogController@single')->name('user.single');
    Route::get('/user-banned', 'UserlogController@banusers')->name('user.ban');
    Route::get('/mail/{user}', 'UserlogController@email')->name('email');
    Route::post('/sendmail', 'UserlogController@sendemail')->name('send.email');
    Route::post('/user/balance/{user}', 'UserlogController@blupdate')->name('user.balance');
    Route::put('/user/status/{user}', 'UserlogController@statupdate')->name('user.status');
    Route::get('/broadcast', 'UserlogController@broadcast')->name('broadcast');
    Route::post('/broadcast/email', 'UserlogController@broadcastemail')->name('broadcast.email');
    Route::get('/user-translog', 'UserlogController@transLog')->name('users.transactions');

    //Admin Auth
    Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    //Stuff Management
    Route::get('/stuff-management','UserlogController@stuffManagement')->name('stuff.home');

});

Auth::routes();
