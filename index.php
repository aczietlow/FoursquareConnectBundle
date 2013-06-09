<?php
require_once('config/appCredentials.php');

$url = '';

$url = 'https://foursquare.com/oauth2/authenticate?';
$url .= 'client_id=' . CLIENT_ID;
$url .= '&response_type=code';
// $url .= '&redirect_uri=http://4sq.hackaugusta.com/FoursquareConnect/users/authenticate.php';
$url .= '&redirect_uri=http://4sq.hackaugusta.com/FoursquareConnect/router.php';

?>

<h1>what's up foursquare App</h1>

<a href="<?php echo $url ?>">
  <img alt="Foursquare" src="https://playfoursquare.s3.amazonaws.com/press/logo/connect-blue.png">
  </a>
