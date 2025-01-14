<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8">
  <title>Home</title> 

  <!--Links-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/main.css" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/seedling-solid.svg"/>

  <!--Script  
  <script src="https://kit.fontawesome.com/91a4f97be8.js" crossorigin="anonymous"></script>
  <script>
    username = sessionStorage.getItem('username');
    sessionID = sessionStorage.getItem('sessID');
  </script>
  
  <!--Script 
  <script>
  	window.onload = function(){
  		SendCheckRequest();
  	}
  </script> 
  </script>
  <script>
    function HandleCheckResponse(response)
    {
      var res = response;
      var text = JSON.parse(res);
      
      if (text.output == "1")
      {
	console.log(text.message);
      }
      else{
        sessionStorage.removeItem('username');
        sessionStorage.removeItem('sessID');
      	alert(text.message);
        location.href = 'login.html';
      }
    }
    
    function SendCheckRequest()
    {
        var request = new XMLHttpRequest();
        
        request.open("POST","../testRabbitMQClient.php",true);
        request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        request.onreadystatechange = function ()
        {
            
            if ((this.readyState == 4)&&(this.status == 200))
            {
                HandleCheckResponse(this.responseText);
            }		
        }
        request.send("type=validate_session&username="+username+"&sessID="+sessionID);
    }
</script>
<script>
	function HandleLogoutResponse(response)
	{
	var res = response;
	var text = JSON.parse(res);
	if (text.output == "1")
	{
	sessionStorage.removeItem('username');
	sessionStorage.removeItem('sessID');
	alert(text.message);
	location.href = 'login.html';
	}
	}
	function SendLogoutRequest()
	{
	var request = new XMLHttpRequest();
	request.open("POST","../testRabbitMQClient.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange = function ()
	{
	    
	    if ((this.readyState == 4)&&(this.status == 200))
	    {
		HandleLogoutResponse(this.responseText);
	    }		
	}
	request.send("type=logout&sessID="+sessionID);
	}
</script>
-->
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-md navbar-light sticky-top shadow p-3 mb-5 bg-white rounde">
    <div class="container-fluid">
      <div class="logo" style="color:#7d9988">
        <h1>
          <i class="fas fa-seedling"></i>
          レシピ
        </h1>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.html">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="forum.html">Forum</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="whatsin.html">What's In My Fridge?</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="profile.html">Profile</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout.php"">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--end of nav-->

  <!--search bar-->
  
  <div class="container">
    <form class="form-inline" method="post" action="../php/searchBar.php">
      <input type="text" name="roll_no" class="form-control" placeholder="Search for Recipes">
      <button type="submit" name="save" class="btn btn-primary">Search</button>
    </form>
  </div>

  <!--Home Page Info-->

  <div class="row container-fluid card-deck">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">View Recipe</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">View Recipe</a>
        </div>
      </div>
    </div>
  </div>

</body>


<!--Footer-->
<footer class="text-center text-white sticky-bottom container-fluid footer" style="background-color: #7d9988;">
    <!-- Grid container -->
    <div class="container p-3">
    <!--common links and other infromation accessible from all pages-->
    <p> © Copyright 2021: Best IT490 Group</p>
  </div>
</footer>
</html>
