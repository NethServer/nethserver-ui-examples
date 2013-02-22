<?php

$res_title = $T('res_title');
// read auto-generated class for the 'res' object in view
$res_id = $view->getClientEventTarget('res');
echo "<div class='dashboard-item'>";
echo $view->header()->setAttribute('template',$res_title);
// initialize a div with res_id. This div will be updated using javascript
echo "<div class='{$res_id}'></div>";
echo "</div>";

$view->includeJavascript("
(function ( $ ) {

   function loadPage() {
        /* Execute an ajax call to /Dashboard/SystemStatus/MyResource.json (.json suffix is automatically added).
        *  On response a nethguiupdateview event will be fired on all elements with class corresponding to the res_id
        */
        $.Nethgui.Server.ajaxMessage({
            isMutation: false,
            url: '/Dashboard/SystemStatus/MyResource'
        });
    } 
 
   $(document).ready(function() {
       loadPage();
       setTimeout(loadPage,1000); // populate data for the first time 
       // reload page after 30 seconds
       setInterval(loadPage,30000);

       $('.$res_id').on('nethguiupdateview', function(event, value, httpStatusCode) {
           // value will be the new value for res
           console.log(value);
           // add the new value to the existing div
           $(this).empty();
           $(this).append('<span style=\"font-weight: bold\">My value is: '+value+'</span>');
          
       });

   }); //end document.ready

})( jQuery);
");

