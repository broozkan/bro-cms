<?php

if (isset($_POST)) {

    require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/File.php";



    for ($i=0; $i < count($_FILES["product_images"]["name"]); $i++) {

      $file = new File();
      $file->deleteOther($_POST["product"]);
      $file = null;

      $file = $_SERVER["DOCUMENT_ROOT"].'/cms-admin/img/products/'.basename($_FILES['product_images']['name'][$i]);

      if (move_uploaded_file($_FILES['product_images']['tmp_name'][$i], $file)) {
        $response = true;
        $responseData = '';
      }else {
        $response = false;
        $responseData = 'Dosya(lar) yüklenemedi';
      }

      if ($response) {
        $file = new File($_FILES['product_images']['name'][$i], $_POST["product"]);

        $response = $file->save();
      }
    }


    echo json_encode(array(
      "response"=>$response,
      "responseData"=>$responseData
    ));

}

?>
