$ = jQuery.noConflict();
$(document).ready(function()
	{


		var options = {
		success: showResponse,
		url:'themes.php?page=control-panel.php&mode=ajax'
		}; 
//		$('#settings').ajaxForm(options); 
	}
); 
function showResponse(responseText, statusText)
{ 
    $('.ajaxmessage p').html('Settings Saved');
	$('.ajaxmessage').slideDown(500);
	setTimeout("jQuery('.ajaxmessage').slideUp(500);",2000);
}
