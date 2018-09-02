import {grid_default} from '../../../components/dx/default_parameters/datagrid'
import {isEmpty} from 'lodash'

$(function(){

  let el_grid = $('#gridEspecies')

  if ( ! isEmpty(el_grid) ) {

    grid_default.dataSource = el_grid.data('route_list')
    grid_default.stateStoring.storageKey = el_grid.attr('id')
    grid_default.onRowClick = (e) => {
      if ( ! isUndefined(e.data.route_edit)) {
        console.log(e.data.route_edit)
        // $("#loadPanelContainer").dxLoadPanel("visible", true);
        // loader.show()
        window.location.href = e.data.route_edit
      }
    },
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
        cssClass: 'hover-cursor-pointer col-sm-9 col-md-9'
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