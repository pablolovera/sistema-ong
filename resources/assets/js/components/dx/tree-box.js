import {forEach, isUndefined} from "lodash";


$(function () {


  forEach($('.treeBox-multiple'), elBox => {
    let el = $('#'+elBox.id)
    let name = isUndefined(el.data('name')) ? elBox.id : el.data('name')
    let options = {
      // dropDownButtonTemplate: 'dropDownButton',
      name: name,
      dataSource: el.data('data_source'),
      placeholder: isUndefined(el.data('placeholder')) ? 'Começe a digitar' : el.data('placeholder'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      width: 'auto',
      acceptCustomValue: false,
      showClearButton: isUndefined(el.data('selecteds')),
      searchEnabled: true,
      searchTimeout: 300,

      contentTemplate: function(e){
        var value = e.component.option("value"),
          $treeView = $("<div>").dxTreeView({
            dataSource: e.component.option("dataSource"),
            dataStructure: "plain",
            keyExpr: "id",
            parentIdExpr: "grupo",
            selectionMode: "multiple",
            displayExpr: "nome",
            selectByClick: true,
            onContentReady: function(args){
              syncTreeViewSelection(args.component, value);
            },
            selectNodesRecursive: false,
            showCheckBoxesMode: "normal",
            onItemSelectionChanged: function(args){
              var value = args.component.getSelectedNodesKeys();

              e.component.option("value", value);
            }
          });

        treeView = $treeView.dxTreeView("instance");

        e.component.on("valueChanged", function(args){
          var value = args.value;
          syncTreeViewSelection(treeView, value);
        });

        return $treeView;
      }
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    el.dxDropDownBox(options)
  })

  var treeView, dataGrid;

  var syncTreeViewSelection = function(treeView, value){
    if (!value) {
      treeView.unselectAll();
      return;
    }

    value.forEach(function(key){
      treeView.selectItem(key);
    });
  };
})

