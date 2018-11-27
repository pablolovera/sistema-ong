import methods from './methods'

$(function () {

  $('#add_especie').on('click', methods.openModal)

  $('#modal_cadastro_especie').on('show.bs.modal', methods.clearModal)

  $('#btn_save_especie').on('click', methods.save)
})