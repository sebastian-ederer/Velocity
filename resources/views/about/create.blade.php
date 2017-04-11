@extends('layouts.app')

@section('title')
    About
@endsection

@section('css_files')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/forms.css') !!}
    <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=ukicyd2fcwswj75hfd963m4z69mkqqigsypn58lcdfx8ywa9"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins:'link autolink preview lists',
            menubar: false,
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | preview | link'

        });
    </script>

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(['route' => 'about.store', 'data-parsley-validate' => '', 'files' => true]) !!}

                {{Form::label('name', 'Name: ')}}
                {{Form::text('name', null, array('class' => 'form-control', 'maxlength' => '30')) }}

                {{Form::label('job', 'About: ')}}
                {{Form::textarea('job', null, array('class' => 'form-control')) }}

                {{Form::label('employee_image', 'Upload Image: ')}}

                <a href="" style="text-decoration: none; color: lightgray;" data-tooltip title="Picture will be resized to 720 x 720 px - Max-size: 500 kb."><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>

                {{Form::file('employee_image')}}

                {{Form::submit('Save', array('class' => 'btn btn-success btn-block btn-save')) }}

                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function(){
           $('[data-tooltip]').tooltip();
        });

    </script>
    {!! Html::script('js/parsley.min.js') !!}
@endsection

