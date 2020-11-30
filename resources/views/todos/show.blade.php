@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('todo.index')}}" class="btn btn-primary">&leftarrow;</a>
    <div class="col-8 offset-2 my-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$todo->title}}</h3>
            </div>
            <div class="card-body">
                <p>{{$todo->description}}</p>

                <hr class="my-2">

                @if ($todo->steps->count() > 0)
                    <ul>
                        @foreach ($todo->steps as $step)
                            <li>{{$step->name}}</li>
                        @endforeach                       
                    </ul>
                    
                @endif
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @if ($todo->completed)
                        Task completed
                    @else
                        Task not yet completed
                    @endif
                </small>
            </div>
        </div>
    </div>
</div>
    
@endsection