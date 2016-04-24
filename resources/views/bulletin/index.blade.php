@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach ($bulletins as $bulletin)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{ url('/bulletin', ['id' => $bulletin->bulletin_id]) }}">{{ $bulletin->title }}</a></div>

                        <div class="panel-body">
                            {{ $bulletin->description }}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop