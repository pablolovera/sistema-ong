import {forEach, isEmpty, isUndefined} from "lodash";
import axios from "axios/index";
import loader from "../components/dx/loader";

export default {

  data_nascimento () {
    forEach($('.field_data_nascimento'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'Nascimento',
        mask: '99/99/9999',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
      })
    })
  },

  telefone_celular () {
    forEach($('.field_celular'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'Celular',
        mask: '(99) 9 9999 9999',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
      })
    })
  },

  telefone_fixo () {
    forEach($('.field_fixo'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'Fixo',
        mask: '(99) 9999 9999',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
      })
    })
  },

  cpf () {
    forEach($('.field_cpf'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'CPF',
        mask: '999.999.999-99',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
      })
    })
  },

  cnpj () {
    forEach($('.field_cnpj'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'CNPJ',
        mask: '99.999.999/9999-99',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
      })
    })
  },

  cep () {
    forEach($('.field_cep'), el => {
      let el_text           = $('#'+el.id)
      let name              = isUndefined(el.dataset.name) ? el.id : el.dataset.name
      let use_masked_value  = isUndefined(el.dataset.use_masked_value) ? false : ( el.dataset.use_masked_value == 'true' ? true : false )
      let showClearButton   = isUndefined(el.dataset.value)

      if ( ! isUndefined(el.dataset.show_clear_button) )
        showClearButton = el.dataset.show_clear_button

      el_text.dxTextBox({
        name: name,
        value: el.dataset.value,
        placeholder: 'CEP',
        mask: '99999-999',
        mode: el.dataset.type,
        acceptCustomValue: false,
        showClearButton: showClearButton,
        useMaskedValue: use_masked_value,
        onFocusOut (e) {
          let cep = e.component.option('text');

          if ( isEmpty(cep) )
            return

          let url = 'https://viacep.com.br/ws/' + cep.replace('-', '') + '/json/'

          let instance = axios.create();

          delete instance.defaults.headers.common['X-CSRF-TOKEN']
          delete instance.defaults.headers.common['X-Socket-Id']

          loader.show()

          instance.get(url)
            .then( response => {
              response = response.data
              $('input[name="uf"]').val(response.uf);
              $('input[name="cidade"]').val(response.localidade);
              $('input[name="bairro"]').val(response.bairro);
              $('input[name="rua"]').val(response.logradouro);
              $('input[name="numero"]').focus();
              loader.hide()
            })
            .catch(error => {
              loader.hide()
              console.log('erro ao buscar cep', error)
            })
        }
      })
    })
  }
}