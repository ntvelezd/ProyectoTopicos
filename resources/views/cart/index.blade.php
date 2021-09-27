@extends('layouts.app')
@section('content')

<link href="{{ asset('/css/cartstyles.css') }}" rel="stylesheet" />}
<div class="card1 mb-4">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title1">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"># items</div>
                </div>
            </div>
            @foreach($data["handbags"] as $key => $handbag)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Handbag</div>
                        <div class="row">{{ $handbag->getName() }}</div>
                    </div>
                    <div class="col">
                        <a href="{{ route('cart.down', ['id'=> $handbag->getId()]) }}">-</a><a href="#"
                            class="border">{{$data['quantifyHandbag'][$handbag->getId()]}}</a><a
                            href="{{ route('cart.up', ['id'=> $handbag->getId()]) }}">+</a>
                    </div>
                    <div class="col">&dollar; {{ $handbag->getPrice() }} <span class="close">&#10005;</span></div>
                </div>
            </div>
            @endforeach
            <div class="back-to-shop"><a href="/">&leftarrow;</a><span class="text-muted">Back to shop</span> <a
                    href="{{ route('cart.removeAll') }}">&#9940;</a><span class="text-muted">Remove all</div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&dollar; {{ $data["total"]}} </div>
            </div>
            <form method="POST" action="{{ route('cart.buy') }}">
                @csrf
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Enter your address" name="address"
                        value="{{ old('address') }}">
                </div>
                <button type="submit" class="btn1">BUY</button>
            </form>
        </div>
    </div>
</div>
@endsection