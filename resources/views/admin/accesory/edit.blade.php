@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.accesory.saveEditAccesory') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $data['accesory']->getId()}}" hidden>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="{{ $data['accesory']->getName() }}"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="{{ $data['accesory']->getPrice() }}"
                                name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
<<<<<<< Updated upstream
                            <label>Items</label>
                            <input type="text" class="form-control" placeholder="{{ $data['accesory']->getItems() }}"
                                name="items" value="{{ old('items') }}">
=======
                            <label>Image:</label>
                            <input type="file" name="profile_image" />
>>>>>>> Stashed changes
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection