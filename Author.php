<?php
	class Author {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getName() {
			session_start();
		  $authorQuery=mysqli_query($this->con,"SELECT a.*,b.authorName FROM book_author WHERE id='$this->id'");
          $author=mysqli_fetch_array($authorQuery);
			return $author['authorName'];
			$auth=$author['authorName'];
			$_SESSION['author']=$author['authorName'];
		}
	}
?>