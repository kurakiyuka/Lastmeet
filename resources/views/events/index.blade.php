@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-1 col-sm-10">
        <!-- Current Events -->
        @if (count($events) > 0)
            @foreach ($events as $event)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>{{ $event->time }}</span> <span>我和{{ $event->friend }} 在{{ $event->location }}</span>
                    </div>

                    <div class="panel-body">
                        <h2>{{ $event->name }}</h2>

                        <div>{{ $event->detail }}</div>
                        @if( $event->photo)
                            <a href="upload/{{ $event->photo }}" target="_blank"><img class="event-image" src="upload/{{ $event->photo }}"></a>
                        @endif
                        <hr class="featurette-divider">
                        <div>
                            <span>心情：{{ $event->mood }}</span><span> 天气：{{ $event->weather }}</span><span> 标签：{{ $event->label }}</span>
                        </div>
                        <form action="/event/{{ $event->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger pull-right"><span
                                        class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif

                        <!-- Create Event Form... -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Event
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                                <!-- New Event Form -->
                        <form action="event" method="POST" class="form-horizontal" enctype="multipart/form-data"
                              role="form">
                            {{ csrf_field() }}

                                    <!-- Event Time -->
                            <div class="form-group">
                                <label for="event-time" class="col-sm-3 control-label">Event Time</label>

                                <div class="col-sm-6">
                                    <input type="text" name="time" id="event-time" class="form-control">
                                </div>
                            </div>

                            <!-- Event Name -->
                            <div class="form-group">
                                <label for="event-name" class="col-sm-3 control-label">Event Name</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="event-name" class="form-control"
                                           value="{{ old('event') }}">
                                </div>
                            </div>

                            <!-- Detail -->
                            <div class="form-group">
                                <label for="event-detail" class="col-sm-3 control-label">Detail</label>

                                <div class="col-sm-6">
                                    <textarea rows="3" name="detail" id="event-detail" class="form-control"></textarea>
                                </div>
                            </div>

                            <!-- Friend -->
                            <div class="form-group">
                                <label for="friend" class="col-sm-3 control-label">With Friend</label>

                                <div class="col-sm-6">
                                    <input type="text" name="friend" id="friend" class="form-control">
                                </div>
                            </div>

                            <!-- Mood -->
                            <div class="form-group">
                                <label for="mood" class="col-sm-3 control-label">Mood</label>

                                <div class="col-sm-6">
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

                                <div class="col-sm-6">
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

                                <div class="col-sm-6">
                                    <input type="text" name="location" id="location" class="form-control">
                                </div>
                            </div>

                            <!-- Label -->
                            <div class="form-group">
                                <label for="label" class="col-sm-3 control-label">Label</label>

                                <div class="col-sm-6">
                                    <input type="text" name="label" id="label" class="form-control">
                                </div>
                            </div>

                            <!-- Photos -->
                            <div class="form-group">
                                <label for="photo" class="col-sm-3 control-label">Photos</label>

                                <div class="col-sm-6">
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-primary">
                                        Add Event
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>

@endsection