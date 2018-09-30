<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript">
      function bookapp()
      {
           var email = document.getElementById("Email").value;
           var DOB = document.getElementById("Date").value;
           if(email != "" && DOB != "")
           {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function()
              {
              if(this.readyState == 4 && this.status == 200)
              {
                var userType = this.responseText;
                console.log(userType);
              }
              };
              xmlhttp.open("GET", "bookapp.php?&email=" + email + "&DOB=" + DOB, true);
              xmlhttp.send();
            }
      }
    </script>
</head>
<body>
<form action="" method="POST" onsubmit="bookapp()">
  <div class="form-group">
    <label for="exampleInputlname">Pick a Appointment date</label>
    <input type="date" class="form-control" id="Date" placeholder="Date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="Email" placeholder="Email">
  </div>
  <button type="submit" class="btn btn-default">Book Appointment</button>
</form>
</body>
</html>