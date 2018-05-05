
<?php
session_start();
$_SESSION['rsc_name']=$_POST['rsc_name'];
setcookie("crsc_name",$_SESSION['rsc_name'],time()+(86400*7),"/");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calendar</title>




<link  href="css/bootstrap.min.css" rel="stylesheet" >
 

<link href="css/fullcalendar.css" rel="stylesheet" />
<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />

<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
 <script src="js/moment.min.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/bscripts.js"></script>

</head>

<body>


<!-- add calander in this div -->

<div class="container">
  <div class="row">
    <div id="calendar"></div>
  </div>
</div>
<!--  Modal  to Add Event -->
<div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data–dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking Request</h4>
      </div>
      <div class="modal-body">
        <div class="control-group">
          <label class="control-label" for="inputPatient">Event:</label>
          <div class="field desc">
            <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
          </div>
        </div>
        <input type="hidden" id="startTime"/>
        <input type="hidden" id="endTime"/>
        <div class="control-group">
          <label class="control-label" for="when">When:</label>
          <div class="controls controls-row" id="when" style="margin-top:5px;"> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data–dismiss="modal" aria–hidden="true">Cancel</button>
        <button type="submit" class="btn btn-primary" id="submitButton" name="send">Send</button>
      </div>
    </div>
  </div>
</div>
<!--  Modal to Event Details -->
<div id="calendarModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data–dismiss="modal">&times;</button>
        <h4 class="modal-title">Event Details</h4>
      </div>
      <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
      </div>
      <input type="hidden" id="eventID"/>
      <div class="modal-footer">
        <button class="btn" data–dismiss="modal" aria–hidden="true">Cancel</button>
        <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-->

</body>
</html>
