@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('css_files')
    {!! Html::style('css/preload.css') !!}
@endsection
{!! Html::style('css/posts.css') !!}
@section('content')
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <div class="container">
        <div class="row row-eq-height">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $post->title }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="truncate">
                        {!! ($post->body)!!}
                        </div>

                        @if(strlen($post->body) > 600)
                            <button class="moreless btn btn-primary pull-right more">Read More</button>

                        @endif

                    </div>
                </div>
            </div>


            <div class="col-md-2">
                <br>
                {{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-success btn-block')) }}
                <br>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                {{Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/readme.js') !!}
    {!! Html::script('js/preload.js') !!}
@endsection