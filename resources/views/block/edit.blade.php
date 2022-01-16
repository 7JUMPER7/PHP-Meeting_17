@extends('layouts.master')
@section('title', 'Create Block')

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
            {!! Form::open(['method' => 'PUT', 'route' => ['block.update', ['block' => $block->id]], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

            {!! Form::hidden('id', $block->id) !!}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $block->title, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>

            <div class="form-group{{ $errors->has('topicId') ? ' has-error' : '' }}">
            {!! Form::label('topicId', 'Topic') !!}
            {!! Form::select('topicId', $topics, $block->topicId, ['id' => 'topicId', 'class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('topicId') }}</small>
            </div>

            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            {!! Form::label('photo', 'Image') !!}
            {!! Form::file('photo', ['required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('photo') }}</small>
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            {!! Form::label('content', 'Content') !!}
            {!! Form::textarea('content', $block->content, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('content') }}</small>
            </div>

            <div class="btn-group pull-right">
            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
