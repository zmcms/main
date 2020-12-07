<?php
namespace Zmcms\Main\Frontend\Controllers;
use Illuminate\Http\Request;
class ZmcmsMainController extends \App\Http\Controllers\Controller
{
	public function homepage($parameters = null, Request $request = null){
		$str =''; $data = [];
		$arr = Config((Config('zmcms.frontend.theme_name')?? 'zmcms').'.frontend.home_page_modules');
		foreach ($arr as $a) {
			$str .= \App::call(
				$a[0],
				$a[1]
			);
		}

		// return 'xxxxxxxxxxxxxxxxxxxx<br />'.print_r($arr, true);
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.home.home', compact('data', 'str'));
		// return __METHOD__;
	}
	public function frm_submit(Request $request){
		// Zmcms\Main\Frontend\Controllers\ZmcmsMainController@frm_submit
		// Config(Config('zmcms.frontend.theme_name').'.forms.contact_frm.form_view
		// return print_r($request->all(), true);
		return \App::call(
			Config(Config('zmcms.frontend.theme_name').'.forms.'.$request->all()['_id'].'.run'),
			['data'=>$request->all()]
		);
		

	}
	public function frm_process($data){
		// Create the Mailer using your created Transport
		try{
			$mailer = new \Swift_Mailer((new \Swift_SmtpTransport(
					Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.host'), 
					Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.port'), 
					'tls')
					)
			  		->setUsername(Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.mail'))
			  		->setPassword(Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.pass')));
			/**
			 * 
port
			 */
			/**
			 * WYSYŁKA WYSYŁAJĄCEGO
			 */
			$message = (new \Swift_Message(___(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.out.subject'))))
			  ->setFrom([Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.mail') => Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.name')])
			  ->setTo([$data['txt_email']])
			  ->setBody(view(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.out.txt'), compact('data')))
			  ->addPart(view(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.out.html'), compact('data')), 'text/html')
			  ;
			
			$result = $mailer->send($message);
			/**
			 * WYSYŁKA DO OBSŁUGI
			 */
			$mails=[];
			if(is_array(Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail'))){
				foreach (Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail') as $m)
					$mails[] = $m;
			}else{
				$mails[] = Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail');
			}
			foreach($mails as $m){
				$message = (new \Swift_Message(___(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.in.subject'))))
				  ->setFrom([Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.mail') => Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.from.name')])
				  ->setTo([$m])
				  ->setBody(view(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.in.txt'), compact('data')))
				  ->addPart(view(Config((Config('zmcms.frontend.theme_name') ?? 'zmcms').'.forms.'.$data['_id'].'.confirm_mail.in.html'), compact('data')), 'text/html')
				  ;
				  $result = $mailer->send($message);
			}
			// Send the message
			
			
			
		}catch(\Exception $e){
			return $e->getCode().': '.$e->getMessage();
		}
		

		return 'ok';

	}

}
