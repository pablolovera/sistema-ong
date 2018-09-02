/*!
* DevExtreme (dx.messages.en.js)
* Version: 17.1.6
* Build date: Tue Sep 05 2017
*
* Copyright (c) 2012 - 2017 Developer Express Inc. ALL RIGHTS RESERVED
* Read about DevExtreme licensing here: https://js.devexpress.com/Licensing/
*/
"use strict";

! function(root, factory) {
    if ("function" === typeof define && define.amd) {
        define(function(require) {
            factory(require("devextreme/localization"))
        })
    } else {
        factory(DevExpress.localization)
    }
}(this, function(localization) {
    localization.loadMessages({
      "en":{
        "Yes": "Sim",
        "No": "Não",
        "Cancel": "Cancelar",
        "Clear": "Limpar",
        "Done": "Terminar",
        "Loading": "Carregando...",
        "Select": "Selecione...",
        "Search": "Buscar",
        "Back": "Voltar",
        "OK": "OK",

        "dxCollectionWidget-noDataText": "Nenhum registro carregado",

        "validation-required": "Obrigatório",
        "validation-required-formatted": "{0} é obrigatório",
        "validation-numeric": "Value must be a number",
        "validation-numeric-formatted": "{0} must be a number",
        "validation-range": "Value is out of range",
        "validation-range-formatted": "{0} is out of range",
        "validation-stringLength": "The length of the value is not correct",
        "validation-stringLength-formatted": "The length of {0} is not correct",
        "validation-custom": "Value is invalid",
        "validation-custom-formatted": "{0} is invalid",
        "validation-compare": "Values do not match",
        "validation-compare-formatted": "{0} does not match",
        "validation-pattern": "Value does not match pattern",
        "validation-pattern-formatted": "{0} does not match pattern",
        "validation-email": "Email is invalid",
        "validation-email-formatted": "{0} is invalid",
        "validation-mask": "Value is invalid",

        "dxLookup-searchPlaceholder": "Minimum character number: {0}",

        "dxList-pullingDownText": "Pull down to refresh...",
        "dxList-pulledDownText": "Release to refresh...",
        "dxList-refreshingText": "Refreshing...",
        "dxList-pageLoadingText": "Loading...",
        "dxList-nextButtonText": "More",
        "dxList-selectAll": "Select All",
        "dxListEditDecorator-delete": "Delete",
        "dxListEditDecorator-more": "More",

        "dxScrollView-pullingDownText": "Pull down to refresh...",
        "dxScrollView-pulledDownText": "Release to refresh...",
        "dxScrollView-refreshingText": "Refreshing...",
        "dxScrollView-reachBottomText": "Loading...",

        "dxDateBox-simulatedDataPickerTitleTime": "Select time",
        "dxDateBox-simulatedDataPickerTitleDate": "Select date",
        "dxDateBox-simulatedDataPickerTitleDateTime": "Select date and time",
        "dxDateBox-validation-datetime": "Value must be a date or time",

        "dxFileUploader-selectFile": "Select file",
        "dxFileUploader-dropFile": "or Drop file here",
        "dxFileUploader-bytes": "bytes",
        "dxFileUploader-kb": "kb",
        "dxFileUploader-Mb": "Mb",
        "dxFileUploader-Gb": "Gb",
        "dxFileUploader-upload": "Upload",
        "dxFileUploader-uploaded": "Uploaded",
        "dxFileUploader-readyToUpload": "Ready to upload",
        "dxFileUploader-uploadFailedMessage": "Upload failed",

        "dxRangeSlider-ariaFrom": "From",
        "dxRangeSlider-ariaTill": "Till",

        "dxSwitch-onText": "ON",
        "dxSwitch-offText": "OFF",

        "dxForm-optionalMark": "optional",
        "dxForm-requiredMessage": "{0} is required",

        "dxNumberBox-invalidValueMessage": "Value must be a number",

        "dxDataGrid-columnChooserTitle": "Escolher colunas",
        "dxDataGrid-columnChooserEmptyText": "Drag a column here to hide it",
        "dxDataGrid-groupContinuesMessage": "Continuar na próxima página",
        "dxDataGrid-groupContinuedMessage": "Continuidade da página anterior",
        "dxDataGrid-groupHeaderText": "Agrupar por essa coluna",
        "dxDataGrid-ungroupHeaderText": "Desagrupar",
        "dxDataGrid-ungroupAllText": "Desagrupar tudo",
        "dxDataGrid-editingEditRow": "Editar",
        "dxDataGrid-editingSaveRowChanges": "Salvar",
        "dxDataGrid-editingCancelRowChanges": "Cancelar",
        "dxDataGrid-editingDeleteRow": "Apagar",
        "dxDataGrid-editingUndeleteRow": "Recuperar",
        "dxDataGrid-editingConfirmDeleteMessage": "Are you sure you want to delete this record?",
        "dxDataGrid-validationCancelChanges": "Cancelar alterações",
        "dxDataGrid-groupPanelEmptyText": "Arraste as colunas aqui para agrupar",
        "dxDataGrid-noDataText": "Sem dados",
        "dxDataGrid-searchPanelPlaceholder": "Busca...",
        "dxDataGrid-filterRowShowAllText": "(Todos)",
        "dxDataGrid-filterRowResetOperationText": "Limpar",
        "dxDataGrid-filterRowOperationEquals": "Igual",
        "dxDataGrid-filterRowOperationNotEquals": "Diferente",
        "dxDataGrid-filterRowOperationLess": "Menor que",
        "dxDataGrid-filterRowOperationLessOrEquals": "Menor ou igual a",
        "dxDataGrid-filterRowOperationGreater": "Maior que",
        "dxDataGrid-filterRowOperationGreaterOrEquals": "Maior ou igual a",
        "dxDataGrid-filterRowOperationStartsWith": "Inicia com",
        "dxDataGrid-filterRowOperationContains": "Contém",
        "dxDataGrid-filterRowOperationNotContains": "Não contém",
        "dxDataGrid-filterRowOperationEndsWith": "Termina com",
        "dxDataGrid-filterRowOperationBetween": "Entre",
        "dxDataGrid-filterRowOperationBetweenStartText": "Início",
        "dxDataGrid-filterRowOperationBetweenEndText": "Fim",
        "dxDataGrid-applyFilterText": "Aplicar Filtros",
        "dxDataGrid-trueText": "Sim",
        "dxDataGrid-falseText": "Não",
        "dxDataGrid-sortingAscendingText": "Ordem Crescente",
        "dxDataGrid-sortingDescendingText": "Ordem Decrescente",
        "dxDataGrid-sortingClearText": "Limpar Ordenação",
        "dxDataGrid-editingSaveAllChanges": "Salvar alterações",
        "dxDataGrid-editingCancelAllChanges": "Descartar alterações",
        "dxDataGrid-editingAddRow": "Adicionar na linha",
        "dxDataGrid-summaryMin": "Min.: {0}",
        "dxDataGrid-summaryMinOtherColumn": "Min. de {1} é {0}",
        "dxDataGrid-summaryMax": "Máx.: {0}",
        "dxDataGrid-summaryMaxOtherColumn": "Máx. de {1} é {0}",
        "dxDataGrid-summaryAvg": "Média: {0}",
        "dxDataGrid-summaryAvgOtherColumn": "Média de {1} é {0}",
        "dxDataGrid-summarySum": "Soma: {0}",
        "dxDataGrid-summarySumOtherColumn": "Soma de {1} é {0}",
        "dxDataGrid-summaryCount": "Contador: {0}",
        "dxDataGrid-columnFixingFix": "Fixar",
        "dxDataGrid-columnFixingUnfix": "Soltar",
        "dxDataGrid-columnFixingLeftPosition": "Para a esquerda",
        "dxDataGrid-columnFixingRightPosition": "Para a direita",
        "dxDataGrid-exportTo": "Exportar",
        "dxDataGrid-exportToExcel": "Exportar para arquivo Excel",
        "dxDataGrid-excelFormat": "Arquivo Excel",
        "dxDataGrid-selectedRows": "Selecionar Linhas",
        "dxDataGrid-exportSelectedRows": "Exportar linhas selecionada",
        "dxDataGrid-exportAll": "Exportar tudo",
        "dxDataGrid-headerFilterEmptyValue": "(Em branco)",
        "dxDataGrid-headerFilterOK": "OK",
        "dxDataGrid-headerFilterCancel": "Cancelar",
        "dxDataGrid-ariaColumn": "Coluna",
        "dxDataGrid-ariaValue": "Valor",
        "dxDataGrid-ariaFilterCell": "Célula de Filtro",
        "dxDataGrid-ariaCollapse": "Abrir",
        "dxDataGrid-ariaExpand": "Recolher",
        "dxDataGrid-ariaDataGrid": "Lista",
        "dxDataGrid-ariaSearchInGrid": "Pesquisar na lista",
        "dxDataGrid-ariaSelectAll": "Selecionar tudo",
        "dxDataGrid-ariaSelectRow": "Selecionar linha",

        "dxTreeList-ariaTreeList": "Tree list",
        "dxTreeList-editingAddRowToNode": "Add",

        "dxPager-infoText": "Page {0} of {1} ({2} items)",
        "dxPager-pagesCountText": "of",

        "dxPivotGrid-grandTotal": "Grand Total",
        "dxPivotGrid-total": "{0} Total",
        "dxPivotGrid-fieldChooserTitle": "Field Chooser",
        "dxPivotGrid-showFieldChooser": "Show Field Chooser",
        "dxPivotGrid-expandAll": "Expand All",
        "dxPivotGrid-collapseAll": "Collapse All",
        "dxPivotGrid-sortColumnBySummary": "Sort \"{0}\" by This Column",
        "dxPivotGrid-sortRowBySummary": "Sort \"{0}\" by This Row",
        "dxPivotGrid-removeAllSorting": "Remove All Sorting",
        "dxPivotGrid-dataNotAvailable": "N/A",
        "dxPivotGrid-rowFields": "Row Fields",
        "dxPivotGrid-columnFields": "Column Fields",
        "dxPivotGrid-dataFields": "Data Fields",
        "dxPivotGrid-filterFields": "Filter Fields",
        "dxPivotGrid-allFields": "All Fields",
        "dxPivotGrid-columnFieldArea": "Drop Column Fields Here",
        "dxPivotGrid-dataFieldArea": "Drop Data Fields Here",
        "dxPivotGrid-rowFieldArea": "Drop Row Fields Here",
        "dxPivotGrid-filterFieldArea": "Drop Filter Fields Here",

        "dxScheduler-editorLabelTitle": "Subject",
        "dxScheduler-editorLabelStartDate": "Start Date",
        "dxScheduler-editorLabelEndDate": "End Date",
        "dxScheduler-editorLabelDescription": "Description",
        "dxScheduler-editorLabelRecurrence": "Repeat",

        "dxScheduler-openAppointment": "Open appointment",

        "dxScheduler-recurrenceNever": "Never",
        "dxScheduler-recurrenceDaily": "Daily",
        "dxScheduler-recurrenceWeekly": "Weekly",
        "dxScheduler-recurrenceMonthly": "Monthly",
        "dxScheduler-recurrenceYearly": "Yearly",

        "dxScheduler-recurrenceEvery": "Every",
        "dxScheduler-recurrenceEnd": "End repeat",
        "dxScheduler-recurrenceAfter": "After",
        "dxScheduler-recurrenceOn": "On",

        "dxScheduler-recurrenceRepeatDaily": "day(s)",
        "dxScheduler-recurrenceRepeatWeekly": "week(s)",
        "dxScheduler-recurrenceRepeatMonthly": "month(s)",
        "dxScheduler-recurrenceRepeatYearly": "year(s)",

        "dxScheduler-switcherDay": "Day",
        "dxScheduler-switcherWeek": "Week",
        "dxScheduler-switcherWorkWeek": "Work Week",
        "dxScheduler-switcherMonth": "Month",

        "dxScheduler-switcherAgenda": "Agenda",

        "dxScheduler-switcherTimelineDay": "Timeline Day",
        "dxScheduler-switcherTimelineWeek": "Timeline Week",
        "dxScheduler-switcherTimelineWorkWeek": "Timeline Work Week",
        "dxScheduler-switcherTimelineMonth": "Timeline Month",

        "dxScheduler-recurrenceRepeatOnDate": "on date",
        "dxScheduler-recurrenceRepeatCount": "occurrence(s)",
        "dxScheduler-allDay": "All day",

        "dxScheduler-confirmRecurrenceEditMessage": "Do you want to edit only this appointment or the whole series?",
        "dxScheduler-confirmRecurrenceDeleteMessage": "Do you want to delete only this appointment or the whole series?",

        "dxScheduler-confirmRecurrenceEditSeries": "Edit series",
        "dxScheduler-confirmRecurrenceDeleteSeries": "Delete series",
        "dxScheduler-confirmRecurrenceEditOccurrence": "Edit appointment",
        "dxScheduler-confirmRecurrenceDeleteOccurrence": "Delete appointment",

        "dxScheduler-noTimezoneTitle": "No timezone",

        "dxCalendar-todayButtonText": "Today",
        "dxCalendar-ariaWidgetName": "Calendar",

        "dxColorView-ariaRed": "Red",
        "dxColorView-ariaGreen": "Green",
        "dxColorView-ariaBlue": "Blue",
        "dxColorView-ariaAlpha": "Transparency",
        "dxColorView-ariaHex": "Color code",

        "vizExport-printingButtonText": "Print",
        "vizExport-titleMenuText": "Exporting/Printing",
        "vizExport-exportButtonText": "{0} file"
      }
    })
});
