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
    </div>
@endsection
