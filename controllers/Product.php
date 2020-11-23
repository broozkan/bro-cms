<?php



 if (isset($_POST["new"])) {

   $data = json_decode($_POST["new"],true);

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

   $product = new Product($data["product_name"], $data["product_description"], $data["product_unit_name"], $data["product_price"], $data["product_availability"]);


   $response = $product->save();

   echo json_encode($response);

 }

 if (isset($_POST["get"])) {

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

   $product = new Product();


   $response = $product->get($_POST["get"]);

   echo json_encode($response);

 }

 if (isset($_POST["update"])) {

   $data = json_decode($_POST["update"],true);

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

   $product = new Product($data["product_name"], $data["product_description"], $data["product_unit_name"], $data["product_price"], $data["product_availability"]);
   $product->setProductId($data["product_id"]);

   $response = $product->update();

   echo json_encode($response);

 }


 if (isset($_POST["delete"])) {

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

   $product = new Product();

   $response = $product->delete($_POST["delete"]);

   echo json_encode($response);

 }



 if (isset($_POST["list"])) {

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

   $product = new Product();

   $response = $product->list();

   echo json_encode($response);

 }




?>
