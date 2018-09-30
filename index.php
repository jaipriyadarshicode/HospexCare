<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel= "stylesheet" type="text/css" href="../css/hospexcarehome.css">
    <title>HospexCare</title>
    <script type="text/javascript">
      function open_view()
      {
	      var userType = "";
        var email = document.getElementById("inputEmail3").value;
        if(email != ""){
	        var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function()
          {
      	    if(this.readyState == 4 && this.status == 200)
      	    {
	             userType = this.responseText;
	             if(userType != "")
	             {
                 if(userType == "patient")
          	       document.getElementById("homepageform").action = "indexpatient.htm";
                 else if(userType == "admin")
          	       document.getElementById("homepageform").action = "indexhospadmin.htm";
	             }
	          }
          };
          xmlhttp.open("GET", "getinfo.php?email=" + email, true);
          xmlhttp.send();
        }
      }
   </script>
</head>
<body>
 <div class="container-fluid">
  <span class="heading">HospexCare</span>
  <span class="headingpoints">
  	<ul>
  		<li>Follow up your appointments</li>
  		<li>Track your patients</li>
  		<li>Follow up your appointments</li>
  		<li>Track your patients</li>
  		<li>Follow up your appointments</li>
  		<li>Track your patients</li>
  	</ul>
  </span>
  <form class="form-horizontal form" action="" method="POST" onsubmit="open_view()" id="homepageform">
  	<div class="form-group">
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Log in</button>
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
  </form>
  <img class="image-laptop" src="../images/homeImage1024.jpg">
 </div>
</body>
</html>