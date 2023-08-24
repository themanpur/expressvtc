<?php

$name = "";
$email = "";

if(isset($_POST['name']))
    $name = $_POST['name'];
if(isset($_POST['email']))
    $email = $_POST['email'];

$to = "expressvtc1@gmail.com";
$main_subject = "Abonnement depuis expressvtc.com";

$mail = "<p>Un nouvel abonnement sur www.expressvtc.com</p>";
$mail .= "<p>Nom: <strong>".$name."</strong></p>";
$mail .= "<p>Adresse e-mail: <strong>".$email."</strong></p>";

$mail_header = array(
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=iso-8859-1',
    'From' => 'Express Doc Services <website@expressvtc.com>',
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion()
);

ini_set("SMTP","ssl://expressvtc.com");
ini_set("smtp_port","465");


$test = mail($to, $main_subject, $mail, $mail_header);

header("Content-Type: application/json");

if($test){
    echo json_encode(array("code" => 200));
    exit();
}
else{
    echo json_encode(array("code" => 300));
    exit();
}

?>