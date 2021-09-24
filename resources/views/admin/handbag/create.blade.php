@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.user.save') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Insert Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Insert Email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" placeholder="Insert Password" name="password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <label>Is_admin</label>
                            <input type="text" class="form-control" placeholder="Are you admin?" name="is_admin" value="{{ old('is_admin') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
