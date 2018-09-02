import {isEmpty, isNull} from "lodash";
import toastr from "../../../components/dx/toast";
import validation from "../../../support/errors";
import dialogs from "../../../components/dialogs";

export default {
  addCapacidade () {

    validation.clearValidation()

    let index                     = Math.floor(Math.random() * 65536)
    let el_especie                = $('#especie_id').dxSelectBox('instance')
    let el_capacidade             = $('#capacidade').dxTextBox('instance')
    let el_form                   = $('#form-lar-temporario')
    let especie                   = el_especie.option('selectedItem')
    let capacidade                = el_capacidade.option('value')
    let stop_validate             = false
    let has_validation_capacidade = false

    if ( isNull(especie) ) {
      validation.onlyMessage('especie_id', 'A espécie é obrigatória')
      stop_validate = true
    }

    if ( capacidade == 0 )
      has_validation_capacidade = true

    if ( isEmpty(capacidade) )
      has_validation_capacidade = true

    if ( ! $.isNumeric(capacidade) )
      has_validation_capacidade = true

    if ( has_validation_capacidade ) {
      validation.onlyMessage('capacidade', 'A capacidade é inválida')
      stop_validate = true
    }

    if (stop_validate)
      return

    $('#mensagem-capacidade').fadeOut()
    $('#table-capacidades').fadeIn()

    let has_especie = false
    $(document).find('.capacidade_especie').each((key, value) => {
      if ( ! has_especie )
        value.value == especie.id ? (has_especie = true) : (has_especie = false)
    })

    if ( has_especie ) {
      toastr.warning('Espécie já adicionada, para adicionar mais quantidades primeiro remova a espécie e adicione novamente.')
      el_especie.reset()
      return
    }

    let html = '<tr id="row-' + index + '">"' +
      '<td>' + especie.nome + '</td>' +
      '<td>' + capacidade + '</td>' +
      '<td><a href="javascript:;" data-index="' + index + '" class="text-danger rm_capacidade pull-right"><i class="fa fa-trash"></i> Remover</a></td>' +
      '</tr>';

    $('#receive_capacidades').append(html)

    el_form.append('<input type="hidden" class="capacidade_especie" id="capacidade-especie-field-' + index + '" name="capacidades[' + index + '][especie_id]" value="' + especie.id + '"/>')
    el_form.append('<input type="hidden" id="capacidade-quantidade-field-' + index + '" name="capacidades[' + index + '][capacidade]" value="' + capacidade + '"/>')

    el_especie.reset()
    el_capacidade.option('value', null)
    el_capacidade.reset()
  },

  rmCapacidade () {
    console.log('asd')
    dialogs.questionDelete(response => {
      if ( response.value ) {
        let index   = $(this).data('index')
        let el_form = $('#form-lar-temporario')

        el_form.find('#capacidade-especie-field-' + index).remove()
        el_form.find('#capacidade-quantidade-field-' + index).remove()
        el_form.find('#row-' + index).remove().fadeOut()

        if ( $('#receive_capacidades').children('tr').length <= 0 ) {
          $('#mensagem-capacidade').fadeIn()
          $('#table-capacidades').fadeOut()
        }
        toastr.success('Capacidade removida com sucesso!')
      }
    })
  }
}