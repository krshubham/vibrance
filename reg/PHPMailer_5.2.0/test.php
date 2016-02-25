<?php
require_once ("class.phpmailer.php");
  $Correo = new PHPMailer();
  $Correo->IsSMTP();
  $Correo->SMTPAuth = true;
  $Correo->SMTPSecure = "tls";
  $Correo->Host = "smtp.yahoo.com";
  $Correo->Port = 587;
  $Correo->Username = "vitvibrance@yahoo.com";
  $Correo->Password = "25nov1992";
  $Correo->SetFrom('vitvibrance@yahoo.com','De Yo');
  $Correo->FromName = "From";
  $Correo->AddAddress("pkpbhardwaj729@gmail.com");
  $Correo->Subject = "Prueba con PHPMailer";
  $Correo->Body = "<H3>Bienvenido! Esto Funciona!</H3>";
  $Correo->IsHTML (true);
  if (!$Correo->Send())
  {
    echo "Error: $Correo->ErrorInfo";
  }
  else
  {
    echo "Message Sent!";
  }
?>