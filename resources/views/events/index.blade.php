@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Events -->
        @if (count($events) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Events
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>Event</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $event->name }}</div>
                                </td>

                                <td>
                                    <form action="/event/{{ $event->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger"><span
                                                    class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                            Event
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                    <form action="event" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                                <!-- Event Time -->
                        <div class="form-group">
                            <label for="event-time" class="col-sm-3 control-label">Event Time</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="event-time" class="form-control">
                            </div>
                        </div>

                        <!-- Event Name -->
                        <div class="form-group">
                            <label for="event-name" class="col-sm-3 control-label">Event Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="event-name" class="form-control"
                                       value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Event Content -->
                        <div class="form-group">
                            <label for="event-content" class="col-sm-3 control-label">Event Content</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="event-content" class="form-control">
                            </div>
                        </div>

                        <!-- Friend -->
                        <div class="form-group">
                            <label for="friend" class="col-sm-3 control-label">With Friend</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="friend" class="form-control">
                            </div>
                        </div>

                        <!-- Mood -->
                        <div class="form-group">
                            <label for="mood" class="col-sm-3 control-label">Mood</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="mood" class="form-control">
                            </div>
                        </div>

                        <!-- Weather -->
                        <div class="form-group">
                            <label for="weather" class="col-sm-3 control-label">Weather</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="weather" class="form-control">
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location" class="col-sm-3 control-label">Location</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="location" class="form-control">
                            </div>
                        </div>

                        <!-- Label -->
                        <div class="form-group">
                            <label for="label" class="col-sm-3 control-label">Label</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="label" class="form-control">
                            </div>
                        </div>

                        <!-- Photos -->
                        <div class="form-group">
                            <label for="photo" class="col-sm-3 control-label">Photos</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="photo" class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Add Event
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </div>

@endsection