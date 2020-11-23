<?php



 if (isset($_POST["login"])) {

   $data = json_decode($_POST["login"],true);

   require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/classes/User.php";

   $user = new User($data["user_username"], $data["user_password"]);


   $response = $user->login();

   echo json_encode($response);

 }





?>
