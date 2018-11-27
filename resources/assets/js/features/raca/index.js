import methods from './methods'

$(function () {

  $('#add_raca').on('click', methods.openModal)

  $('#modal_cadastro_raca').on('show.bs.modal', methods.clearModal)

  $('#btn_save_raca').on('click', methods.save)
})