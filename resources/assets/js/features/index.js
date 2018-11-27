import fields from './form-fields'
import loader from '../components/dx/loader'
import toastr from '../components/dx/toast'
import './especie'

$(function() {

  fields.cpf()
  fields.cnpj()
  fields.cep()
  fields.telefone_celular()
  fields.telefone_fixo()
  fields.data_nascimento()



  window.addEventListener('offline', internetOff, false)
  window.addEventListener('online', internetOn, false)

  function internetOn () {
    toastr.success('Conexão com a internet foi estabelecida!')
    $('#connectionStatus').addClass('invisible').fadeOut()
  }
  function internetOff () {
    toastr.warning('Conexão com a internet foi perdida!')
    $('#connectionStatus').removeClass('invisible').fadeIn()
  }


  $(document).on('click', '.show-loader', loader.show)

  $('.autoheight').css('height', (window.innerHeight * 0.75) + 'px')

  $(window).resize(function () {
    $('.autoheight').css('height', (window.innerHeight * 0.75) + 'px')
  })
})