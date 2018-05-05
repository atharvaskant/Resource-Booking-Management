<?php
include("dbconfig.php");
session_start();
$resource=$_SESSION['rsc_name'];

    
if(isset($_POST['action']) or isset($_GET['view'])) //show all events
{
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
    elseif($_POST['action'] == "add") // add new event
    {
                  mysqli_query($con,"INSERT INTO $resource(
                        title ,
                        start ,
                        end 
                        )
                        VALUES (
                        '".mysqli_real_escape_string($con,$_POST["title"])."',
                        '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                        '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["end"])))."'
                        )");
            header('Content-Type: application/json');
            echo '{"id":"'.mysqli_insert_id($con).'"}';
            exit;
    }
}

?>