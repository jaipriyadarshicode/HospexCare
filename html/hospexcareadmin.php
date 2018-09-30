<!DOCTYPE html>
<html>
<head>
	<title>HospexCare</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../js/numofbeds.js"></script>
    <script type="text/javascript" src="../js/typeofstaff.js"></script>
    <script type="text/javascript" src="../js/usertype.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-4"><h3><center>Welcome to HospexCare - Admin</center></h3></div>
     <div class="col-md-8"><img src="../images/homeImage640.jpg" class="img-responsive" alt="Responsive image"></div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-md-4" id="numofbeds">
        <?php
          $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
          if ($mysqli->connect_errno) {
           printf("System Error: profile update error. We are experiencing some problems. Please try again later");
           exit();
          }
          $query  = "SELECT type, COUNT(*) AS cnt FROM num_of_beds GROUP BY type";
          $result = $mysqli->query($query);
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
            <form>
             <input type="hidden" name="bedcatVal" value="$row[0]">
             <input type="hidden" name="bedcntVal" value="$row[1]">
            </form>
_END;
          }
       ?>
      </div>
      <div class="col-md-4" id="typeofstaff">
        <?php
          $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
          if ($mysqli->connect_errno) {
           printf("System Error: profile update error. We are experiencing some problems. Please try again later");
           exit();
          }
          $query  = "SELECT Type, COUNT(*) AS cnt FROM doctor GROUP BY Type";
          $result = $mysqli->query($query);
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
            <form>
             <input type="hidden" name="typeVal" value="$row[0]">
             <input type="hidden" name="typecntVal" value="$row[1]">
            </form>
_END;
          }
       ?>
      </div>
      <div class="col-md-4" id="noofpatients">
        <?php
          $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
          if ($mysqli->connect_errno) {
           printf("System Error: profile update error. We are experiencing some problems. Please try again later");
           exit();
          }
          $query  = "SELECT usertype, COUNT(*) AS cnt FROM HospexCareUserDB GROUP BY usertype";
          $result = $mysqli->query($query);
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
            <form>
             <input type="hidden" name="usertypeVal" value="$row[0]">
             <input type="hidden" name="usertypecntVal" value="$row[1]">
            </form>
_END;
          }
       ?>
      </div>       	
    </div>
    <div class="row">
      <div class="col-md-4"><center><a href="bookapp.php"><button type="button" class="btn btn-info">Book Appointment</button></center></a>
      </div>
      <div class="col-md-4">
      <a href="patientrecord.php"><center><button type="button" class="btn btn-info">Get Patients Record</button></center></a>
      </div> 
      <div class="col-md-4">
      <a href="patientapp.php"><center><button type="button" class="btn btn-info">Get All Appointments</button></center></a>
      </div>  	
    </div>
    </div>
  </div>
</body>
</html>