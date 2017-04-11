@extends('layouts.app')

@section('title')
    Videos
@endsection

@section('css_files')
    {!! Html::style('css/videos.css') !!}
@endsection


@section('content')
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-6 col-md-offset-3">

                    <div class="embed-responsive embed-responsive-16by9 video">
                        {!!$video->link_to_video!!}
                    </div>

            </div>

            <div class="col-md-3 description">
                    <p class="title">{{$video->title}}</p>
                    <p class="text">{!! $video->text !!}</p>

                <br>
                {{ HTML::linkRoute('videos.edit', 'Edit', array($video->id), array('class' => 'btn btn-success btn-block')) }}
                <br>
                {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'DELETE']) !!}

                    {{Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection