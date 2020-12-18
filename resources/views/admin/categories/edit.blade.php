@extends('layouts.app')

@section('content')



    <div class="card">
        <h4 class="card-header"><strong>Edit : </strong> {{$category->name}}  category</h4>

        <div class="card-body">

            @include('layouts.errors')

            <form action="{{ route('category.update' ,[$category->id]) }}" method="post">

                {{ csrf_field() }}
                <div class="form-group">
                    <label ><h5>Name</h5></label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>

@endsection
