@extends('layout.main')

@section('content')
    <h1>Metrick Graphs</h1>

    <div style="width: 50%">
        {!! $metrickChart->container() !!}
    </div>
    {{-- ChartScript --}}
    @if($metrickChart)
        {!! $metrickChart->script() !!}
    @endif
@endsection