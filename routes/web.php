<?php

use App\Mail\Emails;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Emart\CarController;
use App\Http\Controllers\Emart\WorkerController;
use App\Http\Controllers\SignaturePadController;
use App\Http\Controllers\Emart\AccountantController;
use App\Http\Controllers\Emart\CallCenterController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\payment\StripePaymentController;
use App\Http\Controllers\SmsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();


// car controller
Route::controller(CarController::class)->group(function () {
    Route::get('change/car/status/{id}', 'change_car_status')->name('change.car.status');
    // serach for car
    Route::get('search', 'search')->name('search');
    // hide
    Route::get('/cars/hide/{id}', 'hide')->name('car.hide');
});


// payement controller
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe/{id}', 'stripe')->name('stripe');
    Route::post('stripe/{id}', 'stripePost')->name('stripe.post');
});




Route::controller(WorkerController::class)->group(function () {
    // worker page tasks
    Route::get('workers/tasks', 'workers_tasks')->name('workers.tasks');
    // change.task.status
    Route::get('change/task/status/{id}', 'change_task_status')->name('change.task.status');
});



Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Accountant controller
    Route::controller(AccountantController::class)->group(function () {
        route::get('/index', 'index')->name('emart.index');
        route::get('emart/statistics', 'statistics')->name('emart.statistics');
        route::get('show/sales/statistics', 'show_sales_statistics')->name('show.sales.statistics');
        route::get('emart/invoice/page', 'invoice_page')->name('invoice.page');
        route::get('emart/invoices/page', 'invoices_page')->name('invoices.page');
        // alin invoices page
        route::get('alin/invoices/page', 'alin_invoices_page')->name('alin.invoices.page');
        // add.invoice
        Route::post('add/invoice', 'add_invoice')->name('add.invoice');
        // invoice.edit
        Route::get('invoice/edit/{id}', 'invoice_edit')->name('invoice.edit');
        // update.invoice
        Route::post('update/invoice/{id}', 'update_invoice')->name('update.invoice');
        // invoice.delete
        Route::get('invoice/delete/{id}', 'invoice_delete')->name('invoice.delete');
        // delete all invoices
        Route::get('delete/all/invoices', 'delete_all_invoices')->name('delete.all.invoices');
        // print invoice
        route::get('emart/print/invoice{id}', 'print_invoice')->name('print.invoice');
        // purches page
        route::get('emart/purches/page', 'purches_page')->name('purches.page');
        // add.purches
        Route::post('add/purches', 'add_purches')->name('add.purches');
        // item.delete
        Route::get('item/delete/{id}', 'item_delete')->name('item.delete');
        //delete.purches
        Route::get('delete/purches', 'delete_purches')->name('delete.purches');
        // check page
        route::get('emart/check/page', 'check_page')->name('check.page');
        // add.check
        Route::post('add/check', 'add_check')->name('add.check');
        //change.status
        Route::get('change/status/{id}', 'change_status')->name('change.status');
        //delete.check
        Route::get('delete/check/{id}', 'delete_check')->name('delete.check');
        // rent page
        route::get('emart/rent/page', 'rent_page')->name('rent.page');
        // add.bills
        Route::post('add/bills', 'add_bills')->name('add.bills');
        // bill.delete
        Route::get('bill/delete/{id}', 'bill_delete')->name('bill.delete');
        route::get('emart/worker/page', 'worker_page')->name('worker.page');
        //add.report
        Route::post('add/report', 'add_report')->name('add.report');
        //report.delete
        Route::get('report/delete/{id}', 'report_delete')->name('report.delete');
        // view reports
        route::get('emart/reports/page', 'reports_page')->name('reports.page');
        // search.report
        Route::get('search/report', 'search_report')->name('search.report');
        // add deaprtment
        Route::post('add/department', 'add_department')->name('add.department');
        // add worker
        Route::post('add/worker', 'add_worker')->name('add.worker');
        Route::get('privacy/policy', 'privacy')->name('privacy');
        // add.branch
        Route::post('add/branch','add_branch')->name('add.branch');
        // branch.invoice
        Route::get('branch/invoice/{id}','branch_invoice')->name('branch.invoice');
        // ranches.page
        Route::get('branches/page','branches_page')->name('branches.page');
        // branch.delete
        Route::get('branch/delete/{id}','branch_delete')->name('branch.delete');
        // branch.edit
        Route::get('branch/edit/{id}','branch_edit')->name('branch.edit');
        //edit.branch.confirmation
        Route::post('edit/branch/confirmation/{id}','edit_branch_confirmation')->name('edit.branch.confirmation');
    });

    // emart Call Center
    Route::controller(CallCenterController::class)->group(function () {
        Route::get('add/client/page', 'add_client_page')->name('add.client.page');
        // add client data
        Route::post('add/client', 'add_client')->name('add.client');
        // client.details or update client
        Route::get('client/details/{id}', 'client_details')->name('client.details');
        // update.client
        Route::post('update/client/{id}', 'update_client')->name('update.client');
        // show all clients
        Route::get('clients/page', 'clients_page')->name('clients.page');
        // search.client
        Route::get('search/client', 'search_client')->name('search.client');
        Route::get('pdr/page', 'pdr_page')->name('pdr.page');
        Route::get('paint/page', 'paint_page')->name('paint.page');
        Route::get('timeline/page', 'timelineـpage')->name('timeline.page');
        // search for timeline
        Route::get('timeline/search', 'timeline_search')->name('timeline.search');
        Route::post('add/timeline', 'add_timeline')->name('add.timeline');
        Route::get('delete/timeline/{id}', 'delete_timeline')->name('delete.timeline');
        Route::get('review/{id}', 'review')->name('review');
        Route::post('add/review/{id}', 'add_review')->name('add.review');
    });

    // service controller
    Route::controller(ServicesController::class)->group(function () {
        // services page
        Route::get('services/page', 'services_page')->name('services.page');
        //service.index
        Route::get('service/index', 'service_index')->name('service.index');
        //add service
        Route::post('add/service', 'add_service')->name('add.service');
        //delete.service
        Route::get('delete/service/{id}', 'delete_service')->name('delete.service');
        // edit.service
        Route::get('edit/service/{id}', 'edit_service')->name('edit.service');
        //edit.service.confirmation
        Route::post('edit/service/confirmation/{id}', 'edit_service_confirmation')->name('edit.service.confirmation');
        // employers that belongs to service
        Route::get('workers/{service}', 'show_employers')->name('workers.index');
        // add.employer
        Route::post('add/employer', 'add_employer')->name('add.employer');
        //delete.employer
        Route::get('delete/employer/{id}', 'delete_employer')->name('delete.employer');
        // add task
        Route::post('add/task/{id?}', 'add_task')->name('add.task');
        Route::get('employer/tasks/{employer}', 'employer_tasks')->name('employer.tasks');
        //delete.task
        Route::get('delete/task/{id}', 'delete_task')->name('delete.task');

        //------------------------------ nav botttom routes -----------------------------
        // show tasks
        Route::get('show/all/tasks', 'show_all_tasks')->name('show.all.tasks');
        // show all workers
        Route::get('show/workers', 'show_workers')->name('show.workers');

        // setting.service
        Route::get('setting/service/', 'setting_service')->name('setting.service');
        // statistics.page
        Route::get('statistics/page', 'statistics_page')->name('statistics.page');

        // search.page
        Route::get('search/page', 'search_page')->name('search.page');
    });
});
