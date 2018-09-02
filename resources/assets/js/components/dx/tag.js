import {difference, forEach, isUndefined, union} from "lodash";


$(function () {
  forEach($('.tagBox'), elBox => {
    let el      = $('#'+elBox.id)
    let name    = isUndefined(el.data('name')) ? elBox.id : el.data('name')
    let options = {
      name: name,
      placeholder: isUndefined(el.data('placeholder')) ? 'Começe a digitar' : el.data('placeholder'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      dataSource: el.data('data_source'),
      showSelectionControls: true,
      applyValueMode: "instantly",
      multiline: true,
      acceptCustomValue: true,
      hideSelectedItems: false,
      showDataBeforeSearch: false,
      showClearButton: isUndefined(el.data('selecteds')),
      searchEnabled: true,
      searchTimeout: 180
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    el.dxTagBox(options)
  })


  forEach($('.tagBox-grupo'), elBox => {
    let el      = $('#'+elBox.id)
    let name    = isUndefined(el.data('name')) ? elBox.id : el.data('name')
    let options = {
      name: name,
      placeholder: isUndefined(el.data('placeholder')) ? 'Começe a digitar' : el.data('placeholder'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      dataSource: new DevExpress.data.DataSource({
        store: el.data('data_source'),
        key: "id",
        group: "grupo"
      }),
      tagTemplate (itemData, tagElement) {
        tagElement.append('<div class="dx-tag "><div class="dx-tag-content"><span>' + itemData.nome + '</span><div class="dx-tag-remove-button"></div></div></div><br>');
      },
      grouped: true,
      groupTemplate (data) {
        let ids = []
        forEach(data.items, item => ids.push(item.id))

        return $('<div style="font-weight: bold;" data-itens="' + JSON.stringify(ids) + '">').dxCheckBox({
          text: data.key,
          onOptionChanged (e) {
            let selectedItems = el.dxTagBox('instance').option('selectedItems')
            let selecteds = []
            forEach(selectedItems, item => selecteds.push(item.id))

            if (e.value) {
              selecteds = union(selecteds, e.element.data('itens'))
              el.dxTagBox('instance').option('value', selecteds)
            } else {
              selecteds = difference(selecteds, e.element.data('itens'))
              el.dxTagBox('instance').option('value', selecteds)
            }
          }
        })
      },
      showSelectionControls: true,
      applyValueMode: "instantly",
      multiline: true,
      acceptCustomValue: true,
      // hideSelectedItems: true,
      showDataBeforeSearch: false,
      showClearButton: isUndefined(el.data('selecteds')),
      searchEnabled: true,
      searchTimeout: 180
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    el.dxTagBox(options)
  })
})