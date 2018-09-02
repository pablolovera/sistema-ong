<hr>
<div class="form-actions">
    <button type="submit"
            class="btn btn-success pull-right show-loader"
            id="btn_save_form"
            title="Salvar">
        <i class="fa fa-save"></i>
        Salvar
    </button>

    @if ( ! empty($route_cancel))
        <a href="{{ $route_cancel }}" type="button" class="btn btn-secondary show-loader" title="Voltar"> <i class="fa fa-close"></i> <span class="hidden-xs">Cancelar</span> </a>
    @endif

    @if ( ! empty($route_delete))
        <a href="javascript:;" data-route="{{ $route_delete }}" type="button" id="btn_delete" class="btn btn-danger margin-left-15" title="Apagar"> <i class="fa fa-trash"></i> <span class="hidden-xs">Apagar</span> </a>
    @endif
</div>
