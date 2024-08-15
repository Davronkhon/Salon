@extends('layouts.app')
@section('content')

    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="exampleInputEmail1">Name:</label>
        <input type="text" name="name" class="form-control">
        <label for="exampleInputEmail1">Price:</label>
        <input type="number" name="price" class="form-control">
        <label for="exampleInputEmail1">Duration:</label>
        <input type="number" name="duration" class="form-control">
        <label for="">User:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
