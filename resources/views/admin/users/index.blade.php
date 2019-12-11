@extends('layouts.app')

@section('content')

@if (Session::has('deleted_user'))
<p class="alert alert-info"> {{Session::get('deleted_user')}} </p>
@endif


@if (count($users) >0)

<h2>Users List</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>


        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td> <img style="height:50px" src="{{$user->photo ? $user->photo->image :' /images/imgnotfound.png' }}"
                    alt=""> </td>
            <td> <a href=" {{route('users.edit',[$user->id])}} ">{{$user->name}} </a> </td>
            <td> {{$user->email}}</td>
            <td> {{ $user->role? $user->role->name:'user has no role'}} </td>
            <td> {{$user->is_active == 1 ? 'Active': 'Not Active'}} </td>
            <td> {{$user->created_at->diffForHumans()}} </td>
            <td> {{$user->updated_at->diffForHumans()}} </td>
        </tr>
        @endforeach

        @else

        <h1 class="text-center">No Users Available Now</h1>
        @endif



    </tbody>
</table>

@endsection
