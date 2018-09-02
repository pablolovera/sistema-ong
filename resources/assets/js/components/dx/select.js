import {forEach, isUndefined} from "lodash";


$(function () {
  forEach($('.selectBox'), elBox => {
    let el = $('#'+elBox.id)
    let name = isUndefined(el.data('name')) ? elBox.id : el.data('name')
    let showClearButton = isUndefined(el.data('selecteds'))

    if ( ! isUndefined(el.data('show_clear_button')) )
      showClearButton = el.data('show_clear_button')

    let options = {
      dropDownButtonTemplate: 'dropDownButton',
      name: name,
      dataSource: el.data('data_source'),
      placeholder: isUndefined(el.data('placeholder')) ? 'Começe a digitar' : el.data('placeholder'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      width: 'auto',
      acceptCustomValue: false,
      showClearButton: showClearButton,
      searchEnabled: true,
      searchTimeout: 300,
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    el.dxSelectBox(options)
  })



  function syncMultiplesSelection (el, value){
    if (!value) {
      el.unselectAll();
      return;
    }

    value.forEach(function(key){
      el.selectItem(key);
    });
  };

  var multiples
  forEach($('.multiSelectBox'), item => {
    let el = $('#'+item.id)

    let options = {
      name: item.id,
      value: isUndefined(el.data('selecteds')) ? null : el.data('selecteds'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      placeholder: el.data('placeholder'),
      showClearButton: isUndefined(el.data('selecteds')),
      dataSource: el.data('data_source'),
      contentTemplate: function(e){
        var value = e.component.option("value"),
          $treeView = $("<div>").dxTreeView({
            dataSource: e.component.option("dataSource"),
            dataStructure: "plain",
            keyExpr: e.component.option('valueExpr'),
            selectionMode: "multiple",
            displayExpr: e.component.option('displayExpr'),
            selectByClick: true,
            onContentReady: function(args){
              syncMultiplesSelection(args.component, value);
            },
            selectNodesRecursive: false,
            showCheckBoxesMode: "normal",
            onItemSelectionChanged: function(args){
              var value = args.component.getSelectedNodesKeys();

              e.component.option("value", value);
            }
          });

        multiples = $treeView.dxTreeView("instance");

        e.component.on("valueChanged", function(args){
          var value = args.value;
          syncMultiplesSelection(multiples, value);
        });

        return $treeView;
      }
    }

    el.dxDropDownBox(options);
  })
})