@extends('layouts.app')
@section('content')
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <h5>{{__('admin.most')}}</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    @if(!is_null($data['best']->first()))
                    <img class="img-fluid rounded mb-5" src="{{  URL::asset('storage/handbags/'.$data['best']->first()->getImage()) }}" alt="" />
                            <p class="card-text">{{__('admin.name')}}{{$data["best"]->first()->getName() }}</p>
                            <p class="card-text">{{__('admin.price')}} {{$data['best']->first()->getPrice() }}</p>
                            <p class="card-text">{{__('admin.style')}} {{$data['best']->first()->getStyle() }}</p>
                            <p class="card-text">{{__('admin.color')}} {{$data['best']->first()->getColor() }}</p>
                            <p class="card-text">{{__('admin.score')}} {{$data['best']->first()->getScore() }}</p>
                            <p class="card-text">{{__('admin.texture')}} {{$data['best']->first()->getTexture() }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

    <div class="col-md-4 col-x1-3">
        <div class="sidebar px-4 py-md-0">
            <h6 class="sidebar-title">{{__('admin.search')}}</h6>
            <form class="input-group" action="{{route('handbag.search')}}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search">
            </form>

        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <h5>Catalogue:</h5>
            <div class="row">
                @foreach($data["handbags"] as $key => $handbag)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="img-fluid rounded mb-5"
                            src="{{  URL::asset('storage/handbags/'.$handbag->getImage()) }}" alt="" />
                        <div class="card-body">
                            <p class="card-text">{{__('admin.name')}} {{ $handbag->getName() }}</p>
                            <p class="card-text">{{__('admin.price')}} {{ $handbag->getPrice() }}</p>
                            <p class="card-text">{{__('admin.style')}} {{ $handbag->getStyle() }}</p>
                            <p class="card-text">{{__('admin.color')}}{{ $handbag->getColor() }}</p>
                            <p class="card-text">{{__('admin.score')}} {{ $handbag->getScore() }}</p>
                            <p class="card-text">{{__('admin.texture')}} {{ $handbag->getTexture() }}</p>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('wishlist.add', ['id'=> $handbag->getId()]) }}"
                                class="btn btn-primary m-1" role="button" aria-pressed="true"> Add to Wishlist</a>
                            <a href="{{ route('handbag.add', ['id'=> $handbag->getId()]) }}" class="btn btn-primary m-1"
                                role="button" aria-pressed="true">{{__('admin.add')}}</a>
                            <a href="{{ route('review.index', ['id'=> $handbag->getId()]) }}"
                                class="btn btn-primary m-1" role="button" aria-pressed="true"> {{__('review.rev')}}</a>
                            <a href="{{ route('review.catalogue', ['id'=> $handbag->getId()]) }}"
                                class="btn btn-primary m-1" role="button" aria-pressed="true"> {{__('review.see')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script>
window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
@endsection