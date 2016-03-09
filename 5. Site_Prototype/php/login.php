<?php
$message = "<p></p>";
$name = $password = "";
session_start();
if (!isset($_SESSION['deleted'])){
$_SESSION['deleted'] = "<p></p>";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = test_input($_POST['name']);
	$password = md5($_POST['password']);
	
	include('connect.php');
	
	$query = "SELECT * FROM `users` WHERE `username` = '$name' and `password` = '$password';";
	$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result)==1) {
		
		$_SESSION['name']='loggedIn';
		
	}
	
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>


<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="shortcut icon" href="../images/icon.ico">
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
<link href="../css/navigation.css" rel="stylesheet" type="text/css">
<link href="../css/animate.css" rel="stylesheet" type="text/css">

</head>
<body>
<a href = "logout.php" class = "btn btn-danger" style = "position: absolute; top: 5px; right: 5px"> Logout </a>
	<div id="wrapper">
    <div id="headerwrapper">
	<div id="leftHeader">
    <img src="../images/logo_crop.jpg" alt="logo" width="100%" height="100%">
    </div>
	<div id="rightHeader">
    <img src="../images/logo_right.png" alt="logo" width="100%" height="100%">
    </div>
    </div>
		
			<div id="navbar">
<label for="show-menu" class="show-menu">Show Menu</label>
<input type="checkbox" id="show-menu">
   <ul id="menu">
	<li><a href="../index.html">Home</a></li>
   	<li><a href="../pages/about.html">About Us &#65516;</a>
        <ul class="hidden">
		<li><a href="../php/contacts.php">Contact Us</a></li>
		<li><a href="../pages/faq.html">FAQ</a></li>
        </ul></li>
		<li><a href="../pages/designs.html">Designs &#65516;</a>
		<ul class="hidden">
		<li><a href="../pages/appliances.html">Appliances</a></li>
		<li><a href="../pages/fitouts.html">Fit Outs</a></li>
        <li> <a href="../pages/additionals.html">Additionals</a></li>
		</ul></li>
		<li><a href="../pages/processes.html">Our Processes </a></li>
	<li><a href="../pages/testimonials.html">Testimonials</a></li>
	<li><a href="../php/login.php">Login &#65516;</a>
    <ul class="hidden">
    <li><a href="../php/subscribe.php">Subscribe</a></li>
  		</ul></li>
        </ul>
</div>
		<div id="mainContent">
        <h3>Welcome to AllStyle Homes - Login</h3>
        <div id="login">
	<form name="htmlform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label>Username</label>
   <br/>
      	<input  type="text" name="name" maxlength="50" size="40">
   <br/> <br/>
      <label>Password</label>
   <br/>
      	<input  type="password" name="password" maxlength="50" size="40">
   <br/> <br/>
     
      	<input type="submit" value=" Log In " onclick="buttonAnimate()"class="" id="button">
	</form>
	<br/>
	<form action="../php/removeFromDB.php" method="post">
	<?php 
		if (isset($_SESSION['name'])) {
			echo "<h3>Remove Customer From Database</h3>
		<label>Email</label>
		<br/>
		<input type='text' name='email' placeholder='Enter Email'>
		<br/> <br/>
		<input type='submit' value=' Remove from database '>
		<br/>";
		}
		echo $_SESSION['deleted'];
		?>
		
		
	</form>
    </div>

	<?php
	if (isset($_SESSION['name'])){
	
	echo "<table class='email-table'>
		<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>";
		
		$query = "SELECT * FROM `customers`";
		include('connect.php');
		$result = mysqli_query($con, $query);
		
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr> <td>" . $row['Name'] . "</td>";
			echo "<td>" . $row ['Email'] . "</td></tr>";
		}
		
		echo "</tbody>
		</table>";
		
	}
	
	?>
	
			</div>
        
        <div id="sidebar">
        <a><img  class="displayed" src="../images/land.jpg" alt="New Start Grant" height="130" width="180"></a>

     <a><img class="displayed"  src="../images/house.jpg" alt="Home and land from 270000" height="130" width="180"></a>

        <a  href="https://greatstartgrant.osr.qld.gov.au/quick-calculate.php" target="_blank" ><img class="displayed"  src="../images/loan.jpg" alt="Loan Calculator" height="130" width="180"></a>
        </div>
        
		
        
		<div id="footer"><p>&copy; AllStyle Homes  2015
			<a href="pages/privacy.html"><span class="footer">Copyright and Privacy</span></a></p></div>
            </div>
		
			<script>
			function buttonAnimate() {
				document.getElementById("button").style.background = "green";
			}
			</script>
			
	</body>
</html>
