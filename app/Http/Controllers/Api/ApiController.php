<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\Check;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApiController extends Controller
{
    // show users
    public function users(){
        $users = User::all();
        return response()->json($users);
    }
    // show services
    public function services()
    {
        $services = Service::get();
        return response()->json($services);
    }
    
    public function showEmployers($id) {
    $service = Service::findOrFail($id);
    return response()->json($service->employers);
     }

    // EmployerController.php
    public function showTasks($id) {
        $employer = Employer::findOrFail($id);
        return response()->json($employer->tasks);
    }


    // show tasks
    public function tasks(){
        $tasks = Task::with('employer')->get();
        return response()->json($tasks);
    }

    // show employers
    public function employers(){
        $employers = Employer::with('tasks')->get();
        return response()->json($employers);
    }
 

    // show invoices
    public function invoices(){
        $invoices = Invoice::all();
        return response()->json($invoices);
    }
    // show clients
    public function clients(){
        $clients = Client::all();
        return response()->json($clients);
    }
    // show invoices
    public function checks(){
        $checks = Check::all();
        return response()->json($checks);
    }

    // add_service
    public function add_service(Request $request){

        $service = new Service;
        $service->name = $request->input('name');
        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('services',$imageName);
            $service->image = $imageName;
        }
        $service->save();

        return response()->json(['message' => 'Service created successfully'], 201);
    }

    // add_invoice
       public function add_invoice(Request $request){
        $invoice = new Invoice();
        // $invoice->invoice_type = $request->invoice_type;
        $invoice->name = $request->name;
        $invoice->phone = $request->phone;
        $invoice->car_no = $request->carno;
        $invoice->car_type = $request->cartype;
        $invoice->service = $request->service;
        $invoice->car_description = $request->description;
        $invoice->price = $request->price;
        $invoice->note = $request->note;
        $invoice->save();   
        return response()->json(['message' => 'Invoice created successfully'], 201);
    }
    // add new worker
    public function add_worker(Request $request,User $user){
        $employer = new Employer();
        $employer->user_id = $request->name;
        $user = User::find($request->name);
        $employer->name = $user->name;
        $employer->service_id = $request->service;
        $employer->save();
        return response()->json(['message' => 'Worker Added successfully'], 201);
    }
  


    // add_check
    public function add_check(Request $request){
        $check = new Check();
        $check->esdar = $request->esdar;
        $check->value = $request->value;
        $check->title = $request->title;
        $check->number = $request->number;
        $check->date = $request->date;
        $check->name = $request->name;
        $check->save();
        return response()->json(['message' => 'Check created successfully'], 201);
    }

    // delete_check
    public function delete_check($id){
        $check = Check::find($id);
        $check->delete();
        return response()->json(['message' => 'Check deleted successfully']);
    }


      // delete_emoloyer
    public function delete_emoloyer($id){
        $employer = Employer::findOrFail($id);
        $employer->delete();
        return response()->json(['message' => 'Employer deleted successfully']);
    }
    
          // delete_emoloyer
    public function delete_task($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Employer deleted successfully']);
    }
    
    // add_task
    public function add_task(Request $request,$id){
        $task = new Task();
        $user = Employer::find($id);
        $task->user_id = $user->user_id;
        $task->employer_id = $id;
        $task->car_no = $request->car_no;
        $task->task = $request->task;
        $userName = $user->name;
        $task->task_time = $request->task_time;
        $task->save();
       
        return response()->json(['message' => 'Task Added successfully']);
    }
    
    
    

}
