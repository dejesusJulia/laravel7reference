@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

            </div>

            <div class="card">
                <div class="card-header">User Avatar</div>
                <div class="card-body">
                    {{-- @include('layouts.flash') --}}
                    <x-alert>
                        <h5>Response:</h5>
                    </x-alert>
                    <form action="/upload" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file" id="file-group">
                                    <input type="file" name="image" id="image" class="custom-file-input">
                                    <label for="image" for="image" class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info" name="submitImg" id="submitBtn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-end my-2">
                <a href="/todo" class="btn btn-primary">Go to todos</a>
            </div>
        </div>
    </div>
</div>
@endsection
