<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Todo;
use App\Step;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /* MIDDLEWARE APPLICATION METHOD THREE
    public function __construct()
    {
        $this->middleware('auth');

        // restrict access to all pages except one
        $this->middleware('auth')->except('index');

        // restrict access to only one page
        $this->middleware('auth')->only('index');
    }

    */

    public function index(){
        // $todos = Todo::orderBy('completed')->get();
        $todos = auth()->user()->todos()->orderBy('completed')->get();

        // return view('todos.index')->with(['todos' => $todos]);
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo){

        return view('todos.show', compact('todo'));
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(Todo $todo){
        // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request){

        /* VALIDATION METHOD ONE
        $rules = [
            'title' =>'required|max:255'
        ];
        $messages = [
            'title.max' => 'Todo title should not be greater 255 chars.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        */

        /* VALIDATION METHOD TWO
        $request->validate([
            'title' => 'required|max:255' 
        ]);
        */

        // $userId = auth()->id;
        // $request['user_id'] = $userId;

        // Todo::create($request->all());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name' => $step]);
            }
        }
        
        
        return redirect(route('todo.index'))->with('successMessage', 'Todo successfully created!');
    }

    public function update(TodoCreateRequest $request, Todo $todo){

        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($request->stepName){
            foreach($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
                
            }
        }
        return redirect(route('todo.index'))->with('successMessage', 'Todo updated successfully');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('successMessage', 'Todo completed!');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('warningMessage', 'Todo marked incomplete');
    }

    public function destroy(Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('successMessage', 'Todo deleted successfully!');
    }
}
