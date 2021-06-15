<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/alunos', function(){
    return view('alunos.index');
})->name('alunos');

Route::get('/alunos/novo', function(){
    return view('alunos.store');
})->name('novo_aluno');

Route::get('/cursos', function(){
    return view('cursos.index');
})->name('cursos');

Route::get('/cursos/novo', function(){
    return view('cursos.store');
})->name('novo_curso');