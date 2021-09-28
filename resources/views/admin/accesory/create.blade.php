@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <div class="card">
                <div class="card-header">{{__('admin.view')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.accesory.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{__('admin.name')}}</label>
                            <input type="text" class="form-control" placeholder="Insert Name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.price')}}</label>
                            <input type="text" class="form-control" placeholder="Insert Price" name="price"
                                value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('admin.images')}}</label>
                            <input type="file" name="profile_image" />
                            <label>{{__('admin.image')}}</label>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('admin.accesso')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection