<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>Last Time You Meet</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Last Meet</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="/auth/register">Register</a></li>
                        <li><a href="/auth/login">Login</a></li>
                    @else
                        <li><a href="/events">{{ Auth::user()->name }}</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="clearfix"></div>
    <hr class="featurette-divider">
    <footer>
        <p class="pull-right">© 2015 YUUKI · Powered By <a href="//laravel.com" target="_blank">Laravel</a> · <a
                    href="//bootcss.com" target="_blank">Bootstrap</a></p>
    </footer>
</div>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>