@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Product: {{ $product->id }}

                    <span style="margin-left: 590px; text-align: right;">
                        <a href="/products/{{$product->id}}/edit">Edit</a>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="product">
                        <div class="form-group row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Name :</label>
                            <div class="col-md-6">
                                {{ $product->name }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Status :</label>
                            <div class="col-md-6">
                                {{ $statusMap[$product->status] ?? $product->status }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-from-label text-md-right" for="">Created At :</label>
                            <div class="col-md-6">
                                {{ $product->created_at }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
