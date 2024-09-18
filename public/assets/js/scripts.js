(function (window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */



   // lock/unlock button script 
   var lockBtn = $('.al-lock-btn');
   var clFrom = lockBtn.data('form-id');
   var inputs = $('#'+clFrom +' input');
   var selects = $('#'+clFrom +' select');
   var textareas = $('#'+clFrom +' textarea');
   if(lockBtn.attr('data-action') == 'unlock'){
       inputs.prop("disabled", true );
       selects.prop("disabled", true );
       textareas.prop("disabled", true );
       lockBtn.attr("data-action", 'unlock');
       lockBtn.html('Unlock');
   }
   // onclick button 
   $(document).on('click','.al-lock-btn',function(){
       var action = $(this).attr('data-action');
       var clFrom = $(this).data('form-id');
       var inputs = $('#'+clFrom +' input');
       var selects = $('#'+clFrom +' select');
       var textareas = $('#'+clFrom +' textarea');
       if(action == 'lock'){
           inputs.prop("disabled", true );
           selects.prop("disabled", true );
           textareas.prop("disabled", true );
           $(this).attr("data-action", 'unlock');
           $(this).html('Unlock');
       }
       else{
           inputs.prop("disabled", false );
           selects.prop("disabled", false );
           textareas.prop("disabled", false );
           $(this).attr("data-action", 'lock');
           $(this).html('lock');
       }
   });



   

})(window);
