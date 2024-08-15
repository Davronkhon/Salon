@extends('layouts.app')

@section('title')
    Список Бронирований
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @elseif(session('message2'))
        <div class="alert alert-info">
            {{ session('message2') }}
        </div>
    @endif
    <a href="{{ route('booking.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Начало</th>
            <th>Статус</th>
            <th>User_id</th>
            <th>Service_id</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $booking->booking_time}}</td>
                <td>{{ $booking->status}}</td>
                <td>{{ $booking->user->name}}</td>
                <td>{{ $booking->service->name}}</td>
                <td>
                    <form action="{{ route('booking.destroy', $booking->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('booking.edit', $booking->id)}}" method="get">
                        @csrf
                        @method('get')
                        <input type="submit" value="Updated" class="btn btn-primary">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
@endsection
