@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <div class="card">
                <div class="card-header">Wishlist View</div>

                <div class="card-body">
                    @foreach($data["handbags"] as $handbag)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <p class="card-text">Name: {{ $handbag->getName() }}</p>
                                <p class="card-text">Price: {{ $handbag->getPrice() }}</p>
                                <p class="card-text">Style: {{ $handbag->getStyle() }}</p>
                                <p class="card-text">Color: {{ $handbag->getColor() }}</p>
                                <p class="card-text">Texture: {{ $handbag->getTexture() }}</p>
                            </div>
                            <a href="{{ route('wishlist.addCart') }}" class="btn btn-primary" role="button" aria-pressed="true"> Add to Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection