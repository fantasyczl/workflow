@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Daily Report
                </div>

                <div class="card-body">
                    @include ('plugins.errors')

                    <div class="report">
                        <div class="form-group row">
                            <textarea id="content" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" cols="20" rows="10">{{$report}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
