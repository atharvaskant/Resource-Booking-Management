<?php
include 'dbconfig.php';
session_start();
$resource=$_SESSION['rsc_name'];

 if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($con,$_GET["start"]);
        $end = mysqli_real_escape_string($con,$_GET["end"]);
        
        $result = mysqli_query($con,"SELECT id, start ,end ,title FROM $resource where (date(start) >= '$start' AND date(start) <= '$end')");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;
    }

 ?>


