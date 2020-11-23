<?php
require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Model.php";

/**
* User class
*/

class User extends Model
{

  private $user_id;
  private $user_username;
  private $user_password;


  function __construct($user_username='', $user_password='')
  {
    $this->setUserUsername($user_username);
    $this->setUserPassword($user_password);
  }


  // setters
  function setUserId($user_id)
  {
    $this->user_id = $user_id;
  }
  function setUserUsername($user_username)
  {
    $this->user_username = $user_username;
  }
  function setUserPassword($user_password)
  {
    $this->user_password = $user_password;
  }



  // getters
  function getUserId($user_id)
  {
    return $this->user_id;
  }
  function getUserUsername($user_username)
  {
    return $this->user_username;
  }
  function getUserPassword($user_password)
  {
    return $this->user_password;
  }



  function login()
  {
    parent::__construct();


    $stmt = $this->dbh->prepare("SELECT * FROM tbl_users WHERE user_username=:user_username AND user_password=:user_password");
    $stmt->execute([
      "user_username"=>$this->user_username,
      "user_password"=>$this->user_password
    ]);
    $response = $stmt->fetch();

    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {

      $_SESSION["user"] = $response;

      return array(
        "response"=>true,
        "responseData"=>$response
      );
    }

  }


  function logout()
  {
    session_destroy();
  }


}


?>
