@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-column">
            <div class="card mx-auto" style="width:40%;">
                <div class="card-header">My profile</div>
                <div class="card-body">
                    Name: {{Auth::user()->name}} </br>
                    Email: {{Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>
@endsection