import {isUndefined} from 'lodash'

export default {

  init (el, parameters) {
    let treeView;

    let options = {
      valueExpr: isUndefined(parameters.valueExpr) ? 'id' : parameters.valueExpr,
      displayExpr: isUndefined(parameters.displayExpr) ? 'nome' : parameters.displayExpr,
      placeholder: isUndefined(parameters.placeholder) ? 'Sel. Categoria' : parameters.placeholder,
      showClearButton: true,
      name: isUndefined(parameters.name) ? 'categoria_financeira_id' : parameters.name,
      dataSource: isUndefined(parameters.dataSource) ? [] : parameters.dataSource,
      contentTemplate: function(e){

        let value     = e.component.option("value")

        let $treeView = $("<div>").dxTreeView({
            dataSource: e.component.option("dataSource"),
            dataStructure: "plain",
            keyExpr: "id",
            parentIdExpr: "categoria_pai_id",
            selectionMode: "single",
            displayExpr: "nome",
            selectByClick: true,
            height: 300,
            expandedAllEnabled: true,
            onContentReady: function(args){
              if ( ! value) {
                args.component.unselectAll();
              } else {
                args.component.selectItem(value);
              }
            },
            selectNodesRecursive: false,
            onItemSelectionChanged: function(args){
              var value = args.component.getSelectedNodesKeys();

              e.component.option("value", value);
            }
          });

        treeView = $treeView.dxTreeView("instance");

        e.component.on("valueChanged", function(args){
          if ( ! args.value) {
            treeView.unselectAll();
          } else {
            treeView.selectItem(args.value);
          }
        });

        return $treeView
      }
    }

    if ( ! isUndefined(parameters.onValueChanged) )
      options.onValueChanged = parameters.onValueChanged

    el.dxDropDownBox(options);
  }
}