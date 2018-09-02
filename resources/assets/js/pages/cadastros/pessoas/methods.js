import support from "../../../support";
import toastr from "../../../components/dx/toast";
import {grid_default} from "../../../components/dx/default_parameters/datagrid";
import {isEmpty} from "lodash";

export default {
  list () {
    let el_grid = $('#gridPessoas')

    if ( ! isEmpty(el_grid) ) {

      grid_default.dataSource = el_grid.data('route_list')
      grid_default.stateStoring.storageKey = el_grid.attr('id')
      grid_default.columns = [
        {
          caption: 'Código',
          dataField: 'id',
          dataType: 'number',
          alignment: 'center',
          cssClass: 'hover-cursor-pointer col-sm-1 col-md-1'
        }, {
          caption: 'Razão Social',
          dataField: 'razao_social',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-3 col-md-3'
        }, {
          caption: 'Nome',
          dataField: 'nome',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-3 col-md-3'
        }, {
          caption: 'CPF',
          dataField: 'cpf',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
          visible: false
        }, {
          caption: 'CNPJ',
          dataField: 'cnpj',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
          visible: false
        }, {
          caption: 'Celular',
          dataField: 'telefone_01',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        }, {
          caption: 'Fixo',
          dataField: 'telefone_02',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        }, {
          caption: 'E-mail',
          dataField: 'email',
          dataType: 'string',
          cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        }, {
          caption: 'Status',
          cellTemplate(container, options) {
            if ( options.data.status == 1 )
              container.append('Ativo')
            else
              container.append('Inativo')
          },
          datafield: 'status',
          alignment: 'center',
          cssClass: 'hover-cursor-pointer col-sm-1 col-md-1',
          dataType: 'string'
        }
      ]

      el_grid.dxDataGrid(grid_default).dxDataGrid("instance")
    }
  },
  save () {
    let el_modal = $('#raca_modal')
    let dados = {}

    dados.especie_id  = el_modal.find('#especie_id').dxSelectBox('instance').option('selectedItem').id
    dados.nome        = el_modal.find('#raca_nome').dxTextBox('instance').option('value')
    dados.status      = 1

    axios.post(support.URL_BASE + '/cadastros/racas', dados)
      .then(response => {

        let id = response.data.id

        axios.get($('#raca_id').dxSelectBox('instance').option('dataSource'))
          .then(response => {

            $('#raca_id').dxSelectBox('instance').option('dataSource', response.data)
            $('#raca_id').dxSelectBox('instance').option('value', id)
            toastr.success('Raça gravada com sucesso!')
            el_modal.modal('hide')

          })

      }).catch(error => support.errors.handle(error))
  },

  onCloseModal () {
    $(this).find('#especie_id').dxSelectBox('instance').reset()
    $(this).find('#raca_nome').dxTextBox('instance').reset()
  },

  changeTipo(e) {
    if ( e.selectedItem.id === 'fisica' ) {
      $('#is_juridica').hide()
      $('#is_fisica').show()
    } else {
      $('#is_fisica').hide()
      $('#is_juridica').show()
    }
  }
}