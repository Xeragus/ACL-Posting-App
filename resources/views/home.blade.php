@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card my-5">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="py-5">users posts</h1>    
        </div>
    </div>
    <div>
        <form action="{{ route('post.create') }}" method="POST">
                {{ csrf_field() }}
            <div class="form-group w-50">
                <label for="title">Post's title</label>
                <input class="form-control" type="text" id="title" name="title">
            </div>
            <div class="form-group w-50">
                    <label for="title">Post's subtitle</label>
                    <input class="form-control" type="text" id="subtitle" name="subtitle">
                </div>
            <div class="form-group">
                <label for="body">Post's body</label>
                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            {{-- <input type="hidden" name="_token" value="{{ Session::token() }}"> --}}
        </form>
    </div>
</div>
@endsection
