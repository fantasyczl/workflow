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
                    Task: {{$task->id}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="add-task">
                        <div class="form">
                            <form action="/tasks/{{$task->id}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">Product</label>
                                    <div class="col-md-6">
                                        <select id="product_id" name="product_id" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}">
                                            <option value="">-</option>
                                            @foreach ($products as $product)
                                                <option value="{{$product->id}}" {{ $task->product_id == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-from-label text-md-right" for="">Content</label>
                                    <textarea id="content" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" style="width: 60%;" cols="20" rows="3">{{$task->content}}</textarea>
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
