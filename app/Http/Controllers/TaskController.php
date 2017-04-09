<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TaskRepository;
use App\Task;
use Auth;
class TaskController extends Controller
{
    //

    public function __construct(){
      $this->middleware('auth');

    }

    public function index(Request $request){
      $tasks = $request->user()->task()->get();
      return view('home', [
          'tasks' => $tasks,
      ]);
    }
    public function store(Request $request){
      $this->validate($request,[
          'name' => 'required|max:255'
        ]);
        $request->user()->task()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
    public function destroy(Request $request, Task $task){
        // var_dump($task->user_id);
        // var_dump(Auth::user()->id);
         if(Auth::user()->id === $task->user_id){  //this prevent others to delete tasks
          $task->delete();
         }
        return redirect('/tasks');
    }
}
