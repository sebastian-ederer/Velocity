@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('css_files')
    {!! Html::style('css/posts.css') !!}
    {!! Html::style('css/preload.css') !!}
@endsection


@section('content')

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <div class="container" >

        <div class="row row-eq-height">


            @foreach($posts as $post)
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-info" onload="MyFunction()">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$post->title}}</h3>
                        </div>
                        <div class="panel-body">

                          <div class="truncate">{!! $post->body !!} </div>

                            @if(strlen($post->body) > 600)
                            <button class="moreless btn btn-primary pull-right more">Read More</button>

                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    @if(Auth::check())

                        {{ HTML::linkRoute('posts.show', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block btn-edit-posts')) }}

                    @endif
                </div>
            @endforeach


        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                {{ $posts->links('vendor.pagination.simple_custom') }}
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/readme.js') !!}
    {!! Html::script('js/preload.js') !!}
@endsection