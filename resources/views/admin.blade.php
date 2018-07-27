@extends('layouts.app')

@section('content')
<div class="container py-5 my-5">
    <h1>Admin Page</h1>
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Company</th>
            <th scope="col">Admin</th>
            <th scope="col">Author</th>
            <th scope="col">Guest</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <form action="{{ route('assignRoles') }}" method="post" class="changeRoles">
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                <td>{{ $user->company }}</td>
                <td><input type="checkbox" name="role_admin" {{ $user->hasRole('admin') ? 'checked' : '' }}></td>
                <td><input type="checkbox" name="role_author" {{ $user->hasRole('author') ? 'checked' : '' }}></td>
                <td><input type="checkbox" name="role_guest" {{ $user->hasRole('guest') ? 'checked' : '' }}></td>
                {{ csrf_field() }}
            </form>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection