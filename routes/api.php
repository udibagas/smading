<?php

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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

Route::post('logPintu', 'LogPintuController@store');

Route::get('aaa', function() {
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->get('http://192.168.1.177:8704');

    if ($result->getStatusCode() == 200) {
        return json_decode($result->getBody());
        // return response($result->getBody())
        //         ->header('Content-Type', 'application/json');
    } else {
        return ['status' => false];
    }
});
