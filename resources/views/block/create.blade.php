@extends('layouts.master')
@section('title', 'Create Block')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['method' => 'POST', 'route' => 'block.store', 'class' => 'form-horizontal']) !!}

        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('inputname') }}</small>
        </div>

        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
        {!! Form::label('topicId', 'Topic') !!}
        {!! Form::select('topicId', $topics, null, ['id' => 'topicId', 'class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('inputname') }}</small>
        </div>

        <div class="btn-group pull-right">
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
