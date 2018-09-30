<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript">
      function addinfo()
      {
           var fname = document.getElementById("fname").value;
           var lname = document.getElementById("lname").value;
           var email = document.getElementById("Email").value;
           var age = document.getElementById("Age").value;
           var DOB = document.getElementById("DOB").value;
           var FUPD = document.getElementById("FollowUpDate").value;
           if(fname != "" && lname != "" && email != "" && age != "" && DOB != "" && FUPD != "")
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
              xmlhttp.open("GET", "managepatientprofile.php?fname=" + fname + "&lname=" + lname + "&email=" + email + "&age=" + age + "&DOB=" + DOB + "&FUPD=" + FUPD, true);
              xmlhttp.send();
            }
      }
    </script>
</head>
<body>
<form action="" method="POST" onsubmit="addinfo()">
  <div class="form-group">
    <label for="exampleInputfname">First name</label>
    <input type="text" class="form-control" id="fname" placeholder="First name">
  </div>
  <div class="form-group">
    <label for="exampleInputlname">Last name</label>
    <input type="text" class="form-control" id="lname" placeholder="Last name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="Email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputlname">Age</label>
    <input type="number" class="form-control" id="Age" placeholder="Age">
  </div>
   <div class="form-group">
    <label for="exampleInputlname">Date of birth</label>
    <input type="Date" class="form-control" id="DOB" placeholder="Date of birth">
  </div>
  <div class="form-group">
    <label for="exampleInputlname">Last Follow Up Date</label>
    <input type="Date" class="form-control" id="FollowUpDate" placeholder="Last Follow Up Date">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
</html>