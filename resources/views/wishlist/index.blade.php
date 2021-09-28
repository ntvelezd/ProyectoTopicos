@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <div class="card">
                <div class="card-header">{{__('wishlist.view')}}</div>
                <div class="card-body">
                    @foreach($data["handbags"] as $handbag)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <p class="card-text">{{__('wishlist.name')}}{{ $handbag->getName() }}</p>
                                <p class="card-text">{{__('wishlist.price')}} {{ $handbag->getPrice() }}</p>
                                <p class="card-text">{{__('wishlist.style')}} {{ $handbag->getStyle() }}</p>
                                <p class="card-text">{{__('wishlist.color')}} {{ $handbag->getColor() }}</p>
                                <p class="card-text">{{__('wishlist.texture')}} {{ $handbag->getTexture() }}</p>
                            </div>
                            <a href="{{ route('wishlist.addCart') }}" class="btn btn-primary" role="button"
                                aria-pressed="true"> {{__('wishlist.cart')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection