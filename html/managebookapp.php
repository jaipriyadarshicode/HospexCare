<?php
  $email = $_REQUEST['email'];
  $DOB = $_REQUEST['DOB'];
  if($email != "" && $DOB != "")
  {
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("System Error: profile update error. We are experiencing some problems. Please try again later");
        exit();
      }

     $query = "INSERT INTO bookapp VALUES ('$email','$DOB')";
     $msg = "";
     if ($result = $mysqli->query($query))
            $msg .= "Great! We have booked your appointment. Please arrive 15 mins earlier to the appointment time.";
        $result->free();
     $mysqli->close();
  }
  echo $msg === "" ? "System Error: Please try again" : $msg;
?>