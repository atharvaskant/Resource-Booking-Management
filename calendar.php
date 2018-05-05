<?php

session_start();
$_SESSION['title']=$_POST['title'];
$_SESSION['start']=$_POST['start'];
$_SESSION['end']=$_POST['end'];

include 'notify.php';


notify();






?>