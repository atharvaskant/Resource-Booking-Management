<?php
function notify(){
require 'PHPMailer/PHPMailerAutoload.php';


if($_SESSION['rsc_name']=="czone5"){
	$rname="CSE LAB ZONE-5";
}
elseif ($_SESSION['rsc_name']=="clab2") {
	$rname="IT LAB-2";
}
elseif($_SESSION['rsc_name']=="cseminarhall1"){
	$rname="SEMINAR HALL-1";
}
$date=date_format(date_create($_SESSION['start']),"d/m/Y");
$stime=date_format(date_create($_SESSION['start']),"H:i");
$etime=date_format(date_create($_SESSION['end']),"H:i");
$title=$_SESSION['title'];
$name=$_SESSION['name'];
$type=$_SESSION['type'];


setcookie("crname",$rname,time()+(86400*7),"/");
setcookie("cname",$name,time()+(86400*7),"/");
setcookie("cstime",$stime,time()+(86400*7),"/");
setcookie("cetime",$etime,time()+(86400*7),"/");
setcookie("cdate",$date,time()+(86400*7),"/");
setcookie("ctitle",$title,time()+(86400*7),"/");
setcookie("cstart",$_SESSION['start'],time()+(86400*7),"/");
setcookie("cend",$_SESSION['end'],time()+(86400*7),"/");




$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cigol.designlab@gmail.com';                 // SMTP username
$mail->Password = 'cigoldev';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('cigol.designlab@gmail.com', 'CIGOL');
if($type=='departmental')
{
	$mail->addAddress($_SESSION['concerned']);     // Add a recipient
}
elseif ($type=='official') {
	$mail->addAddress($_SESSION['pconcerned']);
}
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'BOOKING REQUEST';
$mail->Body    = '<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<p>Booking request for '.$rname.' on '.$date.' from '.$stime.' to '.$etime.' for '.$title.' by '.$name.'</p>
<form action="http://localhost/designlab/approve.php" method="POST">
<input type="submit" class="button" name="allow" value="ALLOW">
<input type="submit" class="button" name="deny" value="DENY">

</form>

</body>
</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    
} 
else {
    echo 'Message has been sent';
    
}
}

?>