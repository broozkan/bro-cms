<?php
/**
 *
 */
class Mail
{

  public $to;
  public $body;

  function __construct($to, $body)
  {
    $this->to = $to;
    $this->body = $body;

  }



  function send()
  {
    require($_SERVER["DOCUMENT_ROOT"]."/cms-admin/mail/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();                                   // send via SMTP
    $mail->Host     = "mail.brosoft.com.tr"; // SMTP servers
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "iletisim@brosoft.com.tr";  // SMTP username
    $mail->Password = "sfrSFR135"; // SMTP password
    $mail->Port     = 587;
    $mail->From     = "iletisim@brosoft.com.tr"; // smtp kullan�c� ad�n�z ile ayn� olmal�
    $mail->Fromname = "Online Siparis";
    $mail->AddAddress($this->to,"Sonmez Et Grup");
    $mail->Subject  =  "Sipariş";
    $mail->Body     =  $this->body;

    if(!$mail->Send())
    {
       return false;
       exit;
    }else {
      return true;
    }
  }
}


?>
