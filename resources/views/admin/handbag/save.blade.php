@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                    Handbag save :D
                </div>
            </div>
            <a href="{{ URL::route('admin.home.index') }}">
                <button class="btn btn-primary" type="button">Admin Home</button>
            </a>
            <a href="{{ URL::route('admin.handbag.create') }}">
                <button class="btn btn-primary" type="button">Back to create</button>
            </a>
        </div>
    </div>
</div>
@endsection