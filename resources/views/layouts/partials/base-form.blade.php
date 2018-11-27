@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.partials.top-form')

        <div class="panel panel-default">
            <div class="panel-body">

                <form action="{{ $route }}" method="post" id="{{ isset($form_id) ? $form_id : '' }}" enctype="multipart/form-data">
                    @include('layouts.partials.form-fields-safe')

                    @yield('form-fields')

                    @include('layouts.partials.form-actions')
                </form>
            </div>
        </div>
    </div>
@endsection
