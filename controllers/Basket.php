<?php

if (isset($_POST["getBasketItems"])) {

  $data = json_decode($_POST["getBasketItems"],true);

    require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/Product.php";


    $basketItems = array();
    $subTotal = 0;
    for ($i=0; $i < count($data["basketItemIds"]); $i++) {

      $product = new Product();
      $productInformations = $product->get($data["basketItemIds"][$i]);
      array_push($basketItems, $productInformations["responseData"]);
      $product = null;
    }


    for ($b=0; $b < count($basketItems); $b++) {
      @$basketItems[$b]["row_total"] = $basketItems[$b]["product_price"] *  $data["basketItemPieces"][$b];
      @$basketItems[$b]["product_piece"] = $data["basketItemPieces"][$b];
      $subTotal += $basketItems[$b]["row_total"];
    }


    echo json_encode(array(
      "basket_items"=>$basketItems,
      "sub_total"=>$subTotal
    ));

}

?>
