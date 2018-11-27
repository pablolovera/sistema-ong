
export const form_default = {
  labelLocation: "top",
  minColWidth: 233,
  colCount: "auto",
  hoverStateEnabled: true,
  requiredMessage: '{0} é obrigatório',
  showColonAfterLabel: true,
  showOptionalMark: true,
  colCountByScreen: {
    md: 3,
    sm: 1
  },
  screenByWidth: function(width) {
    return width < 720 ? "sm" : "md";
  },
}