<?php

use Illuminate\Support\Facades\Log;
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

Route::get('/click', function () {
    Log::info('O usuário clicou no botão verde', [
        'action' => config('enums.log_types.click'),
        'user' => random_int(1, 9999)
    ]);
    dd('usuário clicou');
});

Route::get('/delete', function () {
    Log::info('O usuário excluiu a informação', [
        'action' => config('enums.log_types.delete'),
        'user' => random_int(1, 9999),
        'data' => 'qualquer info deletada'
    ]);
    dd('usuário deletou');
});

Route::get('/update', function () {
    Log::info('O usuário editou a informação', [
        'action' => config('enums.log_types.update'),
        'user' => random_int(1, 9999),
        'data' => 'qualquer info editada'
    ]);

    dd('usuário editou');
});

Route::get('/select', function () {
    Log::info('O usuário buscou aas informações', [
        'action' => config('enums.log_types.select'),
        'user' => random_int(1, 9999),
        'data' => 'qualquer info buscada'
    ]);

    dd('usuário buscou info');
});

Route::get('/insert', function () {
    Log::info('O usuário inseriu info', [
        'action' => config('enums.log_types.insert'),
        'user' => random_int(1, 9999),
        'data' => 'qualquer info inserida'
    ]);

    dd('usuário inseriu info');
});
