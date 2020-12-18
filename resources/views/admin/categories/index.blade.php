@extends('layouts.app')

@section('content')



    <div class="card">
        <h4 class="card-header">All categories</h4>

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Category name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>

                <tbody>
                @foreach( $categories as $category )
                    <tr>
                        <td >{{ $category->name }}</td>
                        <td><a href="{{ Route('category.edit' , ['id' => $category->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ Route('category.delete' , ['id' => $category->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
