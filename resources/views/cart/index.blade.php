@extends('layouts.app')
@section('content')
<link href="{{ asset('/css/cartstyles.css') }}" rel="stylesheet" />}
<div class="card1 mb-4">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title1">
                <div class="row">
                    <div class="col">
                        <h4><b>{{__('cart.cart')}}</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">{{__('cart.item')}}</div>
                </div>
            </div>
            @foreach($data["handbags"] as $key => $handbag)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">{{__('cart.bag')}}</div>
                        <div class="row">{{ $handbag->getName() }}</div>
                    </div>
                    <div class="col">
                        <a href="{{ route('cart.down', ['id'=> 'h'.$handbag->getId()]) }}">-</a><a href="#"
                            class="border">{{$data['quantifyHandbag'][$handbag->getId()]}}</a><a
                            href="{{ route('cart.up', ['id'=> 'h'.$handbag->getId()]) }}">+</a>
                    </div>
                    <div class="col">&dollar; {{ $handbag->getPrice() }} <span class="close">&#10005;</span></div>
                </div>
            </div>
            @endforeach
            @foreach($data["accesories"] as $key => $accesory)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">{{__('cart.accesory')}}</div>
                        <div class="row">{{ $accesory->getName() }}</div>
                    </div>
                    <div class="col">
                        <a href="{{ route('cart.down', ['id'=> 'a'.$accesory->getId()]) }}">-</a><a href="#"
                            class="border">{{$data['quantifyAccesory'][$accesory->getId()]}}</a><a
                            href="{{ route('cart.up', ['id'=> 'a'.$accesory->getId()]) }}">+</a>
                    </div>
                    <div class="col">&dollar; {{ $accesory->getPrice() }} <span class="close">&#10005;</span></div>
                </div>
            </div>
            @endforeach
            <div class="back-to-shop"><a href="/">&leftarrow;</a><span class="text-muted">{{__('cart.shop')}}</span> <a
                    href="{{ route('cart.removeAll') }}">&#9940;</a><span class="text-muted">{{__('cart.remove')}}</div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>{{__('cart.summary')}}</b></h5>
            </div>
            <hr>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">{{__('cart.total')}}</div>
                <div class="col text-right">&dollar; {{ $data["total"] }} </div>
            </div>
            <form method="POST" action="{{ route('cart.buy') }}">
                @csrf
                <div class="form-group">
                    <label>{{__('cart.dir')}}</label>
                    <input type="text" class="form-control" placeholder="Enter your address" name="address"
                        value="{{ old('address') }}">
                </div>
                <button type="submit" class="btn1">{{__('cart.buy')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection