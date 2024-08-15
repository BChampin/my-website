<?php

function Homepage()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Homepage.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Projects()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Projects.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Skills()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Skills.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Contact()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Contact.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Legals()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Legals.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Bookmarks()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Bookmarks.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function Video()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Video.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function ajax_Homepage()
{
  require(view.'Homepage.php');
}

function ajax_Projects()
{
  require(view.'Projects.php');
}

function ajax_Skills()
{
  require(view.'Skills.php');
}

function ajax_Contact()
{
  require(view.'Contact.php');
}

function ajax_Legals()
{
  require(view.'Legals.php');
}

function Error()
{
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');
  require(view.'Error.php');
  require(template.'close_general_div.php');
  require(template.'footer.php');
}

function envoi_mail()
{
  //Getting parameters
  $from = $_POST['email'];
  $from_name = $_POST['name'];
  $msg = $_POST['message'];
  $subject = $_POST['subject'].' - '.$from;

  require(config.'Credentials.php');

  //Mail creation
  require(core."phpmailer/class.phpmailer.php");
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->CharSet = 'UTF-8';
  $mail->Host = "smtp.office365.com";
  $mail->SMTPAuth= true;
  $mail->Port = 587;
  $mail->Username= $account;
  $mail->Password= $password;
  $mail->SMTPSecure = 'tls';
  $mail->From = $account;
  $mail->FromName= $account;
  $mail->AddReplyTo($from, $from_name);
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->addAddress($to);

  //Result
  require(template.'header.php');
  require(js.'ajax.js');
  require(template.'open_general_div.php');

  if($mail->send()){
    echo "Votre email a bien été envoyé ! Merci de votre retour !";
    echo "<br/><br/>";
    echo "Your email has been successfully sent ! Thanks for your feedback !";
  }else{
    echo "Oups, il semble qu'il y ait eu une erreur !";
    echo "<br/><br/>";
    echo "Oups, seems that a mistake happened !";
  }

  require(template.'close_general_div.php');
  require(template.'footer.php');

}
