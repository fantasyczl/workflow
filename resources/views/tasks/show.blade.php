@extends('layouts.app')

@section('css')
<style>
.task-row {
}
.task-td {
    padding: 5px 10px;
    border: 1px solid #ccc;
}
</style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Task: {{ $task->id }}

                    <span style="margin-left: 525px; text-align: right;">
                        <a href="/tasks/{{$task->id}}/edit">Edit</a>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="add-task">
                        <div class="row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Product: </label>
                            <div class="col-md-6">
                                {{ $task->product->name }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Content: </label>
                            <div class="col-md-6">
                                {{ $task->content }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Created At: </label>
                            <div class="col-md-6">
                                {{ $task->created_at }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Updated At: </label>
                            <div class="col-md-6">
                                {{ $task->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
