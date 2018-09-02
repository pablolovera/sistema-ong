import {forEach, isUndefined} from 'lodash'

$(function () {
  forEach($('.files_upload'), item => {
    let el = $('#' + item.id)
    el.dxFileUploader({
      accept: isUndefined(el.data('accept_types')) ? 'image/png,image/jpg,image/jpeg' : el.data('accept_types'),
      name: isUndefined(el.data('name')) ? 'files_upload' : el.data('name'),
      multiple: isUndefined(el.data('multiple')) ? true : el.data('multiple'),
      labelText: 'ou arraste o arquivo aqui',
      readyToUploadMessage: 'Aguardando envio',
      selectButtonText: 'Selecione arquivos',
      uploadedMessage: 'Enviado',
      uploadButtonText: 'Enviar',
      uploadFailedMessage: 'Erro ao enviar',
      uploadMode: 'userForm',
    })
  })
})
