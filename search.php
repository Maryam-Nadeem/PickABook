<?php
 
 include("includes/config.php");

 if($con===false){
	die("Connection failed".mysqli_connect_error());
}
   //if(isset($_POST['search_btn'])){
   
	//$search=mysqli_real_escape_string($con,$_POST['search']);
	$sql="select * from books where title='harry potter' ";
	$result = mysqli_query($con,$sql);
	$queryResult = mysqli_num_rows($result);
	

	if($queryResult>0){
		while($row = mysqli_fetch_assoc($result))
		{
			$title= $row['title'];
			$image= $row['image'];
			$price= $row['price'];
			echo '<img src= "'.$image.'" style="width:20%;height:20%;padding:50px;">';
			echo $title;
			echo $price;
			/*echo '<html>';
			echo '<body>';			 
			echo '<img src= "'.$image.'" style="width:20%;height:20%;padding:50px;">';
			echo "<label>".$title."</label>";
			echo "<label>".$price."</label>";
			echo '</body>';
			echo '</html>';*/
		}
	//}
}?><?php 	

	
	

?>
