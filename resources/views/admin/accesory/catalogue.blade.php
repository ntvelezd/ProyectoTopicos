@extends('admin.layouts.app')
@section('content')
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($data["Accesory"] as $accesory)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="img-fluid rounded mb-5" src="{{ asset('/img/portfolio/cake.png') }}" alt="" />
                        <div class="card-body">
                            <p class="card-text">Name: {{ $accesory->getName() }}</p>
                            <p class="card-text">Price: {{ $accesory->getPrice() }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('admin.accesory.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($accesory->getId()) }}">Delete</button>
                                </form>
                                <form method="POST" action="{{ route('admin.accesory.saveEditAccesory') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($accesory->getId()) }}">Edit</button>
                                </form>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
