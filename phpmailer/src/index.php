<?php
include "../../admin/netting/connect.php";

use phpmailer\phpmailer\phpmailer;
use phpmailer\phpmailer\Exception;

require('../src/Exception.php');
require('../src/PHPMailer.php');
require('../src/SMTP.php');

if (
    isset($_POST['mailgonder'])
    && !empty($_POST['name'])
    && !empty($_POST['email'])
    && !empty($_POST['content'])
    && !empty($_POST['message'])
) {

    $ayarsorgu = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
    $ayarsorgu->execute(array(0));
    $ayarcek = $ayarsorgu->fetch(PDO::FETCH_ASSOC);

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet  = "UTF-8";
    $mail->Host     = $ayarcek['ayar_smtphost'];
    $mail->SMTPAuth = true;
    $mail->Username = $ayarcek['ayar_smtpuser'];
    $mail->Password = $ayarcek['ayar_smtppassword'];
    $mail->Port     = $ayarcek['ayar_smtpport'];
    $mail->From     = $ayarcek['ayar_smtpuser'];
    $mail->FromName = "MAIL TEST12345";
    $mail->addAddress("name55255@gmail.com", "Form Mail");
    $mail->Subject  = $_POST['content'];
    $mail->Body     = implode("   ", $_POST);


    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    //Bura get verib Elaqe sehifesinde bildiris qoyarsan
    header("Location:../../elaqe.php");
} elseif (
    isset($_POST['mesajgonder'])
    && !empty($_POST['name'])
    && !empty($_POST['email'])
    && !empty($_POST['content'])
    && !empty($_POST['message'])
) {


    $ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
    $ayarsor->execute(array(0));
    $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->CharSet = "UTF8";
    $mail->SMTPSecure = "tls";
    $mail->Host = $ayarcek['ayar_smtphost'];
    $mail->Username = $ayarcek['ayar_smtpuser'];
    $mail->Password = $ayarcek['ayar_smtppassword'];
    $mail->Port = $ayarcek['ayar_smtpport'];
    $mail->From = $ayarcek['ayar_smtpuser'];
    $mail->FromName = "Default Testov";
    $mail->addAddress("name55255@gamil.com","Form Mail");
    $mail->Subject = $_POST['content'];
    $mail->Body = implode(" ", $_POST);

    if (!$mail->send()) {

        echo "Mail Xəta baş verdi." . $mail->ErrorInfo;
    } else {

        echo "Mesaj Göndərildi.";
    }
    header("Location:../../anaseyfe");
} else {
    echo "Ağıllısanda İndi sen HALALDI";
}


/* 
use phpmailer\phpmailer\phpmailer;
use phpmailer\phpmailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';




    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug=1;
    $mail->SMTPSecure='tls';
    $mail->CharSet  = "SET NAMES UTF8";
    $mail->Host     = 'mail.google.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'name55255@gmail.com';
    $mail->Password = '1a1A2b2B3c3C';
    $mail->Port     =  587;
    $mail->From     = 'name55255@gmail.com';
    $mail->FromName = "Empty";
    $mail->addAddress("name55255@gmail.com","Form Mail");
    $mail->Subject  = $_POST['content'];
    $mail->Body     = implode("   ",$_POST);

    $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}
 */
