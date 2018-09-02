
$(function () {


  let el_grafico  = $('#pacientesPorConvenio')
  let dados       = el_grafico.data('dados')

  el_grafico.dxChart({
    legend: {
      visible: false
    },
    dataSource: dados,
    argumentAxis: {
      label: {
        displayMode: 'rotate',
        rotationAngle: -35,
        visible: true
      }
    },
    tooltip: {
      enabled: true
    },
    series: [{
      type: 'bar',
      argumentField: "nome",
      valueField: "agendamentos",
      label: {
        visible: true,
      }
    }]
  });


  let el_grafico_2  = $('#pacientesPorStatus')
  let dados_2       = el_grafico.data('dados')

  el_grafico.dxPieChart({
    type: "doughnut",
    "export": {
      enabled: true
    },
    onPointClick: e => {
      item = e.target

      if(item.isVisible())
        item.hide()
      else
        item.show()
    },
    onLegendClick: e => {
      item = this.getAllSeries()[0].getPointsByArg(e.target)[0]

      if(item.isVisible())
        item.hide()
      else
        item.show()
    },
    palette: "Soft Pastel",
    legend: {
      verticalAlignment: 'bottom',
      horizontalAlignment: 'center',
      itemTextPosition: 'right',
      rowCount: 2
    },
    dataSource: dados,
    customizePoint: point => {
      return {
        color: dados[point.index].color
      }
    },
    series: [{
      argumentField: "descricao",
      valueField: "agendamentos",
      label: {
        visible: true,
        connector: { visible: true }
        // format: "percent"
      }
    }]
  });
})