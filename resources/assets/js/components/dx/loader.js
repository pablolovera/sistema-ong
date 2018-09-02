export default {
  show() {
    $('#loadPanelContainer').dxLoadPanel({
      closeOnOutsideClick: true,
      visible: true,
      animation: {
        show: { type: 'fade' }
      }
    });
  },
  hide() {
    $('#loadPanelContainer').dxLoadPanel({
      closeOnOutsideClick: true,
      visible: false,
      animation: {
        hide: { type: 'fade' }
      }
    });
  }
}