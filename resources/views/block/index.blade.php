@extends('layouts.master')
@section('title', 'Topics')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="row">
        @foreach ($blocks as $block)
            <div class="card">
                <div class="card-header">
                {{ $block->topicName }}
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $block->title }}</h5>
                <p class="card-text">{{ $block->created_at }}</p>
                <a href="{{ url('/topic', ['id' => $block->id]) }}" class="btn btn-primary">Go to {{ $block->id }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
