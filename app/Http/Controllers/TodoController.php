<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todos = Todo::latest()->get();
        return view('create',compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'todo'=>'required'
        ]);
        Todo::create([
            'todo'=> $request->todo
        ]);
        return redirect()->route('todo.create')->with('message','Todo successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $todo = Todo::find($id);
        return view('edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $this->validate($request,[
            'todo'=>'required'
        ]);
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        return redirect()->route('todo.create')->with('message','todo edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.create')->with('message','Todo deleted!!!');
    }
}
