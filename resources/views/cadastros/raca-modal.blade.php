<div class="modal fade" id="raca_modal" tabindex="-1" role="dialog" aria-labelledby="raca_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="raca_modal_title">Cadastro de Raça</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group validate-especie_id">
                        <label for="especie_id" class="obrigatorio"> Espécie</label>
                        <div class="selectBox form-control especie_id" id="especie_id"
                             data-placeholder="Selecione a espécie"
                             data-selecteds="{{ empty($dados) ? null : $dados->especie_id }}"
                             data-value_id="id"
                             data-value_desc="nome"
                             data-data_source="{{ $especies }}"></div>
                    </div>
                    <div class="form-group validate-nome">
                        <label for="raca_nome" class="obrigatorio"> Nome</label>
                        <div class="textBox form-control nome" id="raca_nome" data-name="nome"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" title="Cancelar" data-dismiss="modal"> <i class="fa fa-close"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="btn_save_raca" title="Salvar"> <i class="fa fa-save"></i> Salvar </button>
            </div>
        </div>
    </div>
</div>