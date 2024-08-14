<?php

use App\Http\Controllers\NotificationController;
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


Route::get('/', function () {
    return redirect()->route('subscribe.form');
});

Route::get('/test-notification', [NotificationController::class, 'sendNotificationTest']);
Route::get('/subscribe', [NotificationController::class, 'showSubscriptionForm'])->name('subscribe.form');
Route::put('/subscribe/{user}', [NotificationController::class, 'updateSubscriptions'])->name('subscribe');
Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');