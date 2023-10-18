<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

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
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        //         $obs = new Todo();
        // $obs ->title = $request->title;

        // //dd($request->title);
        // $obs ->description = $request->description;
        // $obs ->save();

        $request->session()->flash('success', 'Todo created successfully');

        return redirect()->route('todos.index');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (! $todo) {
            $request->session()->flash('error', 'Unable to locate the todo');

            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo',
            ]);
        }

        return view('todos.show', ['todo' => $todo]);
    }
}
