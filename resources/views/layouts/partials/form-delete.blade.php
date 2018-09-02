@if( Route::is('*.show') || Route::is('*.edit') )
    @if( isset($is_dependency) )
        @if ( ! $is_dependency )
            <form action="{{ route($route, $params) }}" method="post" class="pull-right" id="delete-form">
                {!! method_field('delete') !!} {!! csrf_field() !!}
                <a href="javascript:;" class="btn btn-outline-danger btn-circle" id="btn-form-delete" title="Excluir"><i class="icomoon icon-trash"></i></a>
            </form>
        @endif
    @endif
@endif