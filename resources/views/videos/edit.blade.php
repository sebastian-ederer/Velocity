@extends('layouts.app')

@section('title')
    Videos
@endsection

@section('css_files')
    {!! Html::style('css/videos.css') !!}
    {!! Html::style('css/forms.css') !!}
    {!! Html::style('css/parsley.css') !!}
    <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=ukicyd2fcwswj75hfd963m4z69mkqqigsypn58lcdfx8ywa9"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins:'link autolink preview lists',
            menubar: false,
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | preview'

        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'PUT','data-parsley-validate' => '']) !!}

                {{Form::label('title', 'Title: ')}}
                {{Form::text('title', null, array('class' => 'form-control', 'maxlength' => '255')) }}

                {{Form::label('text', 'Text: ')}}
                {{Form::textarea('text', null, array('class' => 'form-control')) }}

                {{Form::label('link_to_video', 'Link: ')}}
                {{Form::text('link_to_video', null, array('class' =>'form-control', 'required' => ''))}}


            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                {{Form::submit('Save', array('class' => 'btn btn-lg btn-block btn-success btn-save'))}}
            </div>
            <div class="col-md-4">
                {{ HTML::linkRoute('videos.show', 'Cancel', array($video->id), array('class' => 'btn btn-lg btn-danger btn-block btn-save')) }}
            </div>
        </div>
        {!! Form::close() !!}


    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection