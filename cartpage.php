<?php 
    include("includes/classes/Book.php");
    session_start();
   include("includes/config.php");

     if(isset($_POST["addCart"]))  
 {  

      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET['id'], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET['id'],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"]   
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET['id'],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"]   
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 } 

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET['id'])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cartpage.php"</script>';  
                }  
           }  
      }  
 }  
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
	      if(isset($_POST['addCart'])){
	      	 echo '<script>
		  $(document).ready(function(){

			    $("#mainDiv3").hide();
			    $("#mainDiv2").show();
			});
		</script>';
      }
      else{
      	echo '<script>
		  $(document).ready(function(){

			    $("#mainDiv2").hide();
			    $("#mainDiv3").show();
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
   	  <br><br><br><br>
		<p class="gotoBooks">
			    <button id="viewBooks" type="submit" name="viewBooks" onclick="window.location.href='index.php'">View Books</button>
			</p><br>
			<p class="gotoInfo">
				<button id="viewCart" type="submit" onclick="window.location.href='cartpage.php'" name="viewCart">View Cart</button>
			</p>
   </div>
   <div id="mainDiv3">
		<?php
       if (isset($_GET['id'])){
       	$bookId= $_GET['id'];
       }
       else{
       	header("Location: index.php");}
	    
	    $book=new Book($con,$bookId);  
	    //$author=$book->getAuthor(); 
?>
	    <div class="entityInfo">
	        <div class="leftSection">
	         <img src='assets/images/booksimages/<?php echo $book->getImage(); ?>' height=400 width=300>
	        </div>

	        <div class="rightSection">
	        	 <form method="post" action="cartpage.php?action=add&id=<?php echo $bookId ?>"> 

	            <h4 class="text-info">Title :<?php echo $book->getTitle(); ?></h4>
	            <span>By  : <?php echo $book->getAuthor();?> </span><br><br>  
                <span class="text-danger">Price  :Rs <?php echo $book->getPrice(); ?></span><br><br> 
	        	<!-- <input type="hidden" name="hidden_name"><?php echo $book->getTitle();?>
	        	<input type="hidden" name="hidden_price">Price : Rs <?php echo $book->getPrice();?><br>
	        	<span>By  : <?php echo $book->getAuthor();?> </span><br><br> -->
	            <span>Category : <?php echo $book->getCategory();?></span><br><br>
	        	<span>Publisher : <?php echo $book->getPublisher();?></span><br><br>
	        	
	        	<span>Book description : <?php echo $book->getDescription();?></span><br><br>

	        	<br><button id="addCart" type="submit" name="addCart" onclick="window.location.href='index.php'">Add to Cart</button>

	        </form>

	        </div>

	    </div>    

	  

  </div>	
  <div id="mainDiv2">
                <br> <br>  <br> 
                <h3 style="    color: #7b3535;font-size: 30px;padding-left: 400px;">Order Details</h3> 

                <div class="table-responsive" >  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Price</th>    
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>    
                               <td>$ <?php echo $values["item_price"]; ?></td> 
                               <td>$ <?php echo number_format($values["item_price"], 2); ?></td>  
                               <td><a href="cartpage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr> 

                          <?php  

                                    $total = $total +  $values["item_price"];   
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 
                <br><br><button id="confirm" type="submit" name="confirm" onclick="window.location.href='index.php'">Confirm Order</button>

</div>
	    	


   </div>
  </body>
  </html>