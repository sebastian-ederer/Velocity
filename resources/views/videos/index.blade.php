@extends('layouts.app')

@section('title')
    Videos
@endsection

@section('css_files')
    {!! Html::style('css/videos.css') !!}
    {!! Html::style('css/custom_simplePagination.css') !!}
@endsection


@section('content')

<div class="container">
    <div class="row row-eq-height">

        <div class="scroll">
            @foreach($videos as $video)
            <div class="col-md-6 col-md-offset-3">
                <div class="embed-responsive embed-responsive-16by9 video">
                    {!!$video->link_to_video!!}
                </div>
                @if(Auth::check())

                    {{ HTML::linkRoute('videos.show', 'Edit', array($video->id), array('class' => 'btn btn-primary btn-block btn-edit-video')) }}

                @endif

            </div>

            <div class="col-md-3 description">
                    <p class="title">{{$video->title}}</p>
                    <p class="text">{!! $video->text !!}</p>

            @if(Auth::check())
                    <br>
                    {{ HTML::linkRoute('videos.show', 'Edit', array($video->id), array('class' => 'btn btn-primary btn-block')) }}
            @endif
            </div>
            @endforeach


            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                            {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    {!! HTML::script('js/jquery.jscroll.min.js')  !!}
    {!! Html::script('js/jquery.jscroll.js') !!}
    {!! Html::script('js/infinite_scrollpagination.js') !!}
@endsection
