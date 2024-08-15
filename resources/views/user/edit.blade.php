@extends('layouts.app')
@section('content')
    <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="exampleInputEmail1">Name:</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
        <label for="exampleInputEmail1">Email:</label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}">
        <label for="">Password:</label>
        <input type="password" name="password" class="form-control" value="{{$user->password}}">
        <label for="">Role:</label>
        <input type="text" name="role" class="form-control" value="{{$user->role}}">
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
