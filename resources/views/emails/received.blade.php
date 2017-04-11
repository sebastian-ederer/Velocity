@component('mail::message')
#Thank you, {{$name}}

We've received your request and will answer you as soon as possible!

@component('mail::button', ['url' => 'http://www.velocityvideogroup.com/'])
Back to Velocity

@endcomponent

##Your message: <br><br>
- - -

>{{$text}}

- - -
<br><br>
Thank you,<br>
{{config('app.name')}}

@endcomponent