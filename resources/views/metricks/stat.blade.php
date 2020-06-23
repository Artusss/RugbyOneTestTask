@extends('layout.main')

@section('content')
    <h2>Metrick Graphs</h2>
    <div>
        {!! $metrickChart->container() !!}
    </div>
    {{-- ChartScript --}}
    @if($metrickChart)
        {!! $metrickChart->script() !!}
    @endif
@endsection