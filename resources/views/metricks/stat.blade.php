@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h2>Metrick Graphs</h2>
                <div>
                    {!! $metrickChart->container() !!}
                </div>
                {{-- ChartScript --}}
                @if($metrickChart)
                    {!! $metrickChart->script() !!}
                @endif
            </div>
        </div>
    </div>
@endsection