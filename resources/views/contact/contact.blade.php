@extends ('layouts.app')
@section ('title')
    Contact
@endsection

@section('css_files')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section ('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'postContact', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
            <br>
            {{Form::email('email', null, array('placeholder' => 'your e-mail','class' => 'form-control', 'required' => '')) }}
            <br>
            {{Form::text('name', null, array('placeholder' => 'your name', 'class' => 'form-control', 'required' => '')) }}
            <br>
            {{Form::text('subject', null, array('placeholder' => 'subject', 'class' => 'form-control', 'required' => '')) }}
            <br>
            {{Form::textarea('text', null, array('class' =>'form-control', 'minlength' => '10'))}}
            <br>
            {{Form::submit('Submit', array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection