<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\RestPasswordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
//route pour les profils
Route::get('/profil/index',[ProfilController::class,'index'])->name('profil.index');
Route::get('/profil/create',[ProfilController::class,'create'])->name('profil.create');
Route::put('/profil/store',[ProfilController::class,'store'])->name('profil.store');
Route::get('/profil/edit/{id}',[ProfilController::class,'edit'])->name('profil.edit');
Route::put('/profil/update/{id}',[ProfilController::class,'update'])->name('profil.update');
Route::get('/profil/delete/{id}',[ProfilController::class,'destroy'])->name('profil.delete');
//route les users
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::put('/user/store',[UserController::class,'store'])->name('user.store');
Route::get('/',[UserController::class,'login'])->name('user.login');
Route::post('/user/authentication',[UserController::class,'authenticate'])->name('user.authenticate');
Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::put('/user/update/{id}',[UserController::class,'update'])->name('user.update');
Route::get('/user/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
Route::get('/user/logout',[UserController::class,'logout'])->name('user.logout');
//renitialisation du mot de passe
Route::get('user/new-password/{token}', [NewPasswordController::class, 'create'])
->name('user.password');


// Route::get('user/new-password/{token}', function ($token) {
//     return view('user.new-password', ['token' => $token]);})->name('user.password');

//recuperation du mot de passe
Route::get('/user/password', function () {
    return view('user.forgot-password');
})->name('user.password');





Route::post('/user/email',[RestPasswordController::class,'store'])->name('user.email');


Route::post('user/rest/', [NewPasswordController::class, 'store'])
->name('user.update');
//route pour les edideurs
Route::get('/editeur',[EditeurController::class,'index'])->name('editeur.index');
Route::get('/editeur/create',[EditeurController::class,'create'])->name('editeur.create');
Route::post('/editeur/store',[EditeurController::class,'store'])->name('editeur.store');
Route::get('/editeur/edit/{id}',[EditeurController::class,'edit'])->name('editeur.edit');
Route::post('/editeur/update/{id}',[EditeurController::class,'update'])->name('editeur.update');
Route::get('/editeur/delete/{id}',[EditeurController::class,'destroy'])->name('editeur.delete');
//route pour les genres
Route::get('/genre',[GenreController::class,'index'])->name('genre.index')->middleware('auth');
Route::get('/genre/create',[GenreController::class,'create'])->name('genre.create');
Route::put('/genre/store',[GenreController::class,'store'])->name('genre.store');
Route::get('/genre/edit/{id}',[GenreController::class,'edit'])->name('genre.edit');
Route::post('/genre/update/{id}',[GenreController::class,'update'])->name('genre.update');
Route::get('/genre/delete/{id}',[GenreController::class,'destroy'])->name('genre.delete');
//route pour les livres
Route::get('/livre',[LivreController::class,'index'])->name('livre.index')->middleware('auth');
Route::get('/livre/create',[LivreController::class,'create'])->name('livre.create')->middleware('auth');
Route::put('/livre/store',[LivreController::class,'store'])->name('livre.store')->middleware('auth');
Route::get('/livre/vue',[LivreController::class,'store'])->name('livre.vue')->middleware('auth');
Route::get('/livre/show/{id}',[LivreController::class,'show'])->name('livre.show')->middleware('auth');
Route::get('/livre/edit/{id}',[LivreController::class,'edit'])->name('livre.edit')->middleware('auth');
Route::put('/livre/update/{id}',[LivreController::class,'update'])->name('livre.update')->middleware('auth');
Route::get('/livre/delete/{id}',[LivreController::class,'destroy'])->name('livre.delete')->middleware('auth');
//creation d'un client
Route::get('/client/create',function(){
    return view('client.create');

});


require __DIR__.'/auth.php';
