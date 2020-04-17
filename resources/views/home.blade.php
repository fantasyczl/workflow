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
                    Dashboard

                    <span style="margin-left: 525px; text-align: right;">
                        <a href="/reports/daily">Daily Report</a>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="add-task">
                        <div>Add Task</div>
                        <div class="form">
                            <form action="/tasks" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">项目</label>
                                    <div class="col-md-6">
                                        <input id="product_name" name="product_name" class="form-control{{ $errors->has('product_name')  ? ' is-invalid' : '' }}" style=""/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">工作内容</label>
                                    <textarea id="content" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" style="width: 60%;" cols="20" rows="3"></textarea>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Task List</div>
                <div class="card-body">
                    <div class="task-list">
                        <table>
                            @foreach ($tasks as $i => $task)
                            <tr>
                                <td class="task-td">{{ ($i + 1) }}</td>
                                <td class="task-td">
                                    <a href="/products/{{$task->product_id}}">
                                        {{ $task->product->name }}
                                    </a>
                                </td>
                                <td class="task-td">{{$task->content}}</td>
                                <td class="task-td">{{$task->created_at}}</td>
                                <td class="task-td">
                                    <a href="/tasks/{{$task->id}}/edit">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
