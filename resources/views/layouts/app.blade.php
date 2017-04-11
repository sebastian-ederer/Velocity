<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <link href="{{url('img/fav-icon.ico')}}" rel="shortcut icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--Css Files -->
    {!! Html::style('css/design.css') !!}
    @yield('css_files')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {!! Html::linkRoute('videos.index', 'Velocity', array(),array('class' => ('navbar-brand')))!!}
                </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">

                            <li>{!! Html::linkRoute('videos.index', 'videos', array(),array('class' => Active::isActiveRoute('videos.index')))!!}</li>
                            <li>{!! Html::linkRoute('posts.index', 'news', array(),array('class' => Active::isActiveRoute('posts.index')))!!}</li>
                            <li>{!! Html::linkRoute('about.index', 'about', array(),array('class' => Active::isActiveRoute('about.index')))!!}</li>
                            <li>{!! Html::linkRoute('contact', 'contact', array(),array('class' => Active::isActiveRoute('contact')))!!}</li>

                        </ul>



                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="https://www.instagram.com/thomaswellner/" class="navbar-brand" target="_blank">{{ HTML::image('img/instagram-glyph-icons2-color.png', 'Instagram', array('class' => 'img-responsive')) }}</a></li>
                            <li><a href="https://www.youtube.com/channel/UCzidBg7JPR53EP5B5x65jpA/featured" class="navbar-brand" target="_blank">{{ HTML::image('img/YouTube-icon-full_color.png', 'YouTube', array('class' => 'img-responsive')) }}</a></li>

                            @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li>{!! Html::linkRoute('videos.create', 'Upload Video')!!}</li>
                                    <li>{!! Html::linkRoute('posts.create', 'New Post')!!}</li>
                                    <li>{!! Html::linkRoute('about.create', 'New Employee')!!}</li>
                                    <li>{!! Html::linkRoute('register', 'Register admin')!!}</li>
                                    <li role="separator" class="divider"></li>
                                    <li>{!! Html::linkRoute('logout', 'Logout')!!}</li>
                                </ul>
                            </li>
                        </ul><!-- Dropdown menue for admin ends -->
                        @endif
                    </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>



    <div id="wrapper">
        <hr>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                @include('partials._messages')
            </div>
        </div>
        <div class="content">@yield('content')</div>

    </div>



    <footer class="navbar navbar-default footer">
            <!-- Collect the nav links, forms, and other content for toggling -->

                <ul class="nav navbar-nav navbar-right">
                <li>{!! Html::linkRoute('legal_disclosure', 'legal disclosure')!!}</li>
                <li>{!! Html::linkRoute('legal_terms', 'legal terms')!!}</li>
                </ul>
    </footer>
    @yield('scripts')
</body>
</html>