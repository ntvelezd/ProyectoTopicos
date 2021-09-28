@extends('layouts.app')
@section('content')
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <img class="img-fluid rounded mb-5"
                src="{{  URL::asset('storage/handbags/'.$data['handbag']->getImage()) }}" alt="" />
            <h1 class="card-text">{{__('review.name')}} {{ $data["handbag"]->getName() }}</h1>
            <div class="row">
                @foreach($data["review"] as $review)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text">{{__('review.score')}}{{ $review->getScore() }}</p>
                            <p class="card-text">{{__('review.commentary')}} {{ $review->getComentary() }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Bootstrap core JavaScript
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