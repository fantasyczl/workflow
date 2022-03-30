@extends('layouts.app')

@section('css')
    <style>
        td, th {
            padding: 5px 10px;
            border: 1px solid black;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Weeky Report
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="report">
                        <div class="row" style="margin-bottom: 2em;">
                            <div class="col-sm-6">
                            From: {{$startDate}}
                            </div>
                            <div class="col-sm-6">
                            To: {{$now}}
                            </div>
                        </div>

                        <div class="render">
                            <table>
                                <tr>
                                    <th>项目</th>
                                    <th>工作</th>
                                </tr>
                                @foreach ($result as $line)
                                <tr>
                                    <td>{{$line[0]->product_id > 0 ? $line[0]->product->name : ''}}</td>
                                    <td>
                                        @foreach ($line as $i => $task)
                                            {{ ($i+1) }}.
                                            {{ $task->title }}
                                            <br>
                                            <div style="margin-left: 2em;">
                                                {!! nl2br($task->content) !!}
                                            </div>
                                        @endforeach
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
</div>
@endsection
