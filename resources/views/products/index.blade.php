@extends('layouts.app')

@section('css')
    <style>
        .table-td {
            padding: 5px 10px;
            border: 1px solid grey;
        }

        .page-div {
            margin-top: 1.0em;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        @include ("plugins.errors")

                        <div class="products">
                            <table>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="table-td">{{$product->id}}</td>
                                        <td class="table-td">{{$product->name}}</td>
                                        <td class="table-td">{{$product->created_at}}</td>
                                        <td class="table-td">
                                            <a href="/products/{{$product->id}}/edit">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="page-div">
                            {!! $products->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
