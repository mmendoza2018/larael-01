<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

/* //como llamar un view directamente en la ruta
Route::get('/', function () {
    return view('welcome');
}); */


#login
Route::get('/login', [LoginController::class, 'index' ])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin' ]);

//el name agregamos como un identificador de la ruta, por si mas adelante nos pidan cambiar la ruta ya no actualizaremos donde usamos esta ruta en el proyecto
// y si tenemos varias peticiones con la misma ruta, el primer name vale para los que siguen debajo 
Route::get('/registro', [RegisterController::class, 'viewRegister'])->name('registro');
Route::post('/registro', [RegisterController::class, 'addRegister' ]);

#muro
//Route::get('/muro', [PostController::class, 'index' ])->name('muroUser');
#agregar una ruta dinamica
#agregamos el modelo seguido de : para poner el username como slug en la URL
Route::get('/{user:username}', [PostController::class, 'index' ])->name('muroUser');
Route::get('/posts/registro', [PostController::class, 'registro' ])->name('registroPost');



#logout
Route::post('/logout', [LogoutController::class, 'store' ])->name('logout');

