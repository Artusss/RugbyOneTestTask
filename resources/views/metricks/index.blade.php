@extends('layout.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Сайт</th>
            <th scope="col">Координата X</th>
            <th scope="col">Координата Y</th>
            <th scope="col">Дата</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metricks as $metrick)
                <tr>
                    <th scope="row">{{ $metrick->id }}</th>
                    <td>{{ $metrick->site }}</td>
                    <td>{{ $metrick->clientX }}</td>
                    <td>{{ $metrick->clientY }}</td>
                    <td>{{ $metrick->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $metricks->links() }}
@endsection