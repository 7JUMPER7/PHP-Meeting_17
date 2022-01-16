@extends('layouts.master')
@section('title', 'Home')

@section('menu')
    @parent
@endsection

@section('content')
<div class="wrapper" style="display: flex; flex-drection: row;">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh; z-index: 10; position: sticky; top: 0;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Topics</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach ($topics as $topic)
                @if ($topic->id == $selectedTopic)
                    <li class="nav-item">
                        <a href="{{ url('/'.$topic->id) }}" class="nav-link active" aria-current="page">{{ $topic->topicName }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/'.$topic->id) }}" class="nav-link text-white" aria-current="page">{{ $topic->topicName }}</a>
                    </li>
                @endif
                @endforeach
        </ul>
    </div>
    <div class="contentWrap" style="width: 100%;">
        @foreach ($blocks as $block)
            <a class="card m-3 hover" style="max-width: 540px; text-decoration: none;" href="{{ url('/block/'.$block->id) }}">
                <div class="row g-0">
                    @if ($block->imagePath)
                        <div class="col-md-4">
                            <img src="{{ asset($block->imagePath) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                    @endif
                    <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $block->title }}</h5>
                      <p class="card-text"><small class="text-muted">{{ $block->topicName }}</small></p>
                      <p class="card-text">{{ $block->content }}</p>
                      <p class="card-text"><small class="text-muted">{{ $block->created_at }}</small></p>
                    </div>
                  </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
