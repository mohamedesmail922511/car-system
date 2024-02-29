<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Check;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $type = Auth::user()->type;
        if ($type == '0') {
            return view('Emart.user');
        } elseif ($type == '1') {
            $services = Service::all();
            // $users = User::all();

            // $clients = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            //     ->whereYear('created_at', date('Y'))
            //     ->groupBy(DB::raw("month_name"))
            //     ->orderBy('id', 'ASC')
            //     ->pluck('count', 'month_name');

            // $labels = $clients->keys();
            // $data = $clients->values();

            // 'data', 'users', 'labels',
            return view('services.index', compact('services'));
        }
        elseif($type == '2'){
            $user = Auth::user();
            $tasks = $user->tasks;

            return view('Emart.user_tasks',compact('tasks'));
        }
        //  else {
        //     $services = Service::all();
        //     $clients = Client::all();
        //     $invoices = Invoice::all();
        //     $cars = Client::pluck('car_status');
        //     $nonfixedcars = Client::where('car_status', 'لم يتم التصليح')->get();
        //     $fixedcars = Client::where('car_status', 'تم الاصلاح')->get();
        //     $checks = Check::all();


        //     return view('services.index', compact('clients','invoices','cars','nonfixedcars','fixedcars','checks'));
        // }
    }
}
