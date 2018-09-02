import Swal from 'sweetalert2'

export default {

  questionDelete(callback) {
    Swal({
      title: "Tem certeza?",
      text: "Estes registros não poderão ser recuperados",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Sim, apagar!",
      allowOutsideClick: false,
      allowEscapeKey: false,
      // showLoaderOnConfirm: true,
    }).then( confirmed => callback(confirmed) )
  }
}
