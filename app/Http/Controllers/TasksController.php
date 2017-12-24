<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = [];
        $user = null;
        $tasks = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        }

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];
        
        return view ('tasks.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task= new Task;
        
         if (\Auth::check()) 
        return view ('tasks.create',[
            'task'=>$task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'content' => 'required|max:255',
        'status' => 'required|max:10',
        'user_id' => 'numeric',
        ]);
        
        $user = null;
        if (\Auth::check()) {
            $user = \Auth::user();
        }
        
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->user_id = $user->id;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = null;
        $data = [];
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        }
        
        if(empty($task)){
            return redirect ('/');
        }
        
        $data = [
            'user' => $user,
            'task' => $task,
        ];
        
        return view ('tasks.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = null;
        $data = [];
        $task = [];
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        }
        
        if(empty($task)){
            return redirect ('/');
        }
        
         $data = [
            'user' => $user,
            'task' => $task,
        ];
        
        return view ('tasks.edit',$data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'content' => 'required|max:255',
        'status' => 'required|max:10',
        'user_id' => 'numeric',
        ]);
        
        $user = null;
        if (\Auth::check()) {
            $user = \Auth::user();
        }
        
        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->user_id = $user->id;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = null;
        $data = [];
        $task = [];
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        }
        
        if(empty($task)){
            return redirect ('/');
        }
        
         $data = [
            'user' => $user,
            'task' => $task,
        ];
        
        $task->delete();
        
        return redirect('/');
    }
}
