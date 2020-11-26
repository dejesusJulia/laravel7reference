@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/todo" class="btn btn-info">&larr;</a>
    <div class="col-6 offset-3 my-3">
        <div class="card mx-auto my-3">
            <div class="card-header">
                <h4 class="card-title">Update</h4>
            </div>
            <div class="card-body">
                <x-alert/>
                <form action="{{route('todo.update', $todo->id)}}" method="post" class="form">
                        @csrf
                        @method('patch') 

                        <div class="form-group">
                            {{-- <div class="input-group">
                                <input type="text" name="title" id="title" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">&plus;</button>
                                </div>
                            </div> --}}
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$todo->title}}">
                        </div>
    
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$todo->description}}</textarea>
                        </div>
    
                        <button type="submit" class="btn btn-block btn-primary">Update task</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
    
@endsection