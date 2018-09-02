import {forEach, isUndefined} from "lodash";

export default {
  options (id, el, value) {
    let multiples
    let options = {
      name: id,
      showClearButton: true,
      contentTemplate (e) {
        var value = e.component.option("value"),
        $treeView = $("<div>").dxTreeView({
          dataStructure: "plain",
          dataSource: e.component.option("dataSource"),
          keyExpr: e.component.option('valueExpr'),
          displayExpr: e.component.option('displayExpr'),
          selectionMode: "multiple",
          selectByClick: true,
          onContentReady: function(args){
            syncMultiplesSelection(args.component, value)
          },
          selectNodesRecursive: false,
          showCheckBoxesMode: "normal",
          onItemSelectionChanged: function(args){
            var value = args.component.getSelectedNodesKeys()

            e.component.option("value", value)
          }
        })

        multiples = $treeView.dxTreeView("instance")

        e.component.on("valueChanged", function(args){
          var value = args.value
          syncMultiplesSelection(multiples, value)
        })

        return $treeView
      }
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    if ( ! isUndefined(el.data('value_id')) )
      options.valueExpr = el.data('value_id')

    if ( ! isUndefined(el.data('value_desc')) )
      options.displayExpr = el.data('value_desc')

    if ( ! isUndefined(el.data('placeholder')) )
      options.placeholder = el.data('placeholder')

    if ( ! isUndefined(el.data('data_source')) )
      options.dataSource = el.data('data_source')

    if ( ! isUndefined(value) )
      options.value = value

    return options
  }
}
function syncMultiplesSelection (el, value){
  if ( ! value ) {
    el.unselectAll()
    return
  }

  forEach(value, key => {
    el.selectItem(key)
  })
}