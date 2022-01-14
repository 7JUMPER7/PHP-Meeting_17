@extends('layouts.master')
@section('title', 'Create Topic')

@section('menu')
    @parent
@endsection

@section('content')
<div class="container">

@if (session('errors') && count(session('errors')) > 0)
    @foreach (session('errors')->all() as $err)
        <div class="alert alert-warning" role="alert">
            {{ $err }}
        </div>
    @endforeach
@endif

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

    <div class="row m-3">
        {!! Form::open(['method' => 'POST', 'route' => 'topic.store', 'class' => 'form-horizontal']) !!}
        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
        {!! Form::label('topicname', 'Введите тему') !!}
        {!! Form::text('topicname', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('inputname') }}</small>
        </div>
        <div class="btn-group pull-right">
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
