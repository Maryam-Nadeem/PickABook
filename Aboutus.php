<?php 

 include("includes/config.php");

 if($con===false){
	die("Connection failed".mysqli_connect_error());
}
?>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="assets/css/Aboutus.css">
</head>
<body>
	

             <div id="navbar2">

             <img id="logo" src="assets\images\newlogo.png" height="85px" width="300px">	
				<a href="register.php">Home</a>
               <a href="Aboutus.php">About Us</a>
            
			</div>
			<div id="backheading">
      <h1 style="color:#7b3535; font-weight: bold; text-align: center;">About Us</h1>
</div>



<div class="container">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="assets\images\maryam.jpg" alt="Avatar" style="width:230px;height:230px; border-radius: 200px;">
    </div>
    <div class="flip-card-back">
    	<br><br>
      <h2>Maryam nadeem</h2> 
      <p>Co-Founder, PICK-A-BOOK</p> 
      <p>BE(SOFTWARE), NEDUET</p>
    </div>
  </div>
</div>

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img  src="assets\images\kajol2.jpg" alt="Avatar" style="width:230px; height:230px;  border-radius: 200px;">
    </div>
    <div class="flip-card-back">
    	<br><br>
      <h2>Kajol</h2> 
      <p>Co-Founder, PICK-A-BOOK</p> 
      <p>BE(SOFTWARE), NEDUET</p>
    </div>
  </div>
</div>
</div>
<div id="about">
	<br><br>
	<p><h3 style="color:#7b3535; font-weight: bold;">Welcome to Online PICK-A-BOOK Bookstore</h3></p>
	<p style="color:#7b3535;">Online PICK-A-BOOK provides best solution to buy or sell books online in Pakistan at single click.<br> Online PICK-A-BOOK provides facility to pay cash on delivery, only pay once books is in your hands.<br> Free Cash on Delivery services available. Online PICK-A-BOOK deals with both  original and <br>used books with competitive rates. So, what are you waiting for ? </p>
	<P><h4 style="color:#7b3535; font-weight: bold;">Start shopping NOW !</h4></P>

	</div>

</body>
</html>
