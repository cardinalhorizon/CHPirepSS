<?php

Route::group(['middleware' => 'auth'], function() {
Route::get('/acarstomanual/{pirep}', [\Modules\CHPirepSS\Http\Controllers\Frontend\IndexController::class, 'acarstomanual'])->name('atm');
});
/*
 * To register a route that needs to be authentication, wrap it in a
 * Route::group() with the auth middleware
 */
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/', 'IndexController@index');
// })
