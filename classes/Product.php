<?php
require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Model.php";

/**
 * Product class
 */

class Product extends Model
{

  private $product_id;
  private $product_name;
  private $product_description;
  private $product_unit_name;
  private $product_price;
  private $product_availability;


  function __construct($product_name='', $product_description='', $product_unit_name='', $product_price='', $product_availability='')
  {
    $this->setProductName($product_name);
    $this->setProductDescription($product_description);
    $this->setProductUnitName($product_unit_name);
    $this->setProductPrice($product_price);
    $this->setProductAvailability($product_availability);
  }


  // setters
  function setProductId($product_id)
  {
    $this->product_id = $product_id;
  }
  function setProductName($product_name)
  {
    $this->product_name = $product_name;
  }
  function setProductDescription($product_description)
  {
    $this->product_description = $product_description;
  }
  function setProductUnitName($product_unit_name)
  {
    $this->product_unit_name = $product_unit_name;
  }
  function setProductPrice($product_price)
  {
    $this->product_price = $product_price;
  }
  function setProductAvailability($product_availability)
  {
    $this->product_availability = $product_availability;
  }


  // getters
  function getProductId($product_id)
  {
    return $this->product_id;
  }
  function getProductName($product_name)
  {
    return $this->product_name;
  }
  function getProductDescription($product_description)
  {
    return $this->product_description;
  }
  function getProductUnitName($product_unit_name)
  {
    return $this->product_unit_name;
  }
  function getProductPrice($product_price)
  {
    return $this->product_price;
  }
  function getProductAvailability($product_availability)
  {
    return $this->product_availability;
  }


  function save()
  {
    parent::__construct();

    $stmt = $this->dbh->prepare(
      "INSERT INTO tbl_products SET
      product_name=:product_name,
      product_description=:product_description,
      product_unit_name=:product_unit_name,
      product_price=:product_price,
      product_availability=:product_availability
      "
    );
    $response = $stmt->execute([
      "product_name"=>$this->product_name,
      "product_description"=>$this->product_description,
      "product_unit_name"=>$this->product_unit_name,
      "product_price"=>$this->product_price,
      "product_availability"=>$this->product_availability,
    ]);

    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$this->dbh->lastInsertId()
      );
    }

  }


  function update()
  {
    parent::__construct();

    $stmt = $this->dbh->prepare(
      "UPDATE tbl_products SET
      product_name=:product_name,
      product_description=:product_description,
      product_unit_name=:product_unit_name,
      product_price=:product_price,
      product_availability=:product_availability
      WHERE product_id=:product_id
      "
    );
    $response = $stmt->execute([
      "product_name"=>$this->product_name,
      "product_description"=>$this->product_description,
      "product_unit_name"=>$this->product_unit_name,
      "product_price"=>$this->product_price,
      "product_availability"=>$this->product_availability,
      "product_id"=>$this->product_id
    ]);

    if ($response == false) {
      return array(
        "response"=>false,
        "responseData"=>$stmt->errorInfo()
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$this->dbh->lastInsertId()
      );
    }

  }



  function list()
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("SELECT * FROM tbl_products ORDER BY product_id DESC");
    $stmt->execute();
    $products = $stmt->fetchAll();

    // product images
    for ($i=0; $i < count($products); $i++) {
      $stmt = $this->dbh->prepare("SELECT * FROM tbl_files WHERE file_product_id=:product_id");
      $stmt->execute(["product_id"=>$products[$i]["product_id"]]);
      $images = $stmt->fetchAll();

      $products[$i]["product_images"] = $images;
    }

    if($this->is_logged_in){
      $status = 200;
    }else {
      $status = 401;
    }

    if ($products == false) {
      return array(
        "response"=>false,
        "status"=>$status,
        "responseData"=>[]
      );
    }else {
      return array(
        "response"=>true,
        "status"=>$status,
        "responseData"=>$products
      );
    }
  }

  function get($product_id)
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("SELECT tbl_products.* FROM tbl_products WHERE product_id=:product_id");
    $stmt->execute(["product_id"=>$product_id]);
    $product = $stmt->fetch();

    // product files
    $stmt = $this->dbh->prepare("SELECT tbl_files.* FROM tbl_files WHERE file_product_id=:file_product_id");
    $stmt->execute(["file_product_id"=>$product_id]);
    $product["product_files"] = $stmt->fetchAll();


    if ($product == false) {
      return array(
        "response"=>false,
        "responseData"=>[]
      );
    }else {
      return array(
        "response"=>true,
        "responseData"=>$product
      );
    }
  }


  function delete($product_id)
  {
    parent::__construct();

    $stmt = $this->dbh->prepare("DELETE FROM tbl_products WHERE product_id=:product_id");
    $response = $stmt->execute(["product_id"=>$product_id]);


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
