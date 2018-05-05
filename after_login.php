
<?php
session_start();
setcookie("email_id",$_SESSION['emailid'],time()+(86400*7),"/");


?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--<link rel="stylesheet" href="styles.css">-->

  <style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
}

.button:hover {
    background-color: green;
}
</style>
  
  
</head>
<body background="2.jpg">
</br>  </br>
<center><font color="green" size="24">Welcome Mr User</font></center> </br>  </br>   </br>  </br> </br>  </br>  </br>  </br>

<center><a href="bookingui.php"><button type="button" class="button" >Book Resource</button></a></center> </br> </br> </br> </br> </br> </br>  </br>

<center><button type="button" class="button" name="view_btn" onClick="location.href='vcal.php'" >View Resource</button></center>

</body>
</html>