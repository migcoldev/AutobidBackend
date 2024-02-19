<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ScrappingHistoryController;

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

#Cron Jobs
Route::get('bid/list', [BidController::class, 'index']);
Route::post('bid/detail', [BidController::class, 'detail']);
Route::post('user/create', [UserController::class, 'create']);
Route::post('request/askus', [RequestController::class, 'askus']);

Route::group(['middleware' => ['localization']], function() {
    #Authentication
    Route::post('backoffice/signin', [AuthController::class, 'signin']);
    Route::post('authentication/login', [AuthController::class, 'login']);

    #Bid
    Route::post('backoffice/bid/all', [BidController::class, 'all']);
    Route::post('backoffice/bid/activate', [BidController::class, 'activate']);
    Route::post('backoffice/bid/deactivate', [BidController::class, 'deactivate']);
    Route::delete('backoffice/bid/delete', [BidController::class, 'delete']);

    #Contact Requests
    Route::get('backoffice/request/all', [RequestController::class, 'index']);
    Route::post('backoffice/request/detail', [RequestController::class, 'detail']);
    Route::delete('backoffice/request/delete', [RequestController::class, 'delete']);

    #Scrapping History
    Route::get('backoffice/scrapping/history', [ScrappingHistoryController::class, 'index']);

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['middleware' => ['auth:api', 'localization']], function() {
    #User
    Route::get('user/me', [UserController::class, 'me']);

    #Scrapping History
    Route::get('scrapping-history/list', [ScrappingHistoryController::class, 'index']);
});