<?php 

class Recaptcha {
	
	protected $site_key;
	protected $secret_key;


	public function __construct($keys_or_public,$private_or_null=null) {
		//Legacy support
		if(is_array($keys_or_public)) {
			$this->site_key = $keys_or_public['site_key'];
			$this->secret_key = $keys_or_public['secret_key'];	
		}
		else {
			$this->site_key = $keys_or_public;
			$this->secret_key = $private_or_null;
		}
		
	}
	
  	public function set() {
  		return isset($_REQUEST['g-recaptcha-response']);
  	}
	
	
	public function render() {
		//Create the html code
		$html = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
		$html .= '<div class="g-recaptcha" data-sitekey="'.$this->site_key.'"></div>';
		//return the html    
		return $html;
	}
	
	public function verify($response=null) {
		//Fetch response if not provided
		if(is_null($response)) {
			$response = $_REQUEST['g-recaptcha-response'];
		}
		
		//Get user ip
		$ip = $_SERVER['REMOTE_ADDR'];
		
		//Build up the url
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$full_url = $url.'?secret='.$this->secret_key.'&response='.$response.'&remoteip='.$ip;
	
		//Get the response back decode the json
		$data = json_decode(file_get_contents($full_url));
		
		//Return true or false, based on users input
		return ( isset($data->success) && $data->success == true );
	}
	
}
