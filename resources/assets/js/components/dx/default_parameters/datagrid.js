import { isEmpty, isUndefined } from 'lodash'
import loader from '../loader'

export const grid_default = {
  onRowClick (e) {
    if ( ! isUndefined(e.data.route_edit)) {
      loader.show()
      window.location.href = e.data.route_edit
    }
  },
  grouping: {
    contextMenuEnabled: true,
    autoExpandAll: false
  },
  groupPanel: {
    visible: true
  },
  rowAlternationEnabled: true,
  showBorders: false,
  stateStoring: {
    enabled: true,
    type: "localStorage",
    storageKey: "storage"
  },
  allowColumnResizing: true,
  allowColumnReordering: true,
  columnResizingMode: "nextColumn",
  // columnAutoWidth: true,
  columnChooser: {
    enabled: true,
    mode: "select" // or "dragAndDrop"
  },
  filterRow: {
    visible: true,
    applyFilter: "auto"
  },
  scrolling: {
    mode: "infinite" // or "virtual" | "infinite" | standard
  },
  searchPanel: {
    visible: true,
    // width: 240,
    placeholder: "Busca..."
  },
  headerFilter: {
    visible: true
  },
  selection: {
    mode: "multiple" // or "single" | "none"
  },
  sorting: {
    mode: "multiple" // or "multiple" | "none" | single
  },
  "export": {
    exportFormats: ['PNG', 'JPEG', 'GIF', 'PDF', 'SVG'],
    enabled: true,
    fileName: isEmpty(document.getElementById('resource_title')) ? '' : document.getElementById('resource_title').innerHTML,
    allowExportSelectedData: true
  },
  // remoteOperations: {
  //   sorting: true,
  //   paging: true
  // },
  // paging: {
  //   pageSize: 12
  // },
  // pager: {
  //   showPageSizeSelector: true,
  //   allowedPageSizes: [8, 12, 20]
  // },
  summary: {
    texts: {
      avg: 'Média {0}',
      avgOtherColumn: 'Média de {1} é {0}',
      max: 'Maior {0}',
      maxOtherColumn: 'Maior de {1} é {0}',
      min: 'Menor {0}',
      minOtherColumn: 'Menor de {1} é {0}',
      sum: 'Soma {0}',
      sumOtherColumn: 'Soma de {1} é {0}',
      count: 'Total {0}',
    },
    totalItems: [{
      column: "id",
      summaryType: "count",
      showInColumn: "id",
      alignment: "left"     // or "center" | "right"
    },
      // ...
    ]
  },
}