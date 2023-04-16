<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main as Main;

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
    return view('instrucciones');
});


Route::get('/preguntas/{tagged?}/{fromdate?}/{todate?}',[Main::class, 'index']);