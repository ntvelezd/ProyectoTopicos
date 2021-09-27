@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.accesory.save') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Insert Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Insert Price" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
<<<<<<< Updated upstream
                            <label>Items</label>
                            <input type="text" class="form-control" placeholder="Insert Items" name="items" value="{{ old('items') }}">
=======
                            <label>Image:</label>
                            <input type="file" name="profile_image" />
>>>>>>> Stashed changes
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Crear Accesory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
