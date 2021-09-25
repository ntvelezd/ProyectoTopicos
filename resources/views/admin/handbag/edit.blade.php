@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.handbag.saveEditHandbag') }}">
                        @csrf
                        <input type="text" name="id" value="{{ $data['handbag']->getId()}}" hidden>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getName() }}"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getPrice() }}"
                                name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label>Style</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getStyle() }}"
                                name="style" value="{{ old('style') }}">
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getColor() }}"
                                name="color" value="{{ old('color') }}">
                        </div>
                        <div class="form-group">
                            <label>Score</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getScore() }}"
                                name="score" value="{{ old('score') }}">
                        </div>
                        <div class="form-group">
                            <label>Texture</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getTexture() }}"
                                name="texture" value="{{ old('texture') }}">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getImage() }}"
                                name="image" value="{{ old('image') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection