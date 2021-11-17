<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     $todos = Todo::all();
    //     return view('todos.show')->with('todos', $todos);
    // }


    public function create(Request $request)
    {
        $this->validate($request, [

            'todo' => 'min:5|required'
        ]);
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->user_id = Auth::user()->id;
        $todo->is_completed = false;
        $todo->save();
        $request->session()->flash('completed', "Todo Created");
        return redirect()->back();
    }
    public function edit($id)
    {

        $todo = Todo::findorfail($id);
        if ($todo->user_id == Auth::user()->id) {
            return view('todos.edit')->with('todo', $todo);
        } else {
            abort(403);
        }
    }

    public function complete(Request $request, $id)
    {

        $todo = Todo::findorfail($id);
        if ($todo->user_id == Auth::user()->id) {
            $todo->is_completed = true;
            $todo->save();
            $request->session()->flash('completed', "Todo completed");

            return redirect()->back();
        } else {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'todo' => 'min:5|required'
        ]);
        $todo = Todo::findorfail($id);
        if ($todo->user_id == Auth::user()->id) {
            $todo->todo = $request->todo;
            $todo->is_completed = false;
            $todo->save();
            $request->session()->flash('completed', "Todo Updated");

            return redirect('/');
        } else {
            abort(403);
        }
    }

    public function delete(Request $request, $id)
    {
        $todo = Todo::findorfail($id);
        if ($todo->user_id == Auth::user()->id) {
            $todo->delete();
            $request->session()->flash('completed', "Todo deleted");

            return redirect()->back();
        } else {
            abort(403);
        }
    }
}
