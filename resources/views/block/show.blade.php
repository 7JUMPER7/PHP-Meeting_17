@extends('layouts.master')
@section('title', $block->title)

@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="card m-3 hover" style="max-width: 540px; text-decoration: none;">
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
        </div>
        <div class="wrap">
            {!! Form::open(['method' => 'GET', 'route' => ['block.edit', ['block' => $block->id]], 'class' => 'form-horizontal']) !!}
            <div class="btn-group pull-right">
                {!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'route' => ['block.destroy', ['block' => $block->id]], 'class' => 'form-horizontal']) !!}
            <div class="btn-group pull-right">
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
