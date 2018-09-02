// require('./summernote')
// require('summernote-ext-print/summernote-ext-print.js')
// import {forEach, isUndefined, isEmpty, union, difference} from 'lodash'
// import { summernote } from './default_parameters/summernote'
import './dx'
import dialogs from './dialogs'

$(function(){

  $('.autoheight').css('height', (window.innerHeight * 0.75) + 'px')

  $(window).resize(function () {
    $('.autoheight').css('height', (window.innerHeight * 0.75) + 'px')
  })

  $('#btn_delete').on('click', function () {
    let route = $(this).data('route')
    dialogs.questionDelete(response => {
      if ( response.value )
        $('#delete-form').attr('action', route).submit()
    })
  })

  // let el_editor = $('.editor')

  // if ( el_editor.data('autoheight'))
  //   summernote.height = screen.height - ((screen.height * 65) / 100)
  // el_editor.summernote(summernote)
})