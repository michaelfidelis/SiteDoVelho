<?php
// Check for empty fields
if(empty($_POST['nome'])    ||
   empty($_POST['email']) 	||
   empty($_POST['telefone'])||
   empty($_POST['pedido'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    header("location:../emailNaoEnviado.html");

	return false;
   }

$name = $_POST['nome'];
$email_address = $_POST['email'];
$phone = $_POST['telefone'];
$message = $_POST['pedido'];

$to = $email_address;
$email_subject = "Contato do site |CSFidelis";
$email_body = "Sr(a). $name entrou em contato com você pelo site.\n\n"."Descrição:\n\nNome: $name\n\nEmail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";
$headers = "From: mclexr@gmail.com\n";
$headers .= "Reply-To: mclexr@gmail.com";
mail($to,$email_subject,$email_body,$headers);
header("location:../emailEnviado.html");
return true;
?>
