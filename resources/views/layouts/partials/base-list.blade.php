@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.partials.top-list')

        <div class="card mt-4">
            <div class="card-body">
                <div id="{{ $id_grid }}" class="autoheight" data-route_list="{{ $route_list }}"></div>
            </div>
        </div>
    </div>
@endsection