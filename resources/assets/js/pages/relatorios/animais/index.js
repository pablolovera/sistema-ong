import {grid_default} from '../../../components/dx/default_parameters/datagrid'
import {isEmpty} from 'lodash'

$(function(){

  let el_grid = $('#gridRelatorioAnimais')

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
        caption: 'Espécie',
        dataField: 'raca.especie.nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        visible: false
      }, {
        caption: 'Raça',
        dataField: 'raca.nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Proprietário',
        dataField: 'responsavel.nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Lar Temporário',
        dataField: 'lar_temporario.nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2'
      }, {
        caption: 'Nome',
        dataField: 'nome',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-3 col-md-3'
      }, {
        caption: 'Nascimento',
        dataField: 'data_nascimento',
        dataType: 'date',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        visible: false
      }, {
        caption: 'Sexo',
        dataField: 'sexo',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        visible: false
      }, {
        caption: 'Peso',
        dataField: 'peso',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-1 col-md-1',
        visible: false
      }, {
        caption: 'Temperamento',
        dataField: 'temperamento',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-3 col-md-3',
        visible: false
      }, {
        caption: 'Pelagem',
        dataField: 'pelagem',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-2 col-md-2',
        visible: false
      }, {
        caption: 'Observação',
        dataField: 'observacao',
        dataType: 'string',
        cssClass: 'hover-cursor-pointer col-sm-4 col-md-4',
        visible: false
      }, {
        caption: 'Castrado?',
        cellTemplate(container, options) {
          if ( options.data.eh_castrado == 1 )
            container.append('Sim')
          else
            container.append('Não')
        },
        datafield: 'eh_castrado',
        cssClass: 'hover-cursor-pointer col-sm-1 col-md-1',
        dataType: 'string'
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
});