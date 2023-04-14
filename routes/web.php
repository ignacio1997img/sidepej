<?php

use App\Http\Controllers\InboxController;
use App\Http\Controllers\OfficeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();


    // Para abrir al vista de los mensajes de perosnaria juridica
    Route::resource('inbox', InboxController::class);
    Route::get('inbox/list/{type}', [InboxController::class, 'derivacion_list']);
    Route::post('inbox/{id}/archivar', [InboxController::class, 'derivacion_archivar'])->name('inbox.archivar');

    




    Route::post('register-users', [UserController::class, 'store'])->name('store.users');
    Route::get('search', [UserController::class, 'getFuncionario'])->name('user.getFuncionario');

    Route::get('offices/{id}', [OfficeController::class, 'show'])->name('voyager.offices.show');

    // Route::resource('usuario', UserController::class);
    // Route::post('usuarios/desactivar', [UserController::class, 'desactivar'])->name('almacen_desactivar');
    // Route::post('usuarios/activar', [UserController::class, 'activar'])->name('almacen_activar');

});
