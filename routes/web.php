<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Painel\EmployeesController;
use App\Http\Controllers\Painel\ServicesController;
use App\Http\Controllers\Painel\CalendarController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ScheduleController::class, 'home']);
Route::get('/buscar/horario', [ScheduleController::class, 'buscarHorario']);
Route::get('/servico/{service}', [ScheduleController::class, 'schedule'])->name('schedule');
Route::get('/getHorarios/{employeeId}', [ScheduleController::class, 'getHorarios']);
Route::post('/agendarHorario', [ScheduleController::class, 'agendarHorario']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', function() {
        return view('painel.home');
    })->name('home');

    

    Route::get('/painel/funcionarios', [EmployeesController::class, 'show'])->name('employees-show');
    Route::get('/painel/funcionario/form', [EmployeesController::class, 'create'])->name('employees-form');
    Route::post('/painel/funcionario/registro', [EmployeesController::class, 'store'])->name('employees-store');
    Route::get('/painel/funcionario/{id}', [EmployeesController::class, 'edit'])->name('employees-edit');
    Route::put('/painel/funcionario/update/{id}', [EmployeesController::class, 'update'])->name('employees-update');
    Route::delete('/painel/funcionario/apagar/{id}', [EmployeesController::class, 'destroy'])->name('employees-destroy');

    Route::get('/painel/servicos', [ServicesController::class, 'show'])->name('service-show');
    Route::get('/painel/servico/form', [ServicesController::class, 'create'])->name('service-form');
    Route::post('/painel/servico/registro', [ServicesController::class, 'store'])->name('service-store');
    Route::get('/painel/servico/{id}', [ServicesController::class, 'edit'])->name('service-edit');
    Route::put('/painel/servico/update/{id}', [ServicesController::class, 'update'])->name('service-update');
    Route::delete('/painel/servico/apagar/{id}', [ServicesController::class, 'destroy'])->name('service-destroy');

    Route::get('/painel/calendario', [CalendarController::class, 'show'])->name('calendar-show');
    Route::get('/painel/events', [CalendarController::class, 'getEvents'])->name('calendar-event');
    Route::post('/painel/events/add', [CalendarController::class, 'storeEvents'])->name('calendar-event-store');
    Route::get('/painel/events/available/times', [CalendarController::class, 'timesEvents'])->name('calendar-event-times');
});