<!DOCTYPE html>
<html>
<head>
  <title>HospexCare</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../js/deptcnt.js"></script>
     <script type="text/javascript" src="../js/servicecnt.js"></script>
     <script type="text/javascript" src="../js/usertype.js"></script>
    <script type="text/javascript">
      function getdocname()
      {
          if(document.getElementById("doctorname").style.display == "none")
            document.getElementById("doctorname").style.display = "block";
          else if(document.getElementById("doctorname").style.display == "block")
            document.getElementById("doctorname").style.display = "none";
      }
    </script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-4"><center><h3> Welcome 
       <?php 
         $email = $_POST["emailid"];
         if($email != "")
         {
            $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
            $query = 'SELECT fname from `HospexCareUserDB` where email = "'.$email.'"';
            $name = "";
            if ($result = $mysqli->query($query)) {
             while ($row = $result->fetch_assoc()) {
                $name .= $row["fname"];
             }
             $result->free();
            }
             echo $name;
         }
      ?>
       to HospexCare </h3>
       <h4>HospexCare - We help managing your medical profile</h4>
       <h5><center>Contact Info: 651 hospital street, xyz, Yzhj N9B HUI</center></h3>
       <h5><center>Phone: +9 226456</center></h3>
      </center>
     </div>
     <div class="col-md-8"><img src="../images/homeImage640.jpg" class="img-responsive" alt="Responsive image"></div>
    </div>
    <div class="row">
      <div class="col-md-4" id="noofdocs">
        <?php
          $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
          if ($mysqli->connect_errno) {
           printf("System Error: profile update error. We are experiencing some problems. Please try again later");
           exit();
          }
          $query  = "SELECT dept, COUNT(*) AS cnt FROM doctor GROUP BY dept";
          $result = $mysqli->query($query);
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
            <form>
             <input type="hidden" name="catVal" value="$row[0]">
             <input type="hidden" name="cntVal" value="$row[1]">
            </form>
_END;
          }
       ?>
      </div>
      <div class="col-md-4" id="service">
        <?php
          $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
          if ($mysqli->connect_errno) {
           printf("System Error: profile update error. We are experiencing some problems. Please try again later");
           exit();
          }
          $query  = "SELECT service, COUNT(*) AS cnt FROM doctor GROUP BY service";
          $result = $mysqli->query($query);
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
            <form>
             <input type="hidden" name="serviceVal" value="$row[0]">
             <input type="hidden" name="servicecntVal" value="$row[1]">
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
      <div class="col-md-4"><a href="addprofile.php"><center><button type="button" class="btn btn-info">Add Profile</button></center></a>
      </div>
      <div class="col-md-4"><a href="bookapp.php"><center><button type="button" class="btn btn-info">Book Appointment</button></center></a>
      </div>
      <div class="col-md-4">
      <p id="doctorname" style="display: none; text-align: center;">
        <?php 
         $email = $_POST["emailid"];
         if($email != "")
         {
            $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
            $query = 'SELECT docname from `patient_me_profile` where email = "'.$email.'"';
            $docname = "";
            if ($result = $mysqli->query($query)) {
          while ($row = $result->fetch_assoc()) {
             $docname .= $row["docname"];
          }
              $result->free();
            }
            echo $docname;
         }
      ?>
      </p>
      <center><button type="button" class="btn btn-info" onclick="getdocname()">My Doctor</button>
      </center>
      </div>    
    </div>
    </div>
  </div>
</body>
</html>