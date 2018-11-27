import toast from "../../components/dx/toast";
import errors from '../../support/errors'

export default {
  openModal () {
    $('#modal_cadastro_especie').modal('show')
  },
  clearModal () {
    $('#especie_nome').dxTextBox('instance').option('value', null)
  },
  save () {
    let el_form = $('#modal_form_cadastro_especie')

    axios.post(el_form.attr('action'), el_form.serialize())
      .then(response => {
        let el_especie_id = $('#especie_id').dxSelectBox('instance')
        el_especie_id.getDataSource().reload()

        el_especie_id.option('value', response.data.id)

        toast.success('Espécie gravada com sucesso')

        $('#modal_cadastro_especie').modal('hide')

      }).catch(error => {
        console.log(error)
        errors.handle(error)
        toast.error('Erro ao salvar a espécie')
      })
  }
}