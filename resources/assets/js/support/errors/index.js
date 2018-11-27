import toastr from '../../components/dx/toast'
import {isNull, forEach, isUndefined} from 'lodash'

export default {

  handle (error) {
    clearValidationError()

    if ( isUndefined(error.response))
      return

    if ( ! isNull(error.response.status) )
      if (error.response.status == 422)
        showValidation(error.response.data)
      else
        toastr.error('Ops, ocorreu algum problema ao validar os dados')
  },
  clearValidation () {
    clearValidationError()
  },
  onlyMessage (el, message) {
    // el.find('.is-invalid').removeClass('is-invalid')
    // el.find('.invalid-feedback').remove()
    // el.addClass('is-invalid')
    // el.append('<div class="invalid-feedback"><small>' + message + '</small></div>')

    let group = $('form').find('.validate-' + el)
    let input = $('form').find('.' + el)
    input.addClass('has-error')
    group.append('<div class="help-block"><small>' + message + '</small></div>')
  }
}

function clearValidationError() {
  let el_form = $('form')
  el_form.find('.has-error').removeClass('has-error')
  el_form.find('.help-block').remove()
}

function showValidation(error) {
  forEach(error.errors, (value, key) => {
    let group = $('form').find('.validate-' + key)
    let input = $('form').find('.' + key)
    input.addClass('has-error')
    group.append('<div class="help-block"><small>' + value[0] + '</small></div>')
  })
}