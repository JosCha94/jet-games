<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SesionUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductosController;
use App\Http\Controllers\Site\JuegosController;
use App\Http\Controllers\Site\UsuarioController;

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
//RUTAS ADMINISTRADOR
Route::get('/jetgames/login', [SesionUserController::class, 'login'])->name('login');
Route::post('/iniciarsession',[SesionUserController::class,'autenticacion'])->name('autenticacionUser');
Route::post('/cerrarsession',[SesionUserController::class,'logout'])->name('logout');

Route::get('/main-page', [UserController::class, 'index'])->name('main-page')->middleware('admin');
Route::post('/nuevousuario', [UserController::class, 'store'])->name('newuser');
Route::get('/main-page/crear-user', [UserController::class, 'create'])->name('creauser')->middleware('admin');
Route::get('/main-page/usuarios', [UserController::class, 'show'])->name('veruser')->middleware('admin');
Route::DELETE('/main-page/usuarios/{user}', [UserController::class, 'destroy'])->name('borrarusuario')->middleware('admin');

Route::get('/main-page/productos', [ProductosController::class, 'index'])->name('listproducts')->middleware('admin');
Route::post('/main-page/productos', [ProductosController::class, 'store'])->name('storeproduct')->middleware('admin');
Route::get('/main-page/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('editproduct')->middleware('admin');
Route::patch('/main-page/productos/{producto}', [ProductosController::class, 'update'])->name('updateproduct');
Route::DELETE('/main/productos/{producto}', [ProductosController::class, 'destroy'])->name('borrarproducto');

//RUTAS JUEGOS
Route::get('/', [JuegosController::class, 'index'])->name('index');
Route::get('/jetgames/xbox_360', [JuegosController::class, 'xbox_360'])->name('listjuegos_360');
Route::get('/jetgames/pc', [JuegosController::class, 'pc'])->name('listjuegos_pc');
Route::get('/jetgames/switch', [JuegosController::class, 'switch'])->name('listjuegos_switch');
Route::get('/jetgames/ps4', [JuegosController::class, 'ps4'])->name('listjuegos_ps4');
Route::get('/jetgames/xbox_one', [JuegosController::class, 'xbox_one'])->name('listjuegos_one');
Route::get('/jetgames/ps3', [JuegosController::class, 'ps3'])->name('listjuegos_ps3');Route::get('/jetgames/wii', [JuegosController::class, 'wii'])->name('listjuegos_wii');

Route::get('/jetgames/new_user', [UsuarioController::class, 'create'])->name('nuevouser');
Route::post('/jetgames/new_user', [UsuarioController::class, 'store'])->name('crearuser');