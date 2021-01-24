@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="product">
                        <div class="form">
                            <form action="/products/{{$product->id}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{$product->name}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">Status</label>
                                    <div class="col-md-2">
                                        <select id="product_status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                            @foreach ($statusMap as $status => $statusName)
                                                @if ($product->status == $status)
                                                    <option value="{{$status}}" selected>{{$statusName}}</option>
                                                @else
                                                    <option value="{{$status}}">{{$statusName}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
