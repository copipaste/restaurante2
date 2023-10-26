<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\personalController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\InsumoController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';



//---------------------------rutas promociones---------------------JHOEL--------------------------//
Route::middleware('auth')->group(function () {
    Route::resource('/promocion', PromocionController::class)->names('promocion');
});
//---------------------------rutas promociones---------------------JHOEL--------------------------//

//---------------------------rutas roles y permisos---------------------JHOEL--------------------------//
Route::middleware('auth')->group(function () {
    Route::resource('/role', RoleController::class)->names('role');
    Route::resource('/permiso', PermisoController::class)->names('permiso');
});
//---------------------------rutas roles y permisos---------------------JHOEL--------------------------//

//---------------------------categorias---------------------JHOEL--------------------------//
Route::middleware('auth')->group(function () {
    Route::resource('/categoria', categoriaController::class)->names('categoria');
});
//---------------------------categorias---------------------JHOEL--------------------------//

//---------------------------log---------------------JHOEL--------------------------//
Route::get('/ver-log', [LogController::class, 'verLog'])->name('verlog');
//---------------------------log---------------------JHOEL--------------------------//

//---------------------------insumos---------------------JHOEL--------------------------//
Route::middleware('auth')->group(function () {
    Route::resource('/insumo', InsumoController::class)->names('insumo');
});
//---------------------------insumos---------------------JHOEL--------------------------//





//---------------------------------Juan Pablo(crud clientes)--------------------------------------------
Route::resource('/cliente', ClienteController::class)->names('clientes');

// Route::get('/cliente/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');
// Route::delete('/clientes/{cliente}', 'ClienteController@destroy')->name('clientes.delete');
// Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
// Route::put('/clientes/{cliente}', 'ClienteController@update')->name('clientes.update');
//---------------------------------Juan Pablo(crud clientes)--------------------------------------------


//TODO: borrar el comentario de abajo para que solamente los usuarios autenticados puedan acceder a las rutas
// -------------------------------- ALEX (RUTAS DE AMBIENTES) ------------------------------------
Route::middleware('auth')->group(function () {
    Route::resource('/ambiente', AmbienteController::class)->names('ambiente');
});
//-------------------------------------------------------------------------------------------------

//--------------------------------- ALEX (crud proveedores) ---------------------------------------
Route::middleware('auth')->group(function () {
    Route::resource('/proveedor', ProveedorController::class)->names('proveedor');
});
//-------------------------------------------------------------------------------------------------

//--------------------------------- ALEX (CRUD ALMACEN) ---------------------------------------
Route::middleware('auth')->group(function () {
    Route::resource('/almacen', AlmacenController::class)->names('almacen');
});
//-------------------------------------------------------------------------------------------------

//---------------------------------Juan Pablo(crud clientes)--------------------------------------------
Route::resource('/cliente', ClienteController::class)->names('clientes');
//-------------------------------------------------------------------------------------------------

//---------------------------------Juan Pablo(crud personal)--------------------------------------------
Route::resource('/personal', personalController::class)->names('personal');
//-------------------------------------------------------------------------------------------------

//---------------------------------Juan Pablo(crud producto)--------------------------------------------
Route::resource('/producto', productoController::class)->names('producto');
//-------------------------------------------------------------------------------------------------


