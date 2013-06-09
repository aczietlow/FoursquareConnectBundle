<?php
namespace whatsup\users\authenticate;

require_once('config/appCredentials.php');

//@TODO save user access token to db

class authenticate {
	public $response = '';
	public $url = '';
	public $code = '';
	public $accessToken = '';
	
	public function __construct($code) {
		$this->code = $code;
	}
	
	public function setUrl($redirect_uri = "http://4sq.hackaugusta.com/FoursquareConnect/users/authenticate.php") {
		$url = "https://foursquare.com/oauth2/access_token";
		$url .= "?client_id=" . CLIENT_ID;
		$url .= "&client_secret=" . CLIENT_SECRET;
		$url .= "&grant_type=authorization_code";
		$url .=	"&redirect_uri=" . $redirect_uri;
		$url .= "&code=" . $this->code;
		
		$this->url = $url;
	}
	
	protected function _requestAccessToken() {
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $this->url,
			CURLOPT_RETURNTRANSFER => TRUE,
		));
		$response = curl_exec($ch);
		curl_close($ch);
		
		$response = json_decode($response);
		
		return $response->access_token;
	}
	
	/**
	 * Save access Token to the database
	 */
	public function saveAccessToken() {
		$accessToken = $this->_requestAccessToken();
		return $accessToken;
	}
	
}