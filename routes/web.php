<?php

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Auth::routes();
Route::post('contact', 'MessageController@store')->name('message.store');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::middleware(['auth'])->group(function(){

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/home', 'HomeController@index');

    Route::resource('producto', 'ProductoController');
    Route::get('/listarProductoPdf', 'ProductoController@listarPdf')->name('productos_pdf');
    Route::resource('venta', 'VentaController');
    Route::get('/pdfVenta/{id}', 'VentaController@pdf')->name('venta_pdf');
    Route::resource('cliente', 'ClienteController');
    Route::resource('roles', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('user', 'UserController');
    Route::put('user/{user}', 'UserController@updatePass')->name('user.updatePass');
    // Route::resource('user', 'UserController@getProfilePassword');
    // Route::resource('user', 'PerfilController');
    Route::resource('conceptos', 'ConceptoController');
    Route::resource('cingresos', 'ConceptoingresoController');
    Route::resource('cpotes', 'CuentapoteController');
    Route::resource('megresos', 'MovingresoegresoController');
    Route::resource('cargo', 'CargoController');
    Route::resource('nacionalidad', 'NacionalidadController');
    Route::resource('empresa', 'EmpresaController');
    Route::resource('dpto', 'DepartamentoController');
    Route::resource('dpto', 'DepartamentoController');
    Route::resource('fpago', 'FormapagoController');
    Route::resource('fpago', 'FormapagoController');
    Route::resource('saldo', 'SaldoController');
    Route::resource('reports', 'ReportsController');
    // Route::resource('perfil', 'PerfilController');
    // Route::post('user/{user}','UserController@updatePass')->name('user.updatePass');
    // Route::resource('mingresos', 'MovingresoController');
    // Route::get('megresos','MovingresoController@create')->name('megresos.createingreso');

    Route::get('cargos-list-pdf','CargoController@exportPdf')->name('cargos.pdf');
    Route::get('conceptos-list-pdf','ConceptoController@exportPdf')->name('conceptos.pdf');
    Route::get('dptos-list-pdf','DepartamentoController@exportPdf')->name('dptos.pdf');
    Route::get('ventas-list-pdf','VentaController@exportPdf')->name('ventas.pdf');
    Route::get('cliente-list-pdf','ClienteController@exportPdf')->name('cliente.pdf');
    Route::get('producto-list-pdf','ProductoController@exportPdf')->name('producto.pdf');
    Route::get('users-list-pdf','UserController@exportPdf')->name('users.pdf');
    // Route::get('conceptos-list-pdf','ConceptoegresoController@exportPdf')->name('conceptos.pdf');
    Route::get('cingresos-list-pdf','ConceptoingresoController@exportPdf')->name('cingresos.pdf');
    Route::get('cpotes-list-pdf','CuentapoteController@exportPdf')->name('cpotes.pdf');
    Route::get('megresos-list-pdf', 'MovingresoegresoController@exportPdf')->name('megresos.pdf');


    // Route::post('cliente', 'ClienteController@guardado')->name('cliente.guardado');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
