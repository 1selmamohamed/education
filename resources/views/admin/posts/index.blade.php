@extends('layouts.app')

@section('content')



    <div class="card">
        <h4 class="card-header">All News</h4>

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>

                <tbody>
                @foreach( $posts as $post )
                    <tr>
                        <td >{{ $post->title }}</td>

                        <td ><img class="" width="45" src="{{asset( $post->featured_image) }}" alt="photo"></td>
                        <td><a href="{{ Route('post.edit' , ['id' => $post->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ Route('post.delete' , ['id' => $post->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
