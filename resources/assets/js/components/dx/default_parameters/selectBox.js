import {isUndefined} from "lodash";

export default {
  options (id, el, value) {

    let options = {
      dropDownButtonTemplate: 'dropDownButton',
      name: id,
      dataSource: el.data('data_source'),
      placeholder: el.data('placeholder'),
      valueExpr: el.data('value_id'),
      displayExpr: el.data('value_desc'),
      width: 'auto',
      acceptCustomValue: false,
      showClearButton: isUndefined(value),
      searchEnabled: true,
      searchTimeout: 300,
    }

    if ( ! isUndefined(el.data('selecteds')) )
      options.value = el.data('selecteds')

    if ( ! isUndefined(value) )
      options.value = value

    return options
  }
}