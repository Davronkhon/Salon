@extends('layouts.app')

@section('title')
    Список Услуг
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
    <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>User_id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $service->user->name}}</td>
                <td>{{ $service->name}}</td>
                <td>{{ $service->price}}</td>
                <td>{{ $service->duration}}</td>
                <td>
                    <form action="{{ route('service.destroy', $service->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('service.edit', $service->id)}}" method="get">
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
