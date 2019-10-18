<?php
	class Book {

		private $con;
		private $id;
		private $title;
		private $author;
		private $publisher;
		private $category;
		private $price;
		private $bookImage;
		private $description;

	public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
	
		  $query=mysqli_query($this->con,"SELECT * FROM books WHERE id='$this->id'");
          $Book=mysqli_fetch_array($query);
          $img=$Book['image'];

          $this->title=$Book['title'];
          $this->author=$Book['author'];
          $this->publisher=$Book['publisher'];
          $this->category=$Book['category'];
          $this->price=$Book['price'];
          $this->bookImage=$img;
          $this->description=$Book['description'];

    }
		public function getTitle() {
		  
			return $this->title;
		}

		public function getAuthor() {
		  
		  return $this->author ;
		}
		public function getPublisher() {
		  
			return $this->publisher;
		}
		public function getCategory() {
		  
			return $this->category;
		}
		public function getPrice() {
		  
			return $this->price;
		}
		public function getImage() {
		  
			return $this->bookImage;
		}
		public function getDescription() {
		  
			return $this->description;
		}
	}
?>