// Extend the default picker options for all instances.
$.extend($.fn.datepicker.defaults, {
monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
'Novembre', 'Décembre'],
weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
today: 'aujourd\'hui',
clear: 'effacer',
formatSubmit: 'yyyy/mm/dd'
})

// Or, pass the months and weekdays as an array for each invocation.
$('.datepicker').datepicker({
monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
'Novembre', 'Décembre'],
weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
clear: 'effacer',
formatSubmit: 'yyyy/mm/dd'
})