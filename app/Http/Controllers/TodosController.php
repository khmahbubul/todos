<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
    	$todos = Todo::all();

    	return view('todos')->with('todos', $todos);
    }


    public function store(Request $request)
    {
    	$todo = new Todo;

    	$todo->todo = $request->todo;
    	$todo->save();

    	return redirect()->back();
    }


    public function delete($id=null)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->back();
    }


    public function edit($id=null)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }


    public function update(Request $request, $id=null)
    {
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->route('todos');
    }


    public function completed($id=null)
    {
        $todo = Todo::find($id);

        $todo->completed = true;
        $todo->save();

        return redirect()->back();
    }
}
