<?php

namespace App\Http\Controllers\Services;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Employer;
use App\Notifications\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ServicesController extends Controller
{

    // service_index
    public function service_index(){
        $services = Service::all();
        return view('services.index',compact('services'));
    }
    public function services_page()
    {
        $services = Service::all();
        $users = User::all();
        $clients = Client::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'month_name');

        $labels = $clients->keys();
        $data = $clients->values();

        return view('services.dashboard', compact('users', 'services', 'labels', 'data'));
    }



    public function add_service(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('services', $imagename);
            $service->image = $imagename;
        }

        $service->save();
        return redirect()->back()->with('msg', 'Service Added Successfully');
    }




    //delete_service
    public function delete_service($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back();
    }




    // edit_service
    public function edit_service($id)
    {
        // $data = Service::all();
        $service = Service::find($id);
        return view('services.edit_service', compact('service'));
    }



    // edit_service_confirmation
    public function edit_service_confirmation(Request $request, $id)
    {
        $service = Service::find($id);
        $service->name = $request->name;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('services', $imagename);
            $service->image = $imagename;
        }

        $service->save();
        return redirect()->back()->with('msg', 'Service updated successfully');
    }



    //show_employers
    public function show_employers(Service $service)
    {
        $employers = $service->employers;
        $service = Service::find($service->id);
        $data = Service::all();
        $users = User::all();
        return view('services.employers', compact('employers', 'data', 'users', 'service'));
    }

    // add_employer
    public function add_employer(Request $request, User $user)
    {
        $employer = new Employer();
        $employer->user_id = $request->name;
        $user = User::find($request->name);
        $employer->name = $user->name;
        $employer->service_id = $request->service;
        $employer->save();
        return redirect()->back();
    }

    //delete_employer
    public function delete_employer($id)
    {
        $employer = Employer::find($id);
        $employer->delete();
        return redirect()->back();
    }

    public function add_task(Request $request, $id = null)
    {
        $task = new Task();
        $task->car_no = $request->car_no;
        $task->task = $request->task;
        $task->employer_id = $id;
        $user = Employer::find($id);
        $task->user_id = $user->user_id;
        $userName = $user->name;
        $task->task_time = $request->task_time;
        $task->save();




        $users = User::where('id', '!=', auth()->user()->id)->get();
        $user_name = auth()->user()->name;
        Notification::send($users, new Tasks($task->id, $user_name, $task->task, $task->car_no, $userName));
        return redirect()->back();
    }

    public function employer_tasks(Employer $employer)
    {
        $tasks = $employer->tasks;
        $users = User::all();
        $data = Service::all();
        return view('services.tasks', compact('tasks', 'users', 'data'));
    }

    public function delete_task($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }



    // navigation bottom function

    // show_all_tasks
    public function show_all_tasks()
    {
        $tasks = Task::with('employer')->get();
        $data = Service::all();
        $users = User::all();
        return view('services.show_all_tasks', compact('tasks', 'data', 'users'));
    }
    // show_workers
    public function show_workers()
    {
        $employers = Employer::with('tasks')->get();
        return view('services.show_workers', compact('employers'));
    }

    // setting_service
    public function setting_service()
    {
        $data = Service::all();
        return view('services.setting_service', compact('data'));
    }

    //statistics_page
    public function statistics_page(){
        $employers = Employer::with('tasks')->get();
        return view('services.statistics',compact('employers'));
        
    }

    // search_page
    public function search_page(){
        return view('Emart.search');
    }
}
