@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>List User Buyer</h1>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if ($user->role_id == 2)
                    <tr>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}} </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <h2>List User Seller</h2>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if ($user->role_id == 3)
                    <tr>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}} </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection