<?php

function update_calendar(){
	include 'dbconfig.php';
	$title=$_COOKIE['ctitle'];
	$start=$_COOKIE['cstart'];
	$end=$_COOKIE['cend'];
	$resource=$_COOKIE['crsc_name'];


                  mysqli_query($con,"INSERT INTO $resource(
                        title ,
                        start ,
                        end 
                        )
                        VALUES (
                        '".mysqli_real_escape_string($con,$title)."',
                        '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($start)))."',
                        '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($end)))."'
                        )");
            header('Content-Type: application/json');
            echo '{"id":"'.mysqli_insert_id($con).'"}';
            exit;
    }

?>