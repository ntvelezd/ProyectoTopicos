@extends('layouts.app')
@section("title", $data["title"])
@section('content')

<link href="{{ asset('/css/cartstyles.css') }}" rel="stylesheet" />}
<div class="card1 mb-4" >
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
            @foreach($data["handbagsInCart"] as $key => $handbag)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Handbag</div>
                        <div class="row">{{ $handbag->getName() }}</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                    <div class="col">&euro; {{ $handbag->getPrice() }} <span class="close">&#10005;</span></div>
                </div>
            </div>
            @endforeach
            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS 3</div>
                <div class="col text-right">&euro; 132.00</div>
            </div>
            <form>
                <p>SHIPPING</p> <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>Address</p> <input id="code" placeholder="Enter your address">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; 137.00</div>
            </div> <button class="btn1">CHECKOUT</button>
        </div>
    </div>
</div>
@endsection