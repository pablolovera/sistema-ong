import {forEach, isUndefined, isEmpty} from 'lodash'

$(function () {
  forEach($('.switch'), item => {
    let el = $('#'+item.id)
    let name = isUndefined(item.dataset.name) ? item.id : item.dataset.name

    el.dxSwitch({
      name: name,
      value: item.dataset.value,
      placeholder: el.data('placeholder'),
      width: isEmpty(item.dataset.width) ? 'auto' : item.dataset.width,
      height: 34,
      onText: el.data('on_text'),
      offText: el.data('off_text')
    })
  })
})