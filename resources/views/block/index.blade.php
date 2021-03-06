@extends('layouts.master')
@section('title', 'Topics')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'GET', 'route' => 'block.create', 'class' => 'form-horizontal m-2']) !!}
        <div class="btn-group pull-right">
        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}

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
@endsection
