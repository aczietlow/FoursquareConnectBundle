<?php
use whatsup\users\authenticate\Authenticate;
use whatsup\users\profile\Profile;
/**
 * This is a temp router file until we integrate this into Symfony, which of course has a bitchin router system.
 */
require_once('users/authenticate.php');
require_once('users/profile.php');


if(!empty($_GET['code'])) {
	$app = new Authenticate($_GET['code']);
	$app->setUrl();
	$accessToken = $app->saveAccessToken();
}

$app = new Profile($accessToken);
$app->setUrl();
$app->request();
$response = $app->getResponse();

echo ('<pre>');
var_dump($response);
echo ('</pre>');