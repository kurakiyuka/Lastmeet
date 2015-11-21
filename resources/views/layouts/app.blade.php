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
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
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
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">New</a></li>
                        <li><a href="/events">{{ Auth::user()->name }}</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New Event</h4>
                </div>
                <!-- New Event Form -->
                <form action="event" method="POST" class="form-horizontal" enctype="multipart/form-data"
                      role="form">
                    <div class="modal-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')
                        {{ csrf_field() }}
                                <!-- Event Time -->
                        <div class="form-group">
                            <label for="event-time" class="col-sm-3 control-label">Event Time</label>

                            <div class="col-sm-8">
                                <div class="input-group date form_date" data-date=""
                                     data-date-format="yyyy.mm.dd hh:ii">
                                    <input class="form-control" id="event-time" name="time" type="text" value="">
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Name -->
                        <div class="form-group">
                            <label for="event-name" class="col-sm-3 control-label">Event Name</label>

                            <div class="col-sm-8">
                                <input type="text" name="name" id="event-name" class="form-control"
                                       value="{{ old('event') }}">
                            </div>
                        </div>

                        <!-- Detail -->
                        <div class="form-group">
                            <label for="event-detail" class="col-sm-3 control-label">Detail</label>

                            <div class="col-sm-8">
                                <textarea rows="3" name="detail" id="event-detail" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Friend -->
                        <div class="form-group">
                            <label for="friend" class="col-sm-3 control-label">With Friend</label>

                            <div class="col-sm-8">
                                <input type="text" name="friend" id="friend" class="form-control">
                            </div>
                        </div>

                        <!-- Mood -->
                        <div class="form-group">
                            <label for="mood" class="col-sm-3 control-label">Mood</label>

                            <div class="col-sm-8">
                                <select name="mood" id="mood" class="form-control">
                                    <option>很好</option>
                                    <option>好</option>
                                    <option>一般</option>
                                    <option>不好</option>
                                </select>
                            </div>
                        </div>

                        <!-- Weather -->
                        <div class="form-group">
                            <label for="weather" class="col-sm-3 control-label">Weather</label>

                            <div class="col-sm-8">
                                <select name="weather" id="weather" class="form-control">
                                    <option>晴朗</option>
                                    <option>多云</option>
                                    <option>阴天</option>
                                    <option>小雨</option>
                                    <option>大雨</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location" class="col-sm-3 control-label">Location</label>

                            <div class="col-sm-8">
                                <input type="text" name="location" id="location" class="form-control">
                            </div>
                        </div>

                        <!-- Label -->
                        <div class="form-group">
                            <label for="label" class="col-sm-3 control-label">Label</label>

                            <div class="col-sm-8">
                                <input type="text" name="label" id="label" class="form-control">
                            </div>
                        </div>

                        <!-- Photos -->
                        <div class="form-group">
                            <label for="photo" class="col-sm-3 control-label">Photos</label>

                            <div class="col-sm-8">
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
<script src="/js/bootstrap-datetimepicker.js"></script>
<script src="/js/main.js"></script>
</body>
</html>