@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{ $bulletin->title }}</h3></div>
                    <div class="panel-body">
                        <p>
                            {{ $bulletin->description }}
                        </p>
                        <div class="row">
                            <div class="col-md-4">Price:  {{ $bulletin->price }}</div>
                            <div class="col-md-4">User: {{ $bulletin->user->name }}</div>
                            <div class="col-md-4">Status: {{ $bulletin->status->title }}</div>
                        </div>
                    </div>
                </div>

                @if ($offer_create)
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Create offer</h3></div>
                        <div class="panel-body">

                            {{ Form::open(['route' => 'offer.store']) }}

                            {{ Form::hidden('bulletin_id', $bulletin->bulletin_id) }}

                            <div class="form-group">
                                {{ Form::label('title') }}
                                {{ Form::text('title', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('description') }}
                                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('price') }}
                                {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::submit('Create',['class' => 'btn btn-primary']) }}
                            </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                @endif

                @if (count($bulletin->offers) > 0)
                    <h3>Offers</h3>
                    @foreach ($bulletin->offers as $offer)
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>{{ $offer->title }}</h3></div>
                        <div class="panel-body">
                            <p>
                                {{ $offer->description }}
                            </p>
                            <div class="row">
                                <div class="col-md-4">Price:  {{ $offer->price }}</div>
                                <div class="col-md-4">User: {{ $offer->user->name }}</div>
                                <div class="col-md-4">
                                    @if ($bulletin->status_id == 2)
                                        Status: {{ $offer->status->title }}
                                    @elseif ($owner)
                                        {{ Form::open(['route' => 'offer.apply']) }}

                                        {{ Form::hidden('offer_id', $offer->offer_id) }}

                                        <div class="form-group">
                                            {{ Form::submit('Apply this offer',['class' => 'btn']) }}
                                        </div>

                                        {{ Form::close() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h3>No offers</h3>
                @endif
            </div>
        </div>
    </div>
@stop