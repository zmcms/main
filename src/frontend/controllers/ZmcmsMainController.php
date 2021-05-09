<?php
namespace Zmcms\Main\Frontend\Controllers;
use Illuminate\Http\Request;
use Http;
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
			Config(Config('zmcms.frontend.theme_name').'.forms.'.$request->all()['_id'].'.'.($request->all()['_action'] ?? 'run')),
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
			// if(is_array(Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail'))){
				// foreach (Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail') as $m)
					// $mails[] = $m;
			// }else{
				// $mails[] = Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to.mail');
			// }
			$mails = Config(Config('zmcms.frontend.theme_name').'.forms.'.$data['_id'].'.confirm_mail.to');
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


	public function curltest(){
		return $this->curl_curl();
		return $this->curl_http();
	}
	public function curl_curl(){
		$url = "https://oidc-gcp.ckpl.us/connect/token";
		$credentials = "pay-e2fc2638-a37f-4f8c-a863-4c2c30c77b6a:F4568uSJjyKaD2uLYaFP6nkuMjBcuhZUYv9VYzWBYxX7HFHFWB";	
		$post_data = 'grant_type=client_credentials&scope=pay_api';
		$headers = array(
		    "Content-Type: application/x-www-form-urlencoded",
		    "Accept: application/json",
		    "Authorization: Basic " . base64_encode($credentials)
		);
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($ch, CURLOPT_HEADER, 1);

        $data = curl_exec($ch);
        curl_close($ch);
        echo '<pre>'.print_r(json_decode($data, true), true).'</pre>';


        $url = "https://pay-api.ckpl.io/payments";
		$ch1 = curl_init();
		$headers = array(
            "Content-Type: application/json",
            "Accept-Language: pl", 
            "Accept: application/json",
            "Authorization:Bearer " . (json_decode($data, true))['access_token']
        );
        $post_data_arr =[
        		'externalPaymentId' => '342HHH88LKDJ89876767',
    			'pointOfSaleId' => 'POS1771433655828498',
    			'category' => 'E_COMMERCE',
    			'totalAmount' => [
    				'currency' => 'PLN',
    				'value' => '19.99',
    			],
    			'merchant' => [
    				'name' => 'fd.zm02.pl',
    			],
    			['description' => 'Payment description.'],
        	];
        $post_data = '{
       		"externalPaymentId": "342HHH88LKDJ89876767",
       		"pointOfSaleId": "POS1771433655828498",
       		"category": "E_COMMERCE",
       		"totalAmount": {
       		  "currency": "PLN",
       		  "value": "19.99"
       		},
       		"merchant": {
       		  "name": "fd.zm02.pl"
       		},
       		"description": "Payment description."
     	}';
        curl_setopt($ch1, CURLOPT_URL, $url);
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch1, CURLOPT_HEADER, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS,json_encode($post_data_arr));
		$result = curl_exec($ch1);
		curl_close($ch1);
        echo '<pre>'.print_r(json_decode($result, true), true).'</pre>'; 
        echo '<pre>'.print_r(json_decode($post_data, true), true).'</pre>'; 
        return 'false';
	}
	public function curl_http(){
		$url = "https://oidc-gcp.ckpl.us/connect/token";
		$credentials = "pay-e2fc2638-a37f-4f8c-a863-4c2c30c77b6a:F4568uSJjyKaD2uLYaFP6nkuMjBcuhZUYv9VYzWBYxX7HFHFWB";	
		$post_data = 'grant_type=client_credentials&scope=pay_api';
		$headers = array(
		    "Content-Type: application/x-www-form-urlencoded",
		    "Accept: application/json",
		    "Authorization: Basic " . base64_encode($credentials)
		);
		$post_data_arr =[
        		'externalPaymentId' => '342HHH88LKDJ89876767',
    			'pointOfSaleId' => 'POS1771433655828498',
    			'category' => 'E_COMMERCE',
    			'totalAmount' => [
    				'currency' => 'PLN',
    				'value' => '19.99',
    			],
    			'merchant' => [
    				'name' => 'fd.zm02.pl',
    			],
    			['description' => 'Payment description.'],
        	];
        $post_data = '{
       		"externalPaymentId": "342HHH88LKDJ89876767",
       		"pointOfSaleId": "POS1771433655828498",
       		"category": "E_COMMERCE",
       		"totalAmount": {
       		  "currency": "PLN",
       		  "value": "19.99"
       		},
       		"merchant": {
       		  "name": "fd.zm02.pl"
       		},
       		"description": "Payment description."
     	}';
     	$post_data_auth = 'grant_type=client_credentials&scope=pay_api';
     	$post_data_auth_arr = [
     		'grant_type' => 'client_credentials',
     		'scope' => 'pay_api',
     	];
		// $response = Http::withHeaders([
		    // 'Content-Type'=>'application/x-www-form-urlencoded',
		    // 'Accept'=>'application/json',
		    // 'Authorization'=>'Basic '.base64_encode($credentials),
		// ])->post($url, $post_data_auth_arr);

		$response = Http::withBasicAuth(
				'pay-e2fc2638-a37f-4f8c-a863-4c2c30c77b6a', 
				'F4568uSJjyKaD2uLYaFP6nkuMjBcuhZUYv9VYzWBYxX7HFHFWB'
			)->acceptJson()->post($url, $post_data_auth_arr);
		echo '<pre>'.print_r(json_decode($response, true), true).'</pre>'; 

	}

}


/**
 * 

CINKCIARZ_OIDC_HOST:	https://oidc-gcp.ckpl.us
CINKCIARZ_PAY_HOST:		https://pay-api.ckpl.io
Identyfikator klucza: 	pg8AWR6ODyo4E8_ngIKzY_1GOuPw5UvEArU8gl3KdhQ
dentyfikator publiczny sklepu: STR1771433088266244


 	$credentials = "pay-e2fc2638-a37f-4f8c-a863-4c2c30c77b6a:F4568uSJjyKaD2uLYaFP6nkuMjBcuhZUYv9VYzWBYxX7HFHFWB";
	$url = "https://oidc-gcp.ckpl.us/connect/token";
	$headers = array(
	    "Content-Type: application/x-www-form-urlencoded",
	    "Accept: application/json",
	    "Authorization: Basic " . base64_encode($credentials)
	);
	$post_data = 'grant_type=client_credentials&scope=pay_api';
 */