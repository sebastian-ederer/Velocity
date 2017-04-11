@extends('layouts.app')

@section('title')
    About
@endsection

@section('css_files')
    {!! Html::style('css/about.css') !!}
@endsection

@section('content')

    <div class="container">
        <div class="row row-eq-height">

            @foreach($employees as $employee)
                @if($counter % 2 == 0)
                    <div class="row">
                @endif
                <div class="col-md-6 employee two-columns group">
                    <img src="{{asset('img/about/' . $employee->image)}}" alt="Picture not found." class="img-circle img-responsive center-block">

                    <div class="description">
                       <h4><strong>{{$employee->name}}</strong></h4>
                        <p>{!! $employee->job !!}</p>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        @if(Auth::check())
                            {{ HTML::linkRoute('about.edit', 'Edit', array($employee->id), array('class' => 'btn btn-primary btn-block', 'style')) }}
                            {!! Form::open(['route' => ['about.destroy', $employee->id], 'method' => 'DELETE']) !!}

                            {{Form::submit('Delete', array('class' => 'btn btn-danger btn-block btn-delete', 'onclick' => 'return msgBox();')) }}

                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>

                        @if($counter % 2 == 0)
                            </div>
                        @endif
                <?php
                    $counter++;
                    ?>
            @endforeach

        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/submit_confirmation.js') !!}
@endsection