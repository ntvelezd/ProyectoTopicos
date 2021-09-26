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
                        <input type="text" name="name" value="{{ $data['handbag']->getName()}}" hidden>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="{{ $data['handbag']->getName() }}"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection