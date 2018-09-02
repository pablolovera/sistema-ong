import {grid_default} from '../../../components/dx/default_parameters/datagrid'
import {isEmpty} from 'lodash'
import methods from './methods'

$(function(){

  let el_grid = $('#gridLaresTemporarios')

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
        caption: 'Nome',
        dataField: 'nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Responsável',
        dataField: 'pessoa.nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Bairro',
        dataField: 'bairro',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Rua',
        dataField: 'rua',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Cidade',
        dataField: 'cidade',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
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

  $('#add_lar_temporario_capacidade').on('click', methods.addCapacidade)

  $(document).on('click', '.rm_capacidade', methods.rmCapacidade)
});