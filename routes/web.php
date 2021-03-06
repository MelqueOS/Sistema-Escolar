<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\HomeController;

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
Route::resources([
	"turma" => TurmaController::Class,
	"aluno" => AlunoController::Class,
	"nota" => NotaController::Class,
	"home" => HomeController::Class
]);

Route::get('/', function () {
    return view('welcome');
});
