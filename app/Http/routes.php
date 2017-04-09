<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\task;
use Illuminate\Support\Facades\Mail;

Route::get('/', function (Task $task) {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('welcome',['tasks' => $tasks]);
});

Route::auth();


Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/email',function(){
  // Mail::send('emails.send',['name' => 'Beshoo'],function($message){
  //   $message->to('beshoybosha231@yahoo.com', 'some Guy')->from('beshoybosha321@gmail.com')->subject('Welcome!');
  // } );
  Mail::send(['name'=>'mail'],['name' => 'Beshoo'], function($message){
    $message->to('beshoybosha231@gmail.com','Beshoo')->subject('send email tutorial');
    $message->from('beshoybosha321@gmail.com', 'beshoo');
  });
  echo "YES";
});
