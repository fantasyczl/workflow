@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="products">
                        <table>
                            @foreach ($products as $product)
                                <tr>
                                    <td style="padding: 5px 10px; border: 1px solid grey;">{{$product->name}}</td>
                                    <td style="padding: 5px 10px; border: 1px solid grey;">{{$product->created_at}}</td>
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
