<?php 
   include("includes/config.php");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assets/js/index.js"></script>
</head>
<body>
	<!-- <?php
	  	
      if(isset($_POST['viewBooks'])){
      	 echo '<script>
	  $(document).ready(function(){

		    $("#mainDiv1").hide();
		    $("#mainDiv2").show();
		});
	</script>';
      }
      else
      {
      	echo '<script>
	  $(document).ready(function(){

		    $("#mainDiv1").show();
		    $("#mainDiv2").hide();
		});
	</script>';
}
	  ?> -->
   <div id="wrapper">	

	<div id="topMenu">
    <img id="logo" src="assets/images/newlogo.png"   height="85px" width="300px">   
       <button id="logout" type="submit"  onclick="window.location.href='register.php'" name="logout" >Logout</button>
       <button id="seller" type="submit"  onclick="window.location.href='seller.php'" name="seller" >Seller</button>
       <button id="buyer" type="submit"  onclick="window.location.href='index.php'" name="buyer" >Buyer</button>
	</div>	

	<div id="sideArea">
		<p class="category">
        <H1 id="searchhead">SEARCH BOOKS</H1>
    
          <div id="search">
      
        <p class="searchBooks">
      <form action ="search.php" method="POST">
        <input id="searchtxt" type="text" placeholder="Search" name ="search" ><br><br><br>
        <button id="btn" type ="submit" name="search_btn">Search</button>
      </form>
      </p><br>
    </div>
		<div id="buttonsDiv">
		    <p class="gotoBooks">
			    <button id="viewBooks" type="submit" name="viewBooks">View Books</button>
			</p><br>
			<p class="gotoInfo">
				<button id="viewCart" type="submit" onclick="window.location.href='cartpage.php'" name="viewCart">View Cart</button>
			</p>

		</div><br>
    <div id="pic">
        <img src="assets/images/sidebookst.png" height="300px" width="300px">
    </div>	
    </div>
    <div id="mainDiv1">
       	  <h1 class="pageHeading">Books you might like</h1>
       	   <div class="gridViewContainer">
       	   	 <?php 



               $booksQuery=mysqli_query($con,"SELECT * FROM books ORDER BY RAND() LIMIT 10");
               while($row=mysqli_fetch_array($booksQuery)){
               	 $img=$row['image'];
                 echo "<div class='gridViewItem'>
                   <a href='cartpage.php?id=".$row['id']."'>
                    <img class='thumbnail' src='assets/images/booksimages/$img' height=200 width=200/>
                    <div class='gridViewInfo'>" 
                    .$row['title']."<br><label>Price: </label>".$row['price'].
                    "</div>
                   </a>
               </div>";
               } 
                    
       	   	 ?> 

       	   </div>

     
    </div>

    
  
   
</body>
</html>
