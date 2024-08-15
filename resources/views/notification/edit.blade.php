@extends('layouts.app')
@section('content')

    <form action="{{route('notification.update', $notification->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="exampleInputEmail1">Message:</label>
        <input type="text" name="message" class="form-control" value="{{$notification->message}}">
        <label for="">Booking_id:</label>
        <select name="booking_id" class="form-control">
            @foreach($bookings as $booking)
                <option value="{{$booking->id}}">{{$booking->booking_time}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
