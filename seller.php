<?php
 include("includes/config.php");
if (isset($_POST['submit'])) {


$title= $_POST['title'];
$author= $_POST['author'];
$publisher= $_POST['publisher'];
$category= $_POST['category'];
$price= $_POST['price'];
$desc= $_POST['description'];
$image= $_POST['image'];




    $sqlinsert = "INSERT INTO books (title,author,publisher,category,price,image,description) VALUES ('$title','$author' ,'$publisher','$category','$price','$image','$desc')";
$sql_run=mysqli_query($con, $sqlinsert);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Seller page</title>
	<link rel="stylesheet" type="text/css" href="assets/css/seller.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assets/js/seller.js"></script>
</head>
<body>
	<?php
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
	  ?>
<div id="wrapper">	

	<div id="topMenu">
		<img id="logo" src="assets/images/newlogo.png"   height="100px" width="200px">
       <button id="logout" type="submit" onclick="window.location.href='register.php'" name="logout">Logout</button>
       <button id="seller" type="submit"  onclick="window.location.href='seller.php'" name="seller" >Seller</button>
       <button id="buyer" type="submit"  onclick="window.location.href='index.php'" name="buyer" >Buyer</button>
	</div>	

	<div id="sideArea">
		<div id="buttonsDiv">
		    <p class="gotoBooks">
			    <button id="viewBooks" type="submit" name="viewBooks">My books</button>
			</p><br><br>
			<p class="gotoInfo">
				<button id="bookInfo" type="submit" name="bookInfo">Add Book</button>
			</p><br><br>
		</div>	
		<div id="pic">
        <img src="assets/images/sidebookst.png" height="300px" width="300px">
    </div>
    </div>
	<div id="mainDiv1">
		<form id='bookDetails' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
			<h1 id="bookhead">Enter Book Details</h1>
				<p>
						<label for="title">Book Name : </label>
						<input id="title" name="title" type="text"  required >
				</p>
				<p>
						<label for="author">Author Name : </label>
						<input id="author" name="author" type="text"  required >
				</p>
				<p>
						<label for="publisher">Publisher  : </label>
						<input id="publisher" name="publisher" type="text" >
				</p>
					<p>
						<label for="category" >Selcet Category:</label>
						<select id="category" name="category" >
			                <option></option> 
							<option value="Novels">Englis Novels</option>
							<option value="Urdu Novels">Urdu Novels</option>
							<option value="Science">Science</option>
							<option value="History">History</option>
							<option value="Comic Books">Comic Books</option>
						</select>
					</p>
				<p>
						<label for="cost">Book cost : </label>
						<input id="cost" name="price" type="text"  required>
				</p>
				<p>
					<label for="fileupload"> Select a file to upload</label>
					<input type="file" name="image" value="image" id="fileupload">
				</p>
				<p>
						<label for="description">Book Details : </label>
						<input id="description" name="description" type="text"  required>
				</p>
			   
				<button id="submit" type="submit" name="submit">UPLOAD BOOK</button>
		</form>
		
	</div>
	<div id="mainDiv2">	
		<h1 id="mybook">MY BOOKS</h1>
	 <table>
 <tr>
  <th>Id</th> 
  <th>Title</th> 
  <th>Author</th>
  <th>Publisher</th>
  <th>Category</th>
  <th>Price</th>
  <th>Image</th>
 </tr>
 <?php
$con = mysqli_connect("localhost", "root", "", "bookstore");
  // Check connection
  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 
  $sql = "SELECT id, title,author,publisher, category,price,image FROM books";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc())  {
   	$img=$row['image'];
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"] . "</td><td>"
. $row["author"]."</td><td>" . $row["publisher"]. "</td><td>" . $row["category"]."</td><td>" . 
  $row["price"]."</td><td>" ?>. <img src="assets/images/booksimages/<?php echo $img ; ?>" height="100" width="100">. <?php  "</td></tr>";
}
echo "</table>";
} 
else { echo "0 results"; }
$con->close();
?>
</table>


	</div>

</div>

</body>
</html>