<?php

  if($_POST["veriler"]){
    $veriler = json_decode($_POST["veriler"],true);
    $isim = $veriler["isim"];
    $mail = $veriler["mail"];
    $telefon = $veriler["telefon"];
    $kisiSayi = $veriler["kisiSayi"];
    $tarih = $veriler["tarih"];
    $saat = $veriler["saat"];
    $mesaj = $veriler["mesaj"];
    $mailSon = str_replace(".","/",$mail);

    require("class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();                                   // send via SMTP
    $mail->Host     = "mail.aksukafe.com"; // SMTP servers
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "info@aksukafe.com";  // SMTP username
    $mail->Password = "sfrSFR135"; // SMTP password
    $mail->Port     = 587;
    $mail->From     = "info@aksukafe.com"; // smtp kullan�c� ad�n�z ile ayn� olmal�
    $mail->Fromname = "Aksu Kafe";
    $mail->AddAddress("info@aksukafe.com","Aksu Kafe");
    $mail->Subject  =  "Rezervasyon";
    $mail->Body     =  "İsim : " .$isim. "
    Telefon : " .$telefon. "
    E-posta : " .$mailSon. "
    Kişi Sayı : " .$kisiSayi. "
    Tarih : " .$tarih. "
    Saat : " .$saat. "
    Mesaj : " .$mesaj. "
    ";

    if(!$mail->Send())
    {
       echo "0";
       exit;
    }

    echo true;


  }
  if($_POST["verilerIletisim"]){
    $verilerIletisim = json_decode($_POST["verilerIletisim"],true);
    $isim = $verilerIletisim["isim"];
    $email = $verilerIletisim["email"];
    $telefon = $verilerIletisim["telefon"];
    $mesaj = $verilerIletisim["mesaj"];
    $mailSon = str_replace(".","/",$email);
    require("class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();                                   // send via SMTP
    $mail->Host     = "mail.aksukafe.com"; // SMTP servers
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "info@aksukafe.com";  // SMTP username
    $mail->Password = "sfrSFR135"; // SMTP password
    $mail->Port     = 587;
    $mail->From     = "info@aksukafe.com"; // smtp kullan�c� ad�n�z ile ayn� olmal�
    $mail->Fromname = "Aksu Kafe";
    $mail->AddAddress("info@aksukafe.com","Aksu Kafe");
    $mail->Subject  =  "İletişim";
    $mail->Body     =  "İsim : ".$isim."
    E-mail : ".$mailSon."
    Telefon : ". $telefon."
    Mesaj : ".$mesaj."
    aksukafe.com sitesinden gönderildi";

    if(!$mail->Send())
    {
       echo "0";
    }

    echo true;


  }
?>
