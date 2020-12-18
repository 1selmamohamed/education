@extends('layouts.app')

@section('content')



    <div class="card">
        <h4 class="card-header">Create a new post</h4>

        <div class="card-body">

            @include('layouts.errors')

            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label ><h5>Title</h5></label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label ><h5>Featured image</h5></label>
                    <input type="file" class="form-control" name="featured_image">
                </div>
                <div class="form-group">
                    <label ><h5>Select a category</h5></label>
                    <select name="category_id" class="form-control">
                        @foreach( $categories as $category)
                        <option value="{{$category->id}}"> {{$category->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label ><h5>Content</h5></label>
                    <textarea class="form-control" cols="5" rows="5" class="form-control" name="body"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>

@endsection
