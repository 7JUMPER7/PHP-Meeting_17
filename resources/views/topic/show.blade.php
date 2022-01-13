@extends('layouts.master')
@section('title', $topic->topicName)

@section('menu')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
            {{ $topic->topicName }}
            </div>
            <div class="card-body">
            <h5 class="card-title">{{ $topic->topicName }}</h5>
            <p class="card-text">{{ $topic->created_at }}</p>
            <a href="{{ url('/topic', ['id' => $topic->id]) }}" class="btn btn-primary">Go to {{ $topic->id }}</a>
            </div>
        </div>
    </div>
@endsection
