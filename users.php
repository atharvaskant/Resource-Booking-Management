<?php 
session_start();
include ('dbconfig.php');

	//check if user exists
    $email=mysql_real_escape_string($_POST['uname']);
    $password=mysql_real_escape_string($_POST['psw']);

    $query="select * from users where Email_ID='$email' AND Password='$password'";
    $result=mysqli_query($con,$query);

    // Extracting all details of user
    $nquery="select * from users where Email_ID='$email'";
    $res=mysqli_query($con,$nquery);
    $row=mysqli_fetch_assoc($res);
    $_SESSION['emailid']=$_POST['uname'];
    $_SESSION['name']=$row['Name'];
    $desg=$_SESSION['desg']=$row['Designation'];
    $dept=$_SESSION['dept']=$row['Department'];

    $sql="select * from users where Department='$dept' AND Designation='HOD'";
    $r=mysqli_query($con,$sql);
    $row1=mysqli_fetch_assoc($r);
    $_SESSION['concerned']=$row1['Email_ID'];


    $psql="select * from users where Designation='Principal'";
    $pr=mysqli_query($con,$psql);
    $prow=mysqli_fetch_assoc($pr);
    $_SESSION['pconcerned']=$prow['Email_ID'];




?>