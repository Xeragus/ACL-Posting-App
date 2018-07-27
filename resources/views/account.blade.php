@extends('layouts.app')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <p>Name: {{ Auth::user()->name }}</p>
            <p>E-mail: {{ Auth::user()->email }}</p>
            <p>Company: {{ Auth::user()->company }}</p>
            <hr>
            <form method="POST" action="{{ route('users') }}">
                <label for="company">Enter the name of the company: </label>
                <input id="company" type="text" name="company">
                <button type="submit">Search</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
@endsection