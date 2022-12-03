<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller1;
use App\Http\Controllers\controller2;
use App\Http\Controllers\controller3;
use App\Http\Controllers\controller4;
use App\Http\Controllers\GeneradorController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Exports\ExcelExport;
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

//------------------- Middleware para evitar retroceso despues de cerrar sesión -------------
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::name('home')->get('home/',[controller1::class, 'home']);
//---------------- Inicio Usuario ----------------------
Route::name('home2')->get('home2/',[controller1::class, 'home2']);
Route::name('login')->get('login/',[controller1::class, 'login']);
//Route::name('admin')->get('admin/',[controller1::class, 'admin']);
Route::name('validar')->post('validar/',[controller2::class, 'validar']);

Route::name('admin')->get('admin/',[controller3::class, 'consulta01']);
Route::name('datos01')->get('datos01/',[controller3::class, 'datos01']);

Route::name('guardar')->post('guardar/',[controller3::class, 'guardar']);
Route::name('editar')->get('editar/{id}',[controller3::class, 'editar']);
Route::name('guardar_edicion')->put('guardar_edicion/{id}',[controller3::class, 'guardar_edicion']);
Route::name('borrar')->get('borrar/{id}',[controller3::class, 'borrar']);

Route::name('productos')->get('productos/',[controller1::class, 'productos']);
Route::name('servicios')->get('servicios/',[controller1::class, 'servicios']);
//-------------------- Seccion Productos/Servicios Usuario -------------------
Route::name('productos2')->get('productos2/',[controller1::class, 'productos2']);
Route::name('servicios2')->get('servicios2/',[controller1::class, 'servicios2']);
Route::name('logout')->get('logout/',[controller2::class, 'logout']);
//--------------------- Guardar registro de nuevo usuario ----------------
Route::name('save')->post('save/',[controller3::class, 'save']);

Route::name('perfil')->get('perfil/',[controller1::class, 'perfil']);    

//--------------------- Formulario Contactanos Inicio ------------
Route::name('contactanos')->post('contactanos/',[controller4::class, 'contactanos']);
//---------------------- Adquirir producto ---------------------
Route::name('adquirir')->post('adquirir/',[controller3::class, 'adquirir']);
Route::name('adquirir2')->post('adquirir2/',[controller3::class, 'adquirir2']);
//---------------------- Borrar producto de usuario ------------
Route::name('borrar2')->get('borrar2/{id}',[controller3::class, 'borrar2']);
//---------------------- Logs -----------------------------------
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
//---------------------- PDF -----------------------------------
Route::name('print')->get('/imprimir', [GeneradorController::class, 'imprimir']);
Route::name('pdf')->get('pdf/', [GeneradorController::class, 'pdf']);
//--------------------------- Rutas Password Reset ----------------
Route::name('password')->get('password/', [PasswordController::class, 'password']);
Route::name('validar2')->post('validar2/',[PasswordController::class, 'validar2']);
Route::name('newpassword')->get('newpassword/{id}', [PasswordController::class, 'newpassword']);
Route::name('reset')->put('reset/{id}',[PasswordController::class, 'reset']);
//----------------------- Eliminar cuenta de usuario ---------------
Route::name('eliminarcuenta')->post('eliminarcuenta/{id}',[controller3::class, 'eliminarcuenta']);
//------------------ pruebas de css de correos ---------------
Route::name('mail3')->get('mail3/',[controller3::class, 'mail3']);
Route::name('mail4')->get('mail4/',[controller3::class, 'mail4']);
Route::name('mail')->get('mail/',[controller3::class, 'mail']);
//--------------------- Rutas excel ----------------------
Route::name('exportar')->get('exportar/',[GeneradorController::class, 'exportar']);

//---------------------- Pagar con paypal --------------------
Route::name('pagar')->get('pagar/{id}/{desc}/{id2}',[PaymentController::class, 'payWithPayPal']);
Route::name('status')->get('status/{id2}',[PaymentController::class, 'payPalStatus']);

//----------------------- Buscar productos ------------------
Route::name('buscarpro')->get('buscarpro/',[controller3::class, 'buscarpro']);

});