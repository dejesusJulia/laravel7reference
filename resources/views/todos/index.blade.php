@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <a href="/home" class="btn btn-primary">&leftarrow;</a>
        <h1 class="text-center">All todos</h1>    
        <div class="col-8 offset-2">
            <x-alert/>
            <ul class="list-group">
                {{-- if there is a task --}}
                @forelse ($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @if ($todo->completed)
                        <a href="{{route('todo.show', $todo->id)}}">
                            <s class="text-muted">{{$todo->title}}</s>
                        </a>
                        
                    @else 
                        <a href="{{route('todo.show', $todo->id)}}">{{$todo->title}}</a>
                        
                    @endif
                        
                    <span class="d-flex justify-content-space-around align-items-center">
                            
                        @include('todos.completeButton')

                        <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-info btn-sm">
                            <i class="fas fa-cog"></i>
                        </a>

                        <button class="btn btn-sm btn-danger m-1" onclick="event.preventDefault();
                        if(confirm('Do you want to delete {{$todo->title}}?')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                        }
                        ">
                            <i class="fas fa-times"></i>
                        </button>

                        <form id="{{'form-delete-' . $todo->id}}" action="{{route('todo.destroy', $todo->id)}}" method="post" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                    </span>
                </li>

                @empty
                    {{-- if there is no task --}}
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">No task available.</h3>
                        </div>
                    </div>
                @endforelse                
            </ul>

            <div class="d-flex justify-content-end">
                <a href="/todo/create" class="btn btn-primary my-2 ">&plus;</a>
            </div>

            
        </div>
    </div>
@endsection