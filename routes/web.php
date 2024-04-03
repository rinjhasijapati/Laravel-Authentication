<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/signup', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
// for Signup user 
Route::post('/store', function (Request $req) {
    $req->validate([
        'email' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);
    $parsedData = [
        'email' => $req->email,
        'password' => bcrypt($req->password),
        'username' => $req->username,
    ];
    User::create($parsedData);
    return redirect(route('login'));
})->name('register-user');


Route::post('/signin', function (Request $req) {
    $req->validate([
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
        // password is correct
        dd('Login vayo');
    } else {
        // login failed
        dd('login failed');
    }

    return response("la haiii, login garna layo tori le");
});