<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require '../mailer/PHPMailer.php';
    require '../mailer/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    //$mail->SMTPDebug = 3;

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username='tweet.easinalif@gmail.com';
    $mail->Password='frkrvrvkeczpzofj';
    $mail->SMTPSecure='tls';
    $mail->Port=587;
    $mail->setFrom('tweet.easinalif@gmail.com','ArafatCVwebsite');
    $mail->addAddress('tweet.easinalif@gmail.com');
    $mail->addReplyTo('tweet.easinalif@gmail.com');
    $mail->isHTML(true);
    $mail->WordWrap = 50;
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'].'<br>Sender Name: '.$_POST['name'].'<br> Sender Mail: '.$_POST['email'];


    if($mail->send())
    {
        $error = 'Thank You for Contacting...';
        header('location:../index.html',3);
    }

    else
    {
        $error = 'Some Error Occured! Please Try again.';
    }

    $name = '';
    $email = '';
    $subject = '';
    $message = '';
}

?>