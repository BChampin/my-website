<?php
$ENV = parse_ini_file('.env');
if (!empty($_GET)) {
  if (isset($_GET['bookmarks'])) {
    echo '
    <a target="_blank" rel="noreferrer noopener" href="https://www.autotitre.com/fiche-technique/Renault/Clio/I/1.2_RL-RN-RT">Renault Clio</a>
    <a target="_blank" rel="noreferrer noopener" href="http://www.fnac.com/PC-Portable-Asus-ROG-G702VM-GC068T-Gaming-17-3/a10188758/w-4">Laptop</a>
    ';
  }
  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case 'mail':
        //Getting parameters
        $from = $_GET['address'];
        $from_name = $_GET['name'];
        $msg = $_GET['message'];
        $account=$ENV['MAIL_ACCOUNT'];
        $password=$ENV['MAIL_PASSWORD'];
        $to=$ENV['MAIL_TO'];

        //Mail creation
        require("phpmailer/class.phpmailer.php");
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

        if($mail->send()){ echo "Your email has been successfully sent ! Thanks for your feedback !"; }
        else{ echo "Oups, seems that a mistake happened !"; }

        break;

      default:
        // code...
        break;
    }
  }
}
else {
  return true;
}
