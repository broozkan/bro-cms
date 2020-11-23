<?php
/**
 *  Auth
 */
class Auth
{

  public $is_logged_in;

  function __construct()
  {
    @session_start();

    if (!isset($_SESSION["user"])) {
      $this->is_logged_in = false;
    }else {
      $this->is_logged_in = true;
    }
  }
}


?>
