<?php
$fname;$lname;$email;$topic;$subject;$captcha
if(isset($_POST['fname'])){
    $lname=$_POST['fname'];
}
if(isset($_POST['lname'])){
    $fname=$_POST['lname'];
}
if(isset($_POST['email'])){
    $email=$_POST['email'];
}
if(isset($_POST['topic'])){
    $topic=$_POST['topic'];
}
if(isset($_POST['subject'])){
    $subject=$_POST['subject'];
}
if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
    echo'<h1>Sprawdź captcha</h1>';
    exit;
}
$secretKey = "6LenNrcUAAAAAE0kfbKeNDiCcMhUVZAli9ezU0m6";
$ip = $_SERVER]['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKey = json_decode($response,true);
if($responseKey["success"]){
    echo'<h1>Dzieki</h1>';
}
else{
    echo'<h1>spamer</h1>';
}
?>