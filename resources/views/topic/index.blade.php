@extends('layouts.master')
@section('title', 'Topics')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'GET', 'route' => 'topic.create', 'class' => 'form-horizontal m-2']) !!}
        <div class="btn-group pull-right">
        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}

        @foreach ($topics as $topic)
            <div class="card m-2">
                <div class="card-header">
                {{ $topic->topicName }}
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $topic->topicName }}</h5>
                <p class="card-text">{{ $topic->created_at }}</p>
                <a href="{{ url('/topic', ['id' => $topic->id]) }}" class="btn btn-primary">Go to {{ $topic->id }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
