@extends('layouts.app')

@section('content')


            <div class="card">
                <h4 class="card-header">Home</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

@endsection
