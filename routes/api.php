<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function (){
    Route::get('/contacts', 'ContactsController@index');
    Route::post('/contacts', 'ContactsController@store');
    Route::get('/contacts/{contact}', 'ContactsController@show');
    Route::patch('/contacts/{contact}', 'ContactsController@patch');
    Route::delete('/contacts/{contact}', 'ContactsController@destroy');
});


