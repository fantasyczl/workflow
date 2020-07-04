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
                    <div class="card-header">Tasks</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="task-list">
                            <table>
                                @foreach ($tasks as $i => $task)
                                    <tr>
                                        <td class="task-td">{{ $task->id }}</td>
                                        <td class="task-td">
                                            @if ($task->product_id > 0)
                                                <a href="/products/{{$task->product_id}}">
                                                    {{ $task->product->name }}
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="task-td">{{$task->title}}</td>
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

                        <div style="margin-top: 1.0em;">
                            {!! $tasks->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
