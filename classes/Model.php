<?php
/**
 *
 */
require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Auth.php";

class Model extends Auth
{


  private $address = 'localhost';
  private $dbname = 'brosoftc_sonmezetgrup';
  private $username = 'admin';
  private $password = 'LPVNU737uxrf.';
  public $dbh;



  function __construct()
  {
    parent::__construct();
    
    try {
      $this->dbh = new PDO('mysql:host='.$this->address.';dbname='.$this->dbname.';charset=utf8', $this->username, $this->password,[PDO::MYSQL_ATTR_INIT_COMMAND =>"SET lc_time_names='tr_TR'"]);
    } catch (PDOException $e) {
      echo "Hata! :".$e->getMessage()."";
      die();
    }
  }
}


?>
