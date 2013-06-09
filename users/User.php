<?php 
namespace whatsup\users\user;

class User {
	public $response = '';
	public $url = '';
	public $baseApiUrl = '';
	protected $accessToken = '';
	
	public function setUrl() {
		$this->baseApiUrl = 'https://api.foursquare.com/v2/users';
// 		$this->options(array(
// 				'client_id' => CLIENT_ID,
// 				'client_secret' => CLIENT_SECRET,
// 				'v' => $this->getDate(),
// 				));
	}
}
