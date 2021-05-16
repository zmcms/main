$(document).ready(function(){
	$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	});
	var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
	$("#contact_data_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/contact_data";
		return false;
	});	
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
	* OTWIERA FORMULARZ Z INFORMACJĄ O CIASTECZKACH
	**/
	$("#cookies_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/cookies_info";
		return false;
	});	
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
	$("#logo_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/logo";
		return false;
	});	

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
	$("#zmcms_main_choose_logo").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=zmcms_main_choose_logo_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	$("#zmcms_main_choose_favicon").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=zmcms_main_choose_favicon_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	$("#seosem_default_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/seo_sem_frm";
		return false;
	});	
	
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

	$("#zmcms_main_choose_og_image").on('click', function(e){
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$('#ajax_dialog_box').fadeIn( "slow", function() {});
			$('#ajax_dialog_box_content').html('<iframe  width="'+(0.90*$(window).width())+'px" height="'+(0.85*$(window.top).height())+'px" frameborder="0" '+
					'src="/themes/zmcms/backend/js/filemanager/dialog.php?type=0&field_id=og_image_choose_txt&relative_url=1&multiple=false&callback=responsive_filemanager_callback"'+
					'></iframe>');
		return false;
	});	
	$("button[id^='department_del_']").on('click', function(e){
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
					ddd
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
	$("button[id^='department_new_']").on('click', function(e){
		var str = $(this).attr('id'); 
		var res = str.slice(15);
		location.href = "/"+backend_prefix+"/contact_data_create_new_department";
		return false;
	});

	
	$("#contact_data_create_new_department_frm #btn_save").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
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

	$("#themes_open").on('click', function(e){
		location.href = "/"+backend_prefix+"/home/settings/website_themes_frm";
		return false;
	});	
// #zmcms_main_frm_themes #theme_create
	$("#btn_new_theme_create").on('click', function(e){
		e.preventDefault();e.stopPropagation();
		$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$.ajax({
				type: 'GET',
				url:  "/"+backend_prefix+"/home/settings/zmcms_main_new_theme_create/"+$('#txt_new_theme_create').val(),
				processData: false,
				contentType: false,
				success: function(data){
					d=JSON.parse(data);
					$('#ajax_dialog_box_content').html('<div class="msg '+d.result+'">'+d.msg+'</div>');
				},
				statusCode: {
					500: function(xhr) {$('#ajax_dialog_box_content').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
					419: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
					404: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error">Nie znaleziono skryptu</div>');},
					405: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
				}
			});
	});
	/**
	 * PRZYCISK POWROTU DO POPRZEDNIEJ STRONY
	 **/
	$('.back_btn').on('click', function (e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
		e.preventDefault();e.stopPropagation();
		history.go(-1);
		return false;
	});

	$("div[id^='tab_']").on('click', function(e){
	  var str = $(this).attr('id'); var res = str.slice(4);
	  $("div[id^='tab_']").removeClass('active');
	  $(this).addClass('active');
	  $("div[id^='tabcontent_']").removeClass('active');
	  $("#tabcontent_"+res).addClass('active');
	  return false;
	});
	
});

function str_slug(str){
// str = str.replace(/^\s+|\s+$/g, ""); // trim
str = String(str).toString();
str = str.replace(/^\s+|\s+$/g, ""); // trim
str = str.toLowerCase();
var swaps = {
	'at':['@'],
	'hash':['#'],
	'amp':['&'],
	'star':['\\*'],

	'-':['='],
	'0': ['°', '₀', '۰', '０'],
    '1': ['¹', '₁', '۱', '１'],
    '2': ['²', '₂', '۲', '２'],
    '3': ['³', '₃', '۳', '３'],
    '4': ['⁴', '₄', '۴', '٤', '４'],
    '5': ['⁵', '₅', '۵', '٥', '５'],
    '6': ['⁶', '₆', '۶', '٦', '６'],
    '7': ['⁷', '₇', '۷', '７'],
    '8': ['⁸', '₈', '۸', '８'],
    '9': ['⁹', '₉', '۹', '９'],
    'a': ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å', 'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ', 'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά', 'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ', 'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا', 'ａ', 'ä'],
    'b': ['б', 'β', 'ب', 'ဗ', 'ბ', 'ｂ'],
    'c': ['ç', 'ć', 'č', 'ĉ', 'ċ', 'ｃ'],
    'd': ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ', 'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ', 'ｄ'],
    'e': ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ', 'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э', 'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ', 'ｅ'],
    'f': ['ф', 'φ', 'ف', 'ƒ', 'ფ', 'ｆ'],
    'g': ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ', 'ｇ'],
    'h': ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ', 'ｈ'],
    'i': ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į', 'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ', 'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ', 'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი', 'इ', 'ی', 'ｉ'],
    'j': ['ĵ', 'ј', 'Ј', 'ჯ', 'ج', 'ｊ'],
    'k': ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ', 'ک', 'ｋ'],
    'l': ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ', 'ｌ'],
    'm': ['м', 'μ', 'م', 'မ', 'მ', 'ｍ'],
    'n': ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ', 'ｎ'],
    'o': ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő', 'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό', 'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ', 'ｏ', 'ö'],
    'p': ['п', 'π', 'ပ', 'პ', 'پ', 'ｐ'],
    'q': ['ყ', 'ｑ'],
    'r': ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ', 'ｒ'],
    's': ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს', 'ｓ'],
    't': ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ', 'ｔ'],
    'u': ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ', 'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ', 'ｕ', 'ў', 'ü'],
    'v': ['в', 'ვ', 'ϐ', 'ｖ'],
    'w': ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ', 'ｗ'],
    'x': ['χ', 'ξ', 'ｘ'],
    'y': ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ', 'ϋ', 'ύ', 'ΰ', 'ي', 'ယ', 'ｙ'],
    'z': ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ', 'ｚ'],
    'aa': ['ع', 'आ', 'آ'],
    'ae': ['æ', 'ǽ'],
    'ai': ['ऐ'],
    'ch': ['ч', 'ჩ', 'ჭ', 'چ'],
    'dj': ['ђ', 'đ'],
    'dz': ['џ', 'ძ'],
    'ei': ['ऍ'],
    'gh': ['غ', 'ღ'],
    'ii': ['ई'],
    'ij': ['ĳ'],
    'kh': ['х', 'خ', 'ხ'],
    'lj': ['љ'],
    'nj': ['њ'],
    'oe': ['ö', 'œ', 'ؤ'],
    'oi': ['ऑ'],
    'oii': ['ऒ'],
    'ps': ['ψ'],
    'sh': ['ш', 'შ', 'ش'],
    'shch': ['щ'],
    'ss': ['ß'],
    'sx': ['ŝ'],
    'th': ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
    'ts': ['ц', 'ც', 'წ'],
    'ue': ['ü'],
    'uu': ['ऊ'],
    'ya': ['я'],
    'yu': ['ю'],
    'zh': ['ж', 'ჟ', 'ژ'],
    '(c)': ['©'],
    'A': ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą', 'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ', 'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ', 'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ', 'Ａ', 'Ä'],
    'B': ['Б', 'Β', 'ब', 'Ｂ'],
    'C': ['Ç', 'Ć', 'Č', 'Ĉ', 'Ċ', 'Ｃ'],
    'D': ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ', 'Ｄ'],
    'E': ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ', 'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э', 'Є', 'Ə', 'Ｅ'],
    'F': ['Ф', 'Φ', 'Ｆ'],
    'G': ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ', 'Ｇ'],
    'H': ['Η', 'Ή', 'Ħ', 'Ｈ'],
    'I': ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į', 'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ', 'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ', 'Ｉ'],
    'J': ['Ｊ'],
    'K': ['К', 'Κ', 'Ｋ'],
    'L': ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल', 'Ｌ'],
    'M': ['М', 'Μ', 'Ｍ'],
    'N': ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν', 'Ｎ'],
    'O': ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő', 'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ', 'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ', 'Ｏ', 'Ö'],
    'P': ['П', 'Π', 'Ｐ'],
    'Q': ['Ｑ'],
    'R': ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ', 'Ｒ'],
    'S': ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ', 'Ｓ'],
    'T': ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ', 'Ｔ'],
    'U': ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ', 'Ǘ', 'Ǚ', 'Ǜ', 'Ｕ', 'Ў', 'Ü'],
    'V': ['В', 'Ｖ'],
    'W': ['Ω', 'Ώ', 'Ŵ', 'Ｗ'],
    'X': ['Χ', 'Ξ', 'Ｘ'],
    'Y': ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ', 'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ', 'Ｙ'],
    'Z': ['Ź', 'Ž', 'Ż', 'З', 'Ζ', 'Ｚ'],
    'AE': ['Æ', 'Ǽ'],
    'Ch': ['Ч'],
    'Dj': ['Ђ'],
    'Dz': ['Џ'],
    'Gx': ['Ĝ'],
    'Hx': ['Ĥ'],
    'Ij': ['Ĳ'],
    'Jx': ['Ĵ'],
    'Kh': ['Х'],
    'Lj': ['Љ'],
    'Nj': ['Њ'],
    'Oe': ['Œ'],
    'Ps': ['Ψ'],
    'Sh': ['Ш'],
    'Shch': ['Щ'],
    'Ss': ['ẞ'],
    'Th': ['Þ'],
    'Ts': ['Ц'],
    'Ya': ['Я'],
    'Yu': ['Ю'],
    'Zh': ['Ж'],
    };
	Object.keys(swaps).forEach((swap) => {
        swaps[swap].forEach(s => {
            str = str.replace(new RegExp(s, "g"), swap);
        })
    });
    return str
        .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
        .replace(/\s+/g, "-") // collapse whitespace and replace by -
        .replace(/-+/g, "-") // collapse dashes
        .replace(/^-+/, "") // trim - from start of text
        .replace(/-+$/, "");
  return str;
}
$(".summary a").on('click', function() {
	alert ('ok');
	var body = $("html, body");
 	body.animate({}, 1500);
});
