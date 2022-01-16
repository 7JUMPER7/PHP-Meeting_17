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
            <a class="card m-3 hover" style="max-width: 540px; text-decoration: none;" href="{{ url('/topic/'.$topic->id) }}">
                <div class="row g-0">
                    <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $topic->topicName }}</h5>
                      <p class="card-text"><small class="text-muted">{{ $topic->topicName }}</small></p>
                      <p class="card-text">{{ $topic->created_at }}</p>
                    </div>
                  </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
