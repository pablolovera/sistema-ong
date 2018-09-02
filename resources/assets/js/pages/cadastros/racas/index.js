import methods from './methods'

$(function(){

  methods.list()

  $('#btn_save_raca').on('click', methods.save)

  $('#raca_modal').on('hide.bs.modal', methods.onCloseModal)

});