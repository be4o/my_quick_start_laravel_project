@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Current Tasks</div>

                <div class="panel-body">
                      @if(count($tasks) > 0)
                        @foreach($tasks as $task)
                        <a href="#" class="list-group-item">{{ ucwords($task->name) }}</a>
                        @endforeach
                      @else
                        <div class="alert alert-danger">No Tasks To show</div>
                      @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
