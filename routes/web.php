<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/store', function (Request $req) {
    //check validation
    $validData = $req->validate([
        'email' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);

    //if no error
    User::create($validData);   

    return response('ok');
});