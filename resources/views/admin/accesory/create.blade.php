@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.accesory.save') }}">
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
                            <label>Items</label>
                            <input type="text" class="form-control" placeholder="Insert Items" name="items" value="{{ old('items') }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Crear Accesory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
