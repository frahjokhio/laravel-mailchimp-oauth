<?php

use App\Http\Controllers\MailchimpOAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MailchimpOAuthController::class, 'index'])->name("mailchimp.oauth.index");
Route::get('/redirect', [MailchimpOAuthController::class, 'redirect'])->name("mailchimp.oauth.redirect");
Route::get('/callback', [MailchimpOAuthController::class, 'callback'])->name("mailchimp.oauth.callback");
