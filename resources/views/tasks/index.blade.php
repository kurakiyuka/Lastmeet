@extends('layouts.app')

@section('content')

    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Tasks -->
        @if (count($tasks) > 0)
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
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <form action="task/{{ $task->id }}" method="POST">
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
                    <form action="task" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

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