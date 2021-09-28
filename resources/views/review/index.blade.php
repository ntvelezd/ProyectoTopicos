@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <div class="card">
                <div class="card-header">{{__('review.view')}} </div>
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="img-fluid rounded mb-5"
                                src="{{  URL::asset('storage/handbags/'.$data['handbag']->getImage()) }}" alt="" />
                            <div class="card-body">
                                <p class="card-text">{{__('review.name')}} {{ $data["handbag"]->getName() }}</p>
                                <p class="card-text">{{__('review.price')}} {{ $data["handbag"]->getPrice() }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('review.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>{{__('review.score')}}</label>
                                <input type="numeric" class="form-control" placeholder="Insert Score" name="score"
                                    value="{{ old('score') }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('review.commentary')}}</label>
                                <input type="text" class="form-control" placeholder="Insert Commentary" name="comentary"
                                    value="{{ old('comentary') }}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="id"
                                value="{{$data['handbag']->getId()}}">{{__('review.create')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection