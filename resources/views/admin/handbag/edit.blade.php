@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('admin.view')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.handbag.saveEditHandbag') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $data['handbag']->getId()}}" hidden>
                        <div class="form-group">
                            <label>{{__('admin.name')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getName() }}"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.price')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getPrice() }}"
                                name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.style')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getStyle() }}"
                                name="style" value="{{ old('style') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.color')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getColor() }}"
                                name="color" value="{{ old('color') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.score')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getScore() }}"
                                name="score" value="{{ old('score') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.texture')}}</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getTexture() }}"
                                name="texture" value="{{ old('texture') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.images')}}</label>
                            <input type="file" name="profile_image" />
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('admin.changes')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection