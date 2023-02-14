<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoprod\DemoController;


Route::namespace('demoprod')->group(function () {
    Route::get('/',"LoginController@index");
	Route::get('login', "LoginController@index")->name('login');
    Route::post('login', "LoginController@login")->name('login');
    Route::get('logout',"LoginController@logout")->name('logout');
    Route::get('refresh_captcha', "LoginController@refreshCaptcha")->name('refresh_captcha');
});

Route::middleware('Login')->namespace('demoprod')->group(function () {

    Route::get('home',[DemoController::class,'index'])->name('home');
    Route::post('hello',[DemoController::class,'hello'])->name('hello');

}); 