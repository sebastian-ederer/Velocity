@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('css_files')
    {!! Html::style('css/posts.css') !!}
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
                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','data-parsley-validate' => '']) !!}

                {{Form::label('title', 'Title: ')}}
                {{Form::text('title', null, array('class' => 'form-control', 'maxlength' => '255')) }}

                {{Form::label('body', 'Text: ')}}
                {{Form::textarea('body', null, array('class' => 'form-control')) }}
            </div>
        </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        {{Form::submit('Save', array('class' => 'btn btn-lg btn-block btn-success btn-save'))}}
                    </div>
                    <div class="col-md-4">
                        {{ HTML::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-lg btn-danger btn-block btn-save')) }}
                    </div>
                </div>

                {!! Form::close() !!}



    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection