@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-1 col-sm-10">
        <!-- Current Events -->
        @if (count($events) > 0)
            @foreach ($events as $event)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-time"
                              aria-hidden="true"></span><span> {{ $event->time }}</span>
                        <span
                                class="glyphicon glyphicon-user"
                                aria-hidden="true"></span><span> 我和<a
                                    href="{{ action('EventController@findKeyWord', array('key' => 'friend', 'value' => $event->friend)) }}">{{ $event->friend }}</a></span>
                        <span
                                class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><span>
                        在{{ $event->location }}</span>
                    </div>

                    <div class="panel-body">
                        <h2>{{ $event->name }}</h2>

                        <div>{{ $event->detail }}</div>
                        @if( $event->photo)
                            <hr class="featurette-divider">
                            <a href="/upload/{{ $event->photo }}" target="_blank"><img class="event-image"
                                                                                       src="/upload/{{ $event->photo }}"></a>
                        @endif
                        <hr class="featurette-divider">
                        <div>
                            <span>心情：{{ $event->mood }}</span><span> 天气：{{ $event->weather }}</span><span> 标签：<a
                                        href="{{ action('EventController@findKeyWord', array('key' => 'label', 'value' => $event->label)) }}">{{ $event->label }}</a></span>
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
    </div>

@endsection