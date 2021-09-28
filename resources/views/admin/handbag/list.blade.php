@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-x1-3">
            <div class="sidebar px-4 py-md-0">
                <h6 class="sidebar-title">{{__('admin.search')}}</h6>
                <form class="input-group" action="{{route('admin.handbag.search')}}" method="GET">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('admin.lis')}}</div>
                <div class="card-body">
                    <table style="width:100% ; border-spacing: 5px ">
                        <tr>
                            <th>{{__('admin.name')}}</th>
                            <th>{{__('admin.price')}}</th>
                            <th>{{__('admin.style')}}</th>
                            <th>{{__('admin.color')}}</th>
                            <th>{{__('admin.score')}}</th>
                            <th>{{__('admin.texture')}}</th>
                            <th>{{__('admin.image')}}</th>
                        </tr>
                        @foreach($data["handbags"] as $handbag)
                        <tr>
                            <td>{{ $handbag->getName() }}</td>
                            <td>{{ $handbag->getPrice() }}</td>
                            <td>{{ $handbag->getStyle() }}</td>
                            <td>{{ $handbag->getColor() }}</td>
                            <td>{{ $handbag->getScore() }}</td>
                            <td>{{ $handbag->getTexture() }}</td>
                            <td>{{ $handbag->getImage() }}</td>
                            <td>
                                <a href="edit/{{$handbag->getId()}}" class="btn btn-primary" role="button"
                                    aria-pressed="true">{{__('admin.ed')}}</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.handbag.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($handbag->getId()) }}">{{__('admin.del')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <a href="{{ URL::route('admin.home.index') }}">
                <button class="btn btn-primary" type="button">{{__('admin.home')}}</button>
            </a>
        </div>
    </div>
</div>
@endsection