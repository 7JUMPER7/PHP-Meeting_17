@extends('layouts.master')
@section('title', $topic->topicName)

@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="card m-2">
            <div class="card-header">
            {{ $topic->topicName }}
            </div>
            <div class="card-body">
            <h5 class="card-title">{{ $topic->topicName }}</h5>
            <p class="card-text">{{ $topic->created_at }}</p>
            </div>
        </div>
        <div class="wrap">
            {!! Form::open(['method' => 'GET', 'route' => ['topic.edit', ['topic' => $topic->id]], 'class' => 'form-horizontal']) !!}
            <div class="btn-group pull-right">
                {!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'route' => ['topic.destroy', ['topic' => $topic->id]], 'class' => 'form-horizontal']) !!}
            <div class="btn-group pull-right">
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
