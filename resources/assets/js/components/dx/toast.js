const options = {
  closeOnBackButton: false,
  closeOnClick: true,
  closeOnOutsideClick: true,
  closeOnSwipe: true,
}

export default {
  info(message) {
    options.message = message
    options.type = 'info'
    show(options)
  },
  warning(message) {
    options.message = message
    options.type = 'warning'
    show(options)
  },
  error(message) {
    options.message = message
    options.type = 'info'
    show(options)
  },
  success(message) {
    options.message = message
    options.type = 'success'
    show(options)
  }
}

function show() {
  let el_toast = $("#toast")
  el_toast.dxToast(options);
  el_toast.dxToast('show')
}
