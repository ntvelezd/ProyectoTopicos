@extends('admin.layouts.app')
@section('content')
<<<<<<< Updated upstream
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                  Listas de accesorios
=======
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($data["Accesory"] as $accesory)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img class="img-fluid rounded mb-5" src="{{  URL::asset('storage/accesories/'.$accesory->getImage()) }}" alt="" />
                        <div class="card-body">
                            <p class="card-text">Name: {{ $accesory->getName() }}</p>
                            <p class="card-text">Price: {{ $accesory->getPrice() }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('admin.accesory.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($accesory->getId()) }}">Delete</button>
                                </form>
                                
                                <a href="{{ route('admin.accesory.edit', ['id'=> $accesory->getId()]) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
                            </div>
                        </div>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
