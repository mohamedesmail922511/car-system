<?php

namespace App\Http\Controllers\Emart;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    // worker page tasks
    public function workers_tasks()
    {
        $id = Auth::id();
        $tasks = Task::where('user_id','=',$id)->get();
        // $user = Auth::user();
        // $tasks = $user->tasks;
        return view('Emart.user_tasks', compact('tasks'));  
    }
    // change_task_status
    public function change_task_status($id){
        $task = Task::findOrFail($id);
        $task->status = 'Accepted';
        $task->save();
        return redirect()->back();
    }
}
