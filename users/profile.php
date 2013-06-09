<?php 
namespace whatsup\users\profile;

use whatsup\users\user\User;
require_once('config/appCredentials.php');
require_once('users/User.php');

class Profile extends User {
	public $response;
	public $url;
	protected $accessToken;
	
	public function __construct($accessToken) {
		$this->accessToken = $accessToken;
	}
	
	public function setUrl() {
		parent::setUrl();
		
		$url = $this->baseApiUrl . "/self";
		$url .= "?client_id=" . CLIENT_ID;
		$url .= "&client_secret=" . CLIENT_SECRET;
		$url .= "&v=" .$this->_getDate();
		$url .= "&oauth_token=" . $this->accessToken;
		
		$this->url = $url;
	}
	
	public function getUrl() {
		return $this->url;
	}
	
	public function request() {
		$ch = curl_init();
		curl_setopt_array($ch, array(
		CURLOPT_URL => $this->url,
		CURLOPT_RETURNTRANSFER => TRUE,
		));
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	public function getResponse() {
		$response = $this->request();
		$response = json_decode($response);
		$this->response = $response;
		return $response;
	}
	
	protected function _getDate() {
		$date = date('Ymd');
		return $date;
	} 
}
