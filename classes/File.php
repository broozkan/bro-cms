<?php
require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Model.php";

/**
 * File class
 */

class File extends Model
{

  private $file_id;
  private $file_name;
  private $file_product_id;


  function __construct($file_name='', $file_product_id='')
  {
    $this->setFileName($file_name);
    $this->setFileProductId($file_product_id);
  }


  // setters
  function setFileName($file_name)
  {
    $this->file_name = $file_name;
  }
  function setFileProductId($file_product_id)
  {
    $this->file_product_id = $file_product_id;
  }


  // getters
  function getFileName($file_name)
  {
    return $this->file_name;
  }
  function getFileProductId($file_product_id)
  {
    return $this->file_product_id;
  }



  function save()
  {
    parent::__construct();

    $stmt = $this->dbh->prepare(
      "INSERT INTO tbl_files SET
      file_name=:file_name,
      file_product_id=:file_product_id
      "
    );
    $response = $stmt->execute([
      "file_name"=>$this->file_name,
      "file_product_id"=>$this->file_product_id
    ]);

    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>"Başarılı"
      );
    }

  }



  function list()
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("SELECT * FROM tbl_files");
    $stmt->execute();
    $files = $stmt->fetchAll();


    if ($files == false) {
      return array(
        "response"=>false,
        "responseData"=>[]
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$files
      );
    }
  }


  function delete($file_id)
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("DELETE FROM tbl_files WHERE file_id=:file_id");
    $response = $stmt->execute(["file_id"=>$file_id]);


    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$response
      );
    }
  }


  public function deleteOther($file_product_id='')
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("DELETE FROM tbl_files WHERE file_product_id=:file_product_id");
    $response = $stmt->execute(["file_product_id"=>$file_product_id]);


    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$response
      );
    }
  }


}


?>
