@extends('layouts.app')
@section('content')

    <form action="{{route('booking.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="exampleInputEmail1">Start:</label>
        <input type="datetime-local" name="booking_time" class="form-control" id="exampleInputEmail1">
        <label for="exampleInputEmail1">Status:</label>
        <input type="text" name="status" class="form-control" id="exampleInputEmail1">
        <label for="">User:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <label for="">Service:</label>
        <select name="service_id" class="form-control">
            @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
