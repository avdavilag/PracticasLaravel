<?php

use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Models\Profession;
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
});
Route::get('/usuarios', function () {
    return 'Usuarios';
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('users.show');
Route::get('/users/{user}/editar',[UserController::class, 'edit'])->name('users.edit');    
Route::get('/users/nuevo',[UserController::class, 'create'])->name('users.create');
Route::post('/users/crear',[UserController::class, 'store'])->name('users.store');    
Route::put('/users/{user}',[UserController::class, 'update'])->name('users.update');    
Route::get('/users/papelera',[UserController::class, 'trashed'])->name('users.trashed');
Route::patch('/users/{user}/papelera',[UserController::class, 'trash'])->name('users.trash');    

Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('users.delete');    

Route::get('/professions/nuevo',[ProfessionController::class, 'create'])->name('profession.create');
Route::post('/professions/crear',[ProfessionController::class, 'store'])->name('professions.store');  
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
//Profile
Route::get('/editar-perfil/',[ProfileController::class, 'edit'])->name('editar-perfil.edit');
Route::put('/editar-perfils/',[ProfileController::class, 'update'])->name('editar-perfil.update');
//Professions.
Route::get('/professions', [ProfessionController::class, 'index'])->name('professions.index');
Route::delete('/professions/{profession}', [ProfessionController::class, 'destroy'])->name('professions.delete');
//Skills
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');


