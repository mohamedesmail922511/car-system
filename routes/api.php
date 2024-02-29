<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(ApiController::class)->group(function(){
    // show users
    Route::get('/users','users')->name('users');
    // show services
    Route::get('/services','services')->name('services');
    // show employer related to service
    Route::get('/employers/{id}','showEmployers');
    // show tasks related employer
    Route::get('/tasks/{id}','showTasks');
    
    
    // show tasks with emplyers
    Route::get('/tasks','tasks')->name('tasks');
    // show workers with tasks
    Route::get('/employers','employers')->name('emplayers');
    // show invoices
    Route::get('/invoices','invoices')->name('invoices');
    // show invoices
    Route::get('/clients','clients')->name('clients');
    // show checks
    Route::get('/checks','checks')->name('checks');
    // add services
    Route::post('add/service','add_service')->name('add.service');
    // add invoice 
    Route::post('add/invoice','add_invoice')->name('add.invoice');
    // add check
    Route::post('add/check','add_check')->name('add.check');
     // delete check
    Route::delete('/delete/check/{id}','delete_check')->name('delete.check');
    // delete employer
    Route::delete('/delete/employer/{id}','delete_emoloyer')->name('delete.emoloyer');
     // delete task
    Route::delete('/delete/task/{id}','delete_task')->name('delete.task');
    // add task 
    Route::post('/add/task/{id}','add_task')->name('add.task');
    // add new Worker
    Route::post('add/worker','add_worker')->name('add.worker');























    Route::get('workers/{service}','show_workers')->name('show.workers');








    
    
    // // show all clients
    // Route::get('clients','clients')->name('clients');
    // // store client 
    // Route::post('add/client', 'add_client')->name('add.client');
    // // add service
    // Route::post('add/service', 'store')->name('add.service');
});
