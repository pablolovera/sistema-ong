<div class="modal fade" tabindex="-1" role="dialog" id="modal_cadastro_especie">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro Espécie</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('cadastros.especie.store') }}" id="modal_form_cadastro_especie">
                    <div class="form-group validate-nome">
                        <label for="nome" class="obrigatorio"> Nome</label>
                        <div class="textBox form-control nome" id="especie_nome" data-name="nome" data-autofocus="true"></div>
                    </div>
                    <input type="hidden" name="status" value="1">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="btn_save_especie"><i class="fa fa-save"></i> Salvar</button>
            </div>
        </div>
    </div>
</div>