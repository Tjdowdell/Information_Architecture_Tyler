<?php
$nameErr = $emailErr ="";
$error = false;
/*$name = $_POST["name"];
$email = $_POST["email"];*/
if($_SERVER["REQUEST_METHOD"] == "POST"){

	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		$error  = true;
	} else {
		$name = test_input($_POST["name"]);
			if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
				$nameErr = "Only Letters, numbers and white space allowed";
				$error  = true;
			}
	}
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$error = true;
	} else {
		$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$error = true;
			}
	}

if (!$error) {
include('connect.php');

$queryadd = "INSERT INTO `mailinglist`.`customers` (`Customer_ID`, `Name`, `Email`) VALUES (NULL, '$name', '$email');";

$updatedb = mysqli_query($con,$queryadd);

mysqli_close($con);

if ($updatedb) {
echo "You have added " . $name . " with email: " . $email . "to the database";
} else {
echo "Info not added to database";
}

}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Subscribe</title>
<link rel="shortcut icon" href="../images/icon.ico">
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
<link href="../css/navigation.css" rel="stylesheet" type="text/css">

<script type="text/javascript">

      var currentTime = new Date().getHours();
      if (0 <= currentTime&&currentTime < 6) {
       document.write("<link rel='stylesheet' href='../css/night.css' type='text/css'>");
      }
      if (6 <= currentTime&&currentTime <18) {
       document.write("<link rel='stylesheet' href='../css/mystyle.css' type='text/css'>");
      }
	  if (18 <= currentTime&&currentTime < 24) {
       document.write("<link rel='stylesheet' href='../css/night.css' type='text/css'>");
      }
</script>
<noscript><link href="../css/mystyle.css" rel="stylesheet"></noscript>

</head>
<body onload="LoadGmaps()" onunload="GUnload()">
	<div id="wrapper">
    <div id="headerwrapper">
   <div id="leftHeader">
    <img src="../images/logo_crop.jpg" alt="logo">
    </div>
	<div id="rightHeader">
    <img src="../images/logo_right.png" alt="logo">
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
		
        <h3>Subscribe to Our Mailing List</h3>
		<div id="login">
			<form name="htmlform" method="post" >
      <label>Name *</label>
   <br/>
      	<input  type="text" name="name" maxlength="50" size="40">
   <br/> <?php echo $nameErr; ?><br/>
     
      <label>Email *</label>
   <br/>
     	 <input  type="text" name="email" maxlength="80" size="40">
   <br/> <?php echo $emailErr; ?><br/>
     
      	<input type="submit" value=" Add to Mailing List " onclick="buttonAnimate()" class="" id="button" >
	</form>
</div>
       
		</div>
        
        <div id="sidebar">
        <a><img  class="displayed" src="../images/land.jpg" alt="New Start Grant" height="130" width="180"></a>

     <a><img class="displayed"  src="../images/house.jpg" alt="Home and land from 270000" height="130" width="180"></a>

        <a  href="https://greatstartgrant.osr.qld.gov.au/quick-calculate.php" target="_blank" ><img class="displayed"  src="../images/loan.jpg" alt="Loan Calculator" height="130" width="180"></a>
</div>
</div>


		<div id="footer"><p>&copy; AllStyle Homes  2015
			<a href="pages/privacy.html"><span class="footer">Copyright and Privacy</span></a></p></div>      		
		<script>
			function buttonAnimate() {
				document.getElementById("button").style.background = "green";
			}
			</script>
 	</body>  	
</html>