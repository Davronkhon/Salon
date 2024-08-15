@extends('layouts.app')

@section('title')
    Список Уведомлений
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
    <a href="{{route('notification.create')}}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Booking_id</th>
            <th>Message</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $notification->booking->booking_time}}</td>
                <td>{{ $notification->message}}</td>
                <td>
                    <form action="{{ route('notification.destroy', $notification->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('notification.edit', $notification->id)}}" method="get">
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
