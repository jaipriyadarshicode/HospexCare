<?php
  $fname = $_REQUEST['fname'];
  $lname = $_REQUEST['lname'];
  $email = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if($fname != "" && $lname != "" && $email != "" && $pass != "")
  {
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("System Error: Registrartion failed. We are experiencing some problems. Please try again later");
        exit();
      }

     $query = "INSERT INTO HospexCareUserDB VALUES ('$email', '$pass','$fname', '$lname','patient')";
     $msg = "";
     if ($result = $mysqli->query($query))
            $msg .= "Registration successful";
        $result->free();
     $mysqli->close();
  }
  echo $msg === "" ? "Registration Unsuccessfull" : $msg;
?>