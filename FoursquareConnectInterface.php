<?php

namespace whatsup\FoursquareConnectInterface;

/**
 * Provides base functions and attributes for most other classes
 * that we're going to implement
 *
 * @package WhatsUp
 * @author Ryan & Reese
 **/
interface FourSquareConnectInterface
{

  public function setURL($task);

  public function request($options);

  public function setResponse($response);

} // END interface FourSquareConnect