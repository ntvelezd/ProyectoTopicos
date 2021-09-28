@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{__('admin.creat')}}</h5>
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.handbag.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="Name" name="name" />
                        <input type="number" placeholder="Price" name="price" />
                        <input type="text" placeholder="Style" name="style" />
                        <input type="text" placeholder="Color" name="color" />
                        <input type="number" placeholder="Score" name="score" />
                        <input type="text" placeholder="Texture" name="texture" />
                        <div class="form-group">
                            <label>{{__('admin.images')}}</label>
                            <input type="file" name="profile_image" />
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('admin.sub')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection