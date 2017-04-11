@extends('layouts.app')

@section('title')
    About
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
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | preview | link'

        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($employee, ['route' => ['about.update', $employee->id], 'method' => 'PUT','data-parsley-validate' => '', 'files' => true]) !!}

                {{Form::label('name', 'Name: ')}}
                {{Form::text('name', null, array('class' => 'form-control', 'maxlength' => '30')) }}

                {{Form::label('job', 'About: ')}}
                {{Form::textarea('job', null, array('class' => 'form-control')) }}

                {{Form::label('employee_image', 'Upload Image: ')}}

                <a href="" style="text-decoration: none; color: lightgray;" data-tooltip title="Picture will be resized to 720 x 720 px - Max-size: 500 kb."><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>

                {{Form::file('employee_image')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                {{Form::submit('Save', array('class' => 'btn btn-lg btn-block btn-success btn-save'))}}
            </div>
            <div class="col-md-4">
                {{ HTML::linkRoute('about.index', 'Cancel', array($employee->id), array('class' => 'btn btn-lg btn-danger btn-block btn-save')) }}
            </div>
        </div>

        {!! Form::close() !!}



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