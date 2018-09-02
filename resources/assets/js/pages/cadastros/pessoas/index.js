import methods from './methods'
import {isEmpty} from 'lodash'

$(function(){

  methods.list()

  $('#btn_save_pessoa').on('click', methods.save)

  $('#pessoa_modal').on('hide.bs.modal', methods.onCloseModal)

  let el_tipo = $('#tipo')

  if ( ! isEmpty(el_tipo))
    el_tipo.dxSelectBox('instance').option('onSelectionChanged', (e) => methods.changeTipo(e))

});