<?php

use App\Http\Controllers\Meetings\ListMeetingsController;
use App\Http\Controllers\Meetings\RsvpToMeetingController;
use App\Http\Controllers\Meetings\ShowMeetingController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('meetings')->group(function () {

    Route::get('{meetingId}/public', ShowMeetingController::class)->name('showPublicMeeting');
    Route::post('{meetingId}/rsvp', RsvpToMeetingController::class)->name('rsvpToMeeting');

    Route::middleware('auth')->group(function () {
        Route::get('/', ListMeetingsController::class)->name('listMeetings');
        Route::get('{meetingId}', ShowMeetingController::class)->name('showMeeting');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
