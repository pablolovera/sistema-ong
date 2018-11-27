@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.partials.top-list')

        <div class="panel panel-default">
            <div class="panel-body">
                <div id="{{ $id_grid }}" class="autoheight" data-route_list="{{ $route_list }}"></div>
            </div>
        </div>
    </div>
@endsection