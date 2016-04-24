@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Bulletin create</h3></div>
                        <div class="panel-body">

                            {{ Form::open(['route' => 'bulletin.store']) }}

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
            </div>
        </div>
    </div>
@stop