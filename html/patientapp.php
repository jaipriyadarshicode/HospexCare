<?php
     $mysqli = new mysqli("localhost", "priyadaj_hc", "hospexcare123", "priyadaj_hc");
     if ($mysqli->connect_errno) {
        printf("System Error: profile update error. We are experiencing some problems. Please try again later");
        exit();
      }

     $query = "SELECT * FROM bookapp";
     $result = $mysqli->query($query);
echo <<<_END
    <html>
    <body>
    <table>
     <thead>
      <tr>
        <td>Email</td>
        <td>Appointment Date</td>
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