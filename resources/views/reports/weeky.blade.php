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
                        <div class="render">
                            <table>
                                <tr>
                                    <th>项目</th>
                                    <th>排期</th>
                                    <th>本周工作</th>
                                    <th>下周工作</th>
                                    <th>问题与风险</th>
                                </tr>
                                @foreach ($result as $line)
                                <tr>
                                    <td>{{$line[0]->product->name}}</td>
                                    <td></td>
                                    <td>
                                        @foreach ($line as $i => $task)
                                            {{ ($i+1) }}. 
                                            {{$task->content}} <br>
                                        @endforeach
                                    </td>
                                    <td></td>
                                    <td></td>
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
