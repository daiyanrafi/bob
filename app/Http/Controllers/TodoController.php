<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', [
            'todos' => $todos,
        ]);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoRequest $request)
    {
        // $request->validated();
        Todo::create([
            'tittle' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        $request->session()->flash('success', 'Todo created successfully');

        return redirect()->route('todos.index');
    }
}
