<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSubscriptioinController;


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

Route::get('user-subscription', [UserSubscriptioinController::class, 'user_subscription'])->name('user-subscription');
Route::post('user-subscription-action', [UserSubscriptioinController::class, 'user_subscription_action'])->name('user-subscription-action');
Route::get('user-welcome-email/{mail}', [UserSubscriptioinController::class, 'user_welcome_email'])->name('user-welcome-email');