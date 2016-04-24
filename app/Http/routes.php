<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'index',
    'uses' => 'BulletinController@index',
]);
Route::get('personal', [
    'as' => 'personal',
    'middleware' => 'auth',
    'uses' => 'BulletinController@actionPersonal',
]);
Route::get('bulletin/create', [
    'as' => 'bulletin.create',
    'middleware' => 'auth',
    'uses' => 'BulletinController@create',
]);
Route::post('bulletin', [
    'as' => 'bulletin.store',
    'middleware' => 'auth',
    'uses' => 'BulletinController@store',
]);
Route::get('bulletin/{id}', [
    'as' => 'bulletin.show',
    'uses' => 'BulletinController@show',
]);

Route::post('offer', [
    'as' => 'offer.store',
    'middleware' => 'auth',
    'uses' => 'OfferController@store',
]);
Route::post('offer/apply', [
    'as' => 'offer.apply',
    'middleware' => 'auth',
    'uses' => 'OfferController@apply',
]);

Route::auth();