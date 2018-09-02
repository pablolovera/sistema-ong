<div class="row mt-4">
    <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 col-xl-10">
        <legend class="text-uppercase">{{ $title }}</legend>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2">
        @if ( ! empty($route_create) )
            <a href="{{ $route_create }}" class="btn btn-warning btn-block show-loader" title="Inserir novo registro (Ctrl + Insert)"><i class="fa fa-plus"></i> Novo</a>
        @endif
    </div>
</div>
{{--<hr>--}}