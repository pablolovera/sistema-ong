import {forEach, isEmpty, isUndefined} from "lodash";


$(function () {
  forEach($('.textBox'), el => {
    let el_text           = $('#'+el.id)
    let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
    let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )

    el_text.dxTextBox({
      name: name,
      value: el.dataset.value,
      placeholder: el.dataset.placeholder,
      mask: el.dataset.mask,
      mode: el.dataset.type,
      acceptCustomValue: false,
      showClearButton: isEmpty(el.dataset.value),
      useMaskedValue: use_masked_value
    })

    let autofocus = isUndefined(el.dataset.autofocus) ? false : ( el.dataset.autofocus == 'true' ? true : false )

    if (autofocus)
      el_text.dxTextBox('instance').focus()
  })
})