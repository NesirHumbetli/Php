<?php

include "../../admin/netting/connect.php";

use phpmailer\phpmailer\phpmailer;
use phpmailer\phpmailer\Exception;

require("../src/PHPMailer.php");
require("../src/Exception.php");
require("../src/SMTP.php");



if (isset($_POST['mesajgonder']) 
    && !empty($_POST['name'])
    && !empty($_POST['email'])
    && !empty($_POST['content'])
    && !empty($_POST['message'])) {
    
    $ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
    $ayarsor->execute(array(0));
    $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->CharSet = "SET NAMES UTF8";
    $mail->SMTPSecure = "tls";
    $mail->Host = $ayarcek['ayar_smtphost'];
    $mail->Username = $ayarcek['ayar_smtpuser'];
    $mail->Password = $ayarcek['ayar_smtppassword'];
    $mail->Port = $ayarcek['ayar_smtpport'];
    $mail->From = $ayarcek['ayar_smtpuser'];
    $mail->FromName = "Default Testov";
    $mail->addAddress("name55255@gamil.com,Form Mail");
    $mail->Subject = $_POST['content'];
    $mail->Body = implode(" ", $_POST);

    if (!$mail->send()) {

        echo "Mail Xəta baş verdi." . $mail->ErrorInfo;
    }else {

        echo "Mesaj Göndərildi.";
    }

    header("Location:../../anaseyfe");
}else {

    echo "Ağıllısanda İndi sen HALALDI";
}
