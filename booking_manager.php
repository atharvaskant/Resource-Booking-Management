<?php 
function approve_booking(){
require 'PHPMailer/PHPMailerAutoload.php';
include 'dbconfig.php';
//$allow=$_POST['allow'];
//$deny=$_POST['deny'];
session_start();

/*$crname=$_COOKIE['crname'];
//$cname=$_COOKIE['cname'];
$cdate=$_COOKIE['cdate'];
$cstime=$_COOKIE['cstime'];
$cetime=$_COOKIE['cetime'];

$cemail=$_COOKIE['email_id'];
$title=$_COOKIE['ctitle'];*/

$query="select * from booking";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$crname=$row['crname'];
$cdate=$row['cdate'];
$cstime=$row['cstime'];
$cetime=$row['cetime'];
$cemail=$row['email_id'];



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
$mail->addAddress($cemail);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional



if(isset($_POST['allow'])){

	$mail->Subject = 'REQUEST ACCEPTED';
	$mail->Body    = 'Your booking request for '.$crname.' on '.$cdate.' from '.$cstime.' to '.$cetime.' is approved.';
	$flag=1;

}
else if(isset($_POST['deny']))
	{
		
		$mail->Subject = 'REQUEST DENIED ';
		$mail->Body    = 'Your booking request for '.$crname.' on '.$cdate.' from '.$cstime.' to '.$cetime.' is rejected';
		$flag=0;
		
	}
	$dquery="truncate table booking";
	mysqli_query($con,$dquery);
	if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} 
	else {

    	echo 'Message has been sent';
    	
	}
	if($flag==1)
	{

		return true;
	}	
	else
	{
		return false;
	}


}

function book_resource($date,$time,$res)
{
	include 'notify.php';
	$stime=$_SESSION['qstime'];
	$etime=$_SESSION['qetime'];
	$start_time="09:00";
	$end_time="17:00";
	
if (strtotime($time)<strtotime($end_time) && strtotime($time)>strtotime($start_time)) {

	if(mysqli_num_rows($res)==0){
		//echo '<script type="text/javascript"> alert("Booking Request Mail Sent!!")</script>';
		return true;

	}

	else if( mysqli_num_rows($res)==1){ 
		if(strtotime($time)>=strtotime($stime) && strtotime($time)<strtotime($etime))
		{

			echo '<script type="text/javascript"> alert("Resource is unavailable Choose another date or time.")</script>';
			return false;

		}
	else 
		return true;
		}
	else if(mysqli_num_rows($res)>=2){

		$n=mysqli_num_rows($res);
		for($i=0;$i<$n;$i++)
		{
			$row=mysqli_fetch_assoc($res);
			$s_time=$row['Start_Time'];
			$e_time=$row['End_Time'];
			//echo $s_time,$e_time;
			if(strtotime($time)>=strtotime($s_time) && strtotime($time)<strtotime($e_time)){
				echo '<script type="text/javascript"> alert("Resource is unavailable! Choose another date or time.")</script>';
				return false;
			}
		}
		return true;
		//echo '<script type="text/javascript"> alert("Booking Request Mail Sent")</script>';
		}
	}
	else{
	echo '<script type="text/javascript"> alert("Resource is unavailable!! Choose another date or time.")</script>';
				return false;
	}


}
?>