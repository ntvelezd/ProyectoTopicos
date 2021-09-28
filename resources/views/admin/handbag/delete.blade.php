@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('admin.view')}}</div>
                <div class="card-body">
                    {{__('admin.dele')}}
                </div>
            </div>
            <a href="{{ URL::route('admin.home.index') }}">
                <button class="btn btn-primary" type="button">{{__('admin.home')}}</button>
            </a>
            <a href="{{ URL::route('admin.handbag.catalogue') }}">
                <button class="btn btn-primary" type="button">{{__('admin.back')}}</button>
            </a>
        </div>
    </div>
</div>
@endsection