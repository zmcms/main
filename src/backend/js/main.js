$(document).ready(function(){
	var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
	/**
	* OTIERA FORMULARZ Z PUBLICZNYMI DANYMI KONTAKTOWYMI.
	**/
	$("#contact_data_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/contact_data";
		return false;
	});	
	/**
	* ZAPISUJE ZMIANY Z FORMULARZA Z PUBLICZNYMI DANYMI KONTAKTOWYMI.
	**/
	$("#zmcms_main_frm_contact_data #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/zmcms_main_frm_contact_data_update",
					data: new FormData(document.getElementById('zmcms_main_frm_contact_data')),
					processData: false,
					contentType: false,
					success: function(data){
						$('#zmcms_main_frm_contact_data .msg').html(data);
					},
					statusCode: {
						500: function(xhr) {$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
	/**
	* OTWIERA FORMULARZ Z INFORMACJĄ O CIASTECZKACH.
	**/
	$("#cookies_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/cookies_info";
		return false;
	});	
	/**
	* ZAPISUJE DANE Z FORMULARZA Z INFORMACJĄ O CIASTECZKACH.
	**/
	$("#zmcms_main_frm_cookies_info #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			tinymce.triggerSave();
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/zmcms_main_frm_cookies_info_update",
					data: new FormData(document.getElementById('zmcms_main_frm_cookies_info')),
					processData: false,
					contentType: false,
					success: function(data){
						$('#zmcms_main_frm_cookies_info .msg').html(data);
					},
					statusCode: {
						500: function(xhr) {$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
	/**
	* OTWIERA FORMULARZ Z IDENTYFIKACJĄ WIZUALNĄ: (Logo, favicon itp)
	**/
	$("#logo_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/logo";
		return false;
	});	
	/**
	* ZAPISUJE DANE Z FORMULARZA Z IDENTYFIKACJĄ WIZUALNĄ.
	**/
	$("#zmcms_main_frm_logo #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/zmcms_main_frm_logo_update",
					data: new FormData(document.getElementById('zmcms_main_frm_logo')),
					processData: false,
					contentType: false,
					success: function(data){
						$('#zmcms_main_frm_logo .msg').html(data);
					},
					statusCode: {
						500: function(xhr) {$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
	/**
	* WYBÓR ŚCIEŻKI DO LOGA W FORMULARZU Z IDENTYFIKACJĄ WIZUALNĄ.
	**/
	$("#zmcms_main_choose_logo").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=zmcms_main_choose_logo_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	/**
	* WYBÓR ŚCIEŻKI DO FAVICONY W FORMULARZU Z IDENTYFIKACJĄ WIZUALNĄ.
	**/
	$("#zmcms_main_choose_favicon").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=zmcms_main_choose_favicon_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	/**
	* OTWIERA FORMULARZ Z DOMYŚLYMI USTAWIENIAMI SEKCJI META OPEN-GRAPH itp.
	**/
	$("#seosem_default_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/seo_sem_frm";
		return false;
	});	
	/**
	* ZAPISUJE DANE Z FORMULARZA Z DOMYŚLYMI USTAWIENIAMI SEKCJI META OPEN-GRAPH itp.
	**/
	$("#zmcms_main_seo_sem #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/zmcms_main_seo_sem_frm_update",
					data: new FormData(document.getElementById('zmcms_main_seo_sem')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data=='ok')
							$('#zmcms_main_seo_sem .msg').html('Zaktualizowano dane konfiguracyjne.');
						else
							$('#zmcms_main_seo_sem .msg').html('Wystąpił błąd podczas aktualizacji');
					},
					statusCode: {
						500: function(xhr) {$('#zmcms_main_seo_sem .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#zmcms_main_seo_sem .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#zmcms_main_seo_sem .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#zmcms_main_seo_sem .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
	/**
	* WYBÓR ŚCIEŻKI DO GRAFIKI DLA OPEN-GRAPH SEKCJI META OPEN-GRAPH itp.
	**/
	$("#zmcms_main_choose_og_image").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=og_image_choose_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	/**
	* USUNIĘCIE LOKALIZACJI W FORMULARZU Z PUBLICZNYMI DANYMI KONTAKTOWYMI.
	**/
	$("a[id^='department_del_']").on('click', function(e){
		var str = $(this).attr('id'); 
		var res = str.slice(15);
		e.preventDefault();e.stopPropagation();
		if(confirm( 'Usunąć lokalizację "'+$('#department_name_'+res).val()+'"?' )){
			$.ajax({
				type: 'GET',
				url:  "/"+backend_prefix+"/zmcms_main_frm_contact_data_delete_department/"+$('#department_key_'+res).val(),
				processData: false,
				contentType: false,
				success: function(data){
					$('#zmcms_main_frm_contact_data .msg').html(data);
				},
				statusCode: {
					500: function(xhr) {$('#zmcms_main_frm_contact_data .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
					419: function(xhr){$('#zmcms_main_frm_contact_data .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
					404: function(xhr){$('#zmcms_main_frm_contact_data .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
					405: function(xhr){$('#zmcms_main_frm_contact_data .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
				}
			});
		}
		return false;
	});
	/**
	* OTWÓRZ FORMULARZ DO DODANIA NOWEJ LOKALIZACJI Z PUBLICZNYMI DANYMI KONTAKTOWYMI.
	**/
	$("a[id^='department_new_']").on('click', function(e){
		var str = $(this).attr('id'); 
		var res = str.slice(15);
		location.href = "/"+backend_prefix+"/contact_data_create_new_department";
		return false;
	});

	/**
	* ZAPISZ DANE Z FORMULARZA DO DODANIA NOWEJ LOKALIZACJI Z PUBLICZNYMI DANYMI KONTAKTOWYMI.
	**/
	$("#contact_data_create_new_department_frm #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/contact_data_create_new_department_save",
					data: new FormData(document.getElementById('contact_data_create_new_department_frm')),
					processData: false,
					contentType: false,
					success: function(data){
						$('#contact_data_create_new_department_frm .msg').html(data);
					},
					statusCode: {
						500: function(xhr) {$('#contact_data_create_new_department_frm .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#contact_data_create_new_department_frm .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#contact_data_create_new_department_frm .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#contact_data_create_new_department_frm .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
	/**
	* OTWÓRZ FORMULARZ DO ZARZĄDZANIA MOTYWAMI SERWISU INTERNETOWEGO.
	**/
	$("#themes_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/website_themes_frm";
		return false;
	});	
});