@extends('admin.layouts.app')
@section('content')

<main role="main">
    <div class="col-md-4 col-x1-3">
        <div class="sidebar px-4 py-md-0">
            <h6 class="sidebar-title">Search</h6>
            <form class="input-group" action="{{route('admin.handbag.search')}}" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search">

            </form>
        </div>
    </div>
    <div class="album py-5 bg-light">

        <div class="container">
            <div class="row">
                @foreach($data["handbags"] as $handbag)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="img-fluid rounded mb-5"
                            src="{{  URL::asset('storage/handbags/'.$handbag->getImage()) }}" alt="" />
                        <div class="card-body">
                            <p class="card-text">Name: {{ $handbag->getName() }}</p>
                            <p class="card-text">Price: {{ $handbag->getPrice() }}</p>
                            <p class="card-text">Style: {{ $handbag->getStyle() }}</p>
                            <p class="card-text">Color: {{ $handbag->getColor() }}</p>
                            <p class="card-text">Score: {{ $handbag->getScore() }}</p>
                            <p class="card-text">Texture: {{ $handbag->getTexture() }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="edit/{{$handbag->getId()}}" class="btn btn-primary m-1" role="button"
                                    aria-pressed="true">Edit</a>
                                <form method="POST" action="{{ route('admin.handbag.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($handbag->getId()) }}">Delete</button>
                                </form>
                            </div>
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
</body>

</html>

@endsection