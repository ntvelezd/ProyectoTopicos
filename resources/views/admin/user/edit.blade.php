@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.saveEditUser') }}">
                        @csrf
                        <input type="text" name="id" value="{{ $data['user']->getId()}}" hidden>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="{{ $data['user']->getName() }}"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="{{ $data['user']->getEmail() }}"
                                name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Is_admin</label>
                            <input type="text" class="form-control" placeholder="{{ $data['user']->getAdmin() }}"
                                name="is_admin" value="{{ old('is_admin') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection