<?php
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("System Error: profile update error. We are experiencing some problems. Please try again later");
        exit();
      }

     $query = "SELECT * FROM patient_me_profile";
     $result = $mysqli->query($query);
echo <<<_END
    <html>
    <body>
    <table>
     <thead>
      <tr>
        <td>Email</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Age</td>
        <td>Date of Birth</td>
        <td>Follow up date</td>
        <td>Doctor's Name</td>
      </tr>
    </thead>
_END;
    $rows = $result -> num_rows;
    for ($j = 0 ; $j < $rows ; ++$j)
    { 
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
   <tr>
      <td> $row[0] </td>
      <td> $row[1] </td>
      <td> $row[2] </td>
      <td> $row[3] </td>
      <td> $row[4] </td>
      <td> $row[5] </td>
      <td> $row[6] </td>
   </tr>
_END;
  }
echo <<<_END
    </table>
    </body>
    </html>      
_END;
  $result->free();
  $mysqli->close();
?>