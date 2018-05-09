
<?php 

  include ('dbconfig.php');
  session_start();
  $dept=$_SESSION['dept'];

?>

<html>
<head>
  <title>Booking Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 18px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
}

.button:hover {
    background-color: green;
}
</style>
<script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
      var dept = "<?php echo $dept ?>";
        switch (listindex)
        {
        case "departmental" :
          if (dept=="CSE")
          {
              document.getElementById("status").options[0]=new Option("Select","");
              document.getElementById("status").options[1]=new Option("Zone 1","czone1");
              document.getElementById("status").options[2]=new Option("Zone 3","czone3");
              document.getElementById("status").options[3]=new Option("Zone 5","czone5");
          }
          else if(dept=="IT")
          {
            document.getElementById("status").options[0]=new Option("Select","");
            document.getElementById("status").options[1]=new Option("Lab 1","clab1");
            document.getElementById("status").options[2]=new Option("Lab 2","clab2");
          }

            break;
        case "official" :
            document.getElementById("status").options[0]=new Option("Select","");
            document.getElementById("status").options[1]=new Option("Seminar Hall1","cseminarhall1");
            document.getElementById("status").options[2]=new Option("Seminar Hall2","cseminarhall2");
            document.getElementById("status").options[3]=new Option("Science Auditorium","cauditorium");
            break;
        }
        return true;
    }
    

    function check(){
      
      var x=document.getElementById("status");
      if(x.value===""){
        alert("Please select resource");
      }
      else{
        document.getElementById("form1").submit();
      }
    }



    </script> 

  
</head>
<body background="2.jpg">
<form action="bcalendar.php" method="POST" id="form1">
<center>

<table>
<tr>
<td><b>Resource Type:</b>
<div class="category_div" id="category_div">
        <select id="source" name="rsc_type" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="">Select</optiosn>
        <option value="departmental">Departmental</option>
        <option value="official">Official</option>
        </select>
    </div></td></tr></br>
  <tr><td>
    <div class="sub_category_div" id="sub_category_div"><b>Book Resource:</b>
        <script type="text/javascript" language="JavaScript">
        document.write('<select name="rsc_name" id="status"><option value="" id="status1">Select</option></select>')
        </script>
</tr></td>



</table>
<br><br>
 <buttons class="button" name="submit" onclick="javascript: check()"><span>Submit </span></button>
</center>
</form>


</body>

</html>
