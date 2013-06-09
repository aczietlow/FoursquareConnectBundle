<?php
use whatsup\users\authenticate\authenticate;
/**
 * This is a temp router file until we integrate this into Symfony, which of course has a bitchin router system.
 */
require_once('users/authenticate.php');

if(!empty($_GET['code'])) {
	$app = new authenticate($_GET['code']);
	$app->setUrl();
	$test = $app->saveAccessToken();
	echo $test;
}