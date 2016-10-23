jQuery(document).ready(function($){
  /*This code will prevent the zooming in when filling up forms in mobile*/
  var $viewportMeta = $('meta[name="viewport"]');
  $('input, select, textarea').bind('focus blur', function(event) {
    $viewportMeta.attr('content', 'width=device-width,initial-scale=1,maximum-scale=' + (event.type == 'blur' ? 10 : 1));
  });
  $('.ui.accordion')
    .accordion()
  ;
  $('.special.cards .image')
   .dimmer({
     on: 'hover'
   })
  ;
});
