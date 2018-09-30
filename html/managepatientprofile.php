<?php
  $fname = $_REQUEST['fname'];
  $lname = $_REQUEST['lname'];
  $email = $_REQUEST['email'];
  $DOB = $_REQUEST['DOB'];
  $age = $_REQUEST['age'];
  $fupd = $_REQUEST['FUPD'];
  if($fname != "" && $lname != "" && $email != "" && $DOB != "" && $age != "" && $fupd != "")
  {
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("System Error: profile update error. We are experiencing some problems. Please try again later");
        exit();
      }

     $query = "INSERT INTO patient_me_profile VALUES ('$email','$fname','$lname','$age','$DOB','$fupd')";
     $msg = "";
     if ($result = $mysqli->query($query))
            $msg .= "Profile created";
        $result->free();
     $mysqli->close();
  }
  echo $msg === "" ? $fupd : $msg;
?>