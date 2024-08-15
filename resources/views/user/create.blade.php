@extends('layouts.app')
@section('content')

    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Name:</label>
        <input type="text" name="name" class="form-control">
        <label for="">Email:</label>
        <input type="email" name="email" class="form-control">
        <label for="">Password:</label>
        <input type="password" name="password" class="form-control">
        <label for="">Role:</label>
        <input type="text" name="role" class="form-control">
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
