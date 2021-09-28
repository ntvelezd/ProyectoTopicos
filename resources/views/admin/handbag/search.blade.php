@extends('admin.layouts.app')
@section('content')
<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required />
    <button type="submit">{{__('admin.search')}}</button>
</form>
@endsection