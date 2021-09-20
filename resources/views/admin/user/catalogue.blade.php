@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin View</div>

                <div class="card-body">
                    <table style="width:100% ; border-spacing: 5px ">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>is_admin</th>
                        </tr>
                        @foreach($data["users"] as $user)
                        <tr>
                            <td>{{ $user->getId() }}</td>
                            <td>{{ $user->getName() }}</td>
                            <td>{{ $user->getEmail() }}</td>
                            <td>{{ $user->getAdmin() }}</td>
                            <td>
                                <a href="edit/{{$user->getId()}}" class="btn btn-primary" role="button"
                                    aria-pressed="true">Edit User</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.user.delete') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="id"
                                        value="{{ ($user->getId()) }}">Delete</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <form method="GET" action="{{ route('admin.user.create') }}">
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection