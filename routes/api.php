<?php

use App\Http\Controllers\Meetings\Api\AddAgendaItem;
use App\Http\Controllers\Meetings\Api\ToggleAgendaPrivacy;
use App\Http\Controllers\Meetings\Api\UpdateAgendaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('meetings')->group(function () {

    // TODO should be properly prefixed /{meetingId}/agenda/[action]
    Route::post('add-item', AddAgendaItem::class);
    Route::post('make-agenda-private', ToggleAgendaPrivacy::class);
    Route::put('update-agenda-item', UpdateAgendaItem::class);
});
