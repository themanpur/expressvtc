<?php

$name = "";
$email = "";
$subject = "";
$message = "";

if(isset($_POST['name']))
    $name = $_POST['name'];
if(isset($_POST['email']))
    $email = $_POST['email'];
if(isset($_POST['subject']))
    $subject = $_POST['subject'];
if(isset($_POST['message']))
    $message = $_POST['message'];

$to = "gervaisjeudong@gmail0com";
$main_subject = "Message sur express-vtc.com";

$mail = "<p>Un nouveau Message sur www.express-vtc.com</p>";
$mail .= "<p>Nom: <strong>".$name."</strong></p>";
$mail .= "<p>Sujet: <strong>".$subject."</strong></p>";
$mail .= "<p>Adresse e-mail: <strong>".$email."</strong></p>";
$mail .= "<p>Contenu du message: </p>";
$mail .= "<p><strong>".$message."</strong></p>";


// $mail_header[] = "MIME-Version: 1.0";
// $mail_header[] = "Content-type: text/html; charset=iso-8859-1";
// $mail_header[] = 'To: <'.$to.'>';
// $mail_header[] = 'From: Express Doc Services <website@expressdocservices.com>';

$mail_header = array(
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=iso-8859-1',
    'From' => 'Express VTC <website@express-vtc.com>',
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion()
);

ini_set("SMTP","ssl://express-vtc.com");
ini_set("smtp_port","465");

// Please specify the return address to use
// ini_set('sendmail_from', 'contact@expressdocservices.com');
// $test = mail($to, $main_subject, $mail, implode("\r\n", $mail_header));

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