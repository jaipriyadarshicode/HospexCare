<?php
  $email = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if($email != "")
  {
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("Connection to HospexCare database failed");
        exit();
      }

     $query = 'SELECT usertype from `HospexCareUserDB` where email = "'.$email.'" and password = "'.$pass.'"';
     $msg = "";
     if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $msg .= $row["usertype"];
        }
        $result->free();
     }
     $mysqli->close();
  }
  echo $msg === "" ? "Login Unsuccessfull" : $msg;
?>