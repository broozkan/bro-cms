<?php

if (isset($_POST["new"])) {
  require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Mail.php";
  require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";

  $data = json_decode($_POST["new"], true);

    $body = "Ad Soyad : ".$data["name"];
    $body .= "<br>";
    $body .= "Telefon : ".$data["phone_number"];
    $body .= "<br>";
    $body .= "E-Posta : ".$data["email"];
    $body .= "<br>";
    $body .= "Not : ".$data["note"];
    $body .= "<br>";
    $body .= "<br>";
    for ($i=0; $i < count($data["basketItemIds"]); $i++) {
      $product = new Product();
      $productInformations = $product->get($data["basketItemIds"][$i]);
      $productInformations = $productInformations["responseData"];
      $body .= "Ürün : ".$productInformations["product_name"];
      $body .= "<br>";
      $body .= "Adet : ".$data["basketItemPieces"][$i];
      $body .= "<br>";
      $body .= "-------------------------------";
      $body .= "<br>";
    }


  $mail = new Mail("sonmezetsiparis@gmail.com", $body);
  $response = $mail->send();

  if ($response) {
    echo json_encode(array(
      "response"=>true,
      "responseData"=>"Başarılı"
    ));
  }else {
    echo json_encode(array(
      "response"=>false,
      "responseData"=>"Sipariş kaydedilirken bir sorun oluştu!"
    ));
  }
}

?>
