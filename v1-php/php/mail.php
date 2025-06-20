<?php
  if(empty($_POST['action'])){
    $nom=$_POST['nom'];
    $telephone=$_POST['telephone'];
    $mail=$_POST['mail'];
    $message=$_POST['message'];
    $sujet=$_POST['sujet'];
    $mailreception = 'carbone.cube@gmail.com';
    echo "Nom : $nom<br>teléphone : $telephone<br>mail : $mail<br>sujet : $sujet<br>message : $message<br>mail reception : $mailreception";

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailreception)) // On filtre les serveurs qui rencontrent des bogues.
    {
      $passage_ligne = "\r\n";
    }
    else
    {
      $passage_ligne = "\n";
    }

    $header = "From: \"WeaponsB\"".$mail.$passage_ligne;
    $header.= "Reply-to: \"WeaponsB\" <test@gmail.com>".$passage_ligne;

    //=====Envoi de l'e-mail.*/
    if(mail($mailreception,$sujet,$message)){
    echo "</br>message envoyé";
    }
    else
    {
      echo "</br>erreur";
    }
  }


?>
