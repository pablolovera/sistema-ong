import {forEach, isEmpty, isUndefined } from "lodash";


$(function () {
  forEach($('.dateBox'), dateBox => {
    let el_date = $('#'+dateBox.id)

    let showClearButton = isUndefined(el_date.data('value'))

    if ( ! isUndefined(el_date.data('show_clear_button')) )
      showClearButton = el_date.data('show_clear_button')

    let name              = isUndefined(dateBox.dataset.name) ? dateBox.id : dateBox.dataset.name
    let acceptCustomValue = isUndefined(dateBox.dataset.acceptCustomValue) ? false : dateBox.dataset.acceptCustomValue
    let max               = isUndefined(dateBox.dataset.max) ? undefined : dateBox.dataset.max

    el_date.dxDateBox({
      name: name,
      value: dateBox.dataset.value,
      placeholder: el_date.data('placeholder'),
      displayFormat: 'dd/MM/yyyy',
      max: max,
      type: 'date',
      width: 'auto',
      acceptCustomValue: acceptCustomValue,
      firstDayOfWeek: 1,
      showClearButton: showClearButton,
    })
  })
})