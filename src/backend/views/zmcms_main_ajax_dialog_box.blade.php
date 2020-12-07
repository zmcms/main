<div id="ajax_dialog_box" style="display: none;">
	<div id="ajax_dialog_box_control_panel" class="control_panel pw12">
		<a href="#" id="ajax_dialog_box_close_btn" class=""><p><i class="fa fa-times" aria-hidden="true"></i> Zamknij</p></a>
	</div> 
	<div id="ajax_dialog_box_content" class="content pw12"></div>
</div>
<script type="text/javascript">
	$('#ajax_dialog_box_close_btn').on('click', function(e){
		$('#ajax_dialog_box_content').html('');
		// if (typeof tinyMCE != "undefined")tinyMCE.remove();
		$('#ajax_dialog_box').fadeOut( "slow", function() {});
   	});
   	$('#ajax_dialog_box').on('click', function(e){
		$('#ajax_dialog_box_content').html('');
		// if (typeof tinyMCE != "undefined")tinyMCE.remove();
		$('#ajax_dialog_box').fadeOut( "slow", function() {});
   	});
   	$('#ajax_dialog_box_content').on('click', function(e){
   		// alert(0);
		return false;
   	});
   	function responsive_filemanager_callback(field_id){ 

 		$('#ajax_dialog_box_content').html('');
      	$('#ajax_dialog_box').fadeOut( "slow", function() {});
      	$('#'+field_id).trigger('custom');

  	}
</script>