@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/todo" class="btn btn-info">&larr;</a>
    <div class="col-6 offset-3 my-3">
        <div class="card mx-auto my-3">
            <div class="card-header">
                <h4 class="card-title">Create</h4>
            </div>
            <div class="card-body">
                <x-alert/>
            <form action="{{route('todo.store')}}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        {{-- <div class="input-group">
                            <input type="text" name="title" id="title" class="form-control">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">&plus;</button>
                            </div>
                        </div> --}}
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Add task</button>
                
                </form>
            </div>
        </div>
    </div>
    
</div>
    
@endsection