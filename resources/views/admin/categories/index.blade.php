@extends('layouts.app')


@section('content')
<div class="row pl-3">

    <div class="col-sm-6">
        <h1>Create Category</h1>

        {!! Form::open(['method'=>'post' ,'action'=> 'CategoriesController@store','files'=>true]) !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name','Category Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block text-danger ">:message</p>') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    <div class='col-sm-6'>

        @if (Session::has('deleted_category'))
        <p class="alert alert-danger"> {{Session::get('deleted_category')}} </p>
        @endif





        @if(count($categories)>0)
        <h1>All Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name </th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}} </td>
                    <td><a class="text-success" href="{{route('categories.edit',$category->id)}} ">{{$category->name}}
                        </a> </td>
                    <td> {{$category->created_at->diffForHumans()}} </td>
                    <td> {{$category->updated_at->diffForHumans()}} </td>

                </tr>
                @endforeach

                @else
                <div class="text-center">
                    <h3> No categories found</h3>
                </div>

                @endif



            </tbody>
        </table>
    </div>

</div>
@endsection
