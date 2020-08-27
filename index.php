<?php
session_start();
//var_dump($_SESSION);
require 'dbconnect.php';
if(!isset($_SESSION["email"]))
{
    header("location:login.php");
    exit();
}

$uid=$_SESSION["uid"];
 $email=$_SESSION["email"];
 //echo($uid);   
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!-- <header>
	 <div class="header-topbar">
        <div class="container">
              
            <div class="topbar-right pull-right">
               	<a href="login.php" class="login" style="color:black;">LOGIN</a>
               
            </div>
        </div>
    </div>
 
</header> -->
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Book Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Books <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
     <!--  <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
  </div>
</nav>


<br><br>
<!-- Modal -->
<div class="modal fade" id="bookaddmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create A New Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form action="bookprocess.php" method="POST">
      <div class="modal-body">
      
		  <div class="form-group">
		    <label for="exampleInputTitle">Title</label>
		    <input type="text" class="form-control" id="exampleInputTitle" name="title" aria-describedby="emailHelp">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPDate">Publication Date</label>
		    <input type="Date" class="form-control" name="publication" id="picker">
		  </div>
		 <div class="form-group">
		    <label for="exampleInputAuthor">Author</label>
		    <input type="text" class="form-control" name="author" id="exampleInputAuthor">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPrice">Price</label>
		    <input type="number" class="form-control" name="price" id="exampleInputPrice">
		  </div>
		<div class="form-group">
		    <label for="exampleInputPages">Pages</label>
		    <input type="number" class="form-control" name="page" id="exampleInputPages">
		  </div>
		 <div class="form-group">
		    <label for="exampleInputBType">Book Type</label>
		    <!-- <input type="text" class="form-control" name="book_type" id="exampleInputBType"> -->
		    <select class="custom-select" name="book_type">
				  <option selected>Paperback</option>
				  <option value="PaperRoll">PaperRoll</option>
				  <option value="Plain Paper">Plain Paper</option>
				  <option value="Single">Single</option>
			</select>
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="insertdata">Create Book</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ########################################################################################## -->

<!--edit Popup form Modal -->

<div class="modal fade" id="editmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Book Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form action="updatebook.php" method="POST">
      	
      <div class="modal-body">	
       <input type="hidden" name="update_id" id="update_id"> 	
		  <div class="form-group">
		    <label for="exampleInputTitle">Title</label>
		    <input type="text" class="form-control" id="Title" name="title" aria-describedby="emailHelp">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPDate">Publication Date</label>
		    <input type="Date" class="form-control" name="publication" id="Publication_Date">
		  </div>
		 <div class="form-group">
		    <label for="exampleInputAuthor">Author</label>
		    <input type="text" class="form-control" name="author" id="Author">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPrice">Price</label>
		    <input type="number" class="form-control" name="price" id="Price">
		  </div>
		<div class="form-group">
		    <label for="exampleInputPages">Pages</label>
		    <input type="number" class="form-control" name="page" id="Pages">
		  </div>
		 <div class="form-group">
		    <label for="exampleInputBType">Book Type</label>
		    <!-- <input type="text" class="form-control" name="book_type" id="Book_Type"> -->
		    <select class="custom-select" name="book_type" id="Book_Type">
				  <option selected>Paperback</option>
				  <option value="PaperRoll">PaperRoll</option>
				  <option value="Plain Paper">Plain Paper</option>
				  <option value="Single">Single</option>
			</select>
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="updatedata">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ########################################################################################## -->



<!-- ########################################################################################## -->

<!--Delete Popup form Modal -->

<div class="modal fade" id="Deletemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Book Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	  				
      	<form action="delete.php" method="POST">
      	
      <div class="modal-body">	
       <input type="hidden" name="delete_id" id="delete_id"> 	
		  <h4>Do You Want To Delete This Data</h4>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="deletedata">Yes Delete it!</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ########################################################################################## -->


	<div class="container">
		<div class="jumbotron">
			<div class="card">
				<h2>Books</h2>
			</div>
			<div class="card">
				<div class="card-body">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookaddmodel">
						  New Book
						</button>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					
					<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Title</th>
						      <th scope="col">Publication Date</th>
						      <th scope="col">Author</th>
						      <th scope="col">Price</th>
						      <th scope="col">Page</th>
						      <th scope="col">Book Type</th>
						      <th scope="col">Edit</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <?php
						$query = "SELECT * from `book_table` where `user_id`=$uid";
						$result=mysqli_query($conn,$query);
						if(mysqli_num_rows($result) > 0){
							$srno=0;
							while($row = mysqli_fetch_array($result)) {
						        $srno++;
						        $book_id=$row['book_id'];
								$Title=$row['Title'];
								$Publication_Date=$row['Publication_Date'];
								$Author=$row['Author'];
								$Price=$row['Price'];
								$Pages=$row['Pages'];
								$Book_Type=$row['Book_Type'];
								
					?>
						  <tbody>
						    <tr>
						    	<!-- <?php echo $book_id;?> -->
						      <td scope="row"><?php echo $book_id; ?></td>
						      <td><?php echo $Title; ?></td>
						      <td><?php echo $Publication_Date; ?></td>
						      <td><?php echo $Author; ?></td>
						      <td><?php echo $Price; ?></td>
						      <td><?php echo $Pages; ?></td>
						      <td><?php echo $Book_Type; ?></td>
						      <td>
						      
						      	<button type="button" class="btn btn-primary editbtn">Edit</button>
						      </td>
						      <td>
						      	<button type="button" class="btn btn-danger Deletebtn">Delete</button>
						      	<!-- <a class="btn btn-danger" href="delete.php?book_id=<?php echo $book_id;?>" role="button">Delete</a> -->
						      </td>
						    </tr>
						   
						  </tbody>
						  <?php
						  	}}
						  ?>
						</table>
											
				</div>
			</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
		$(".Deletebtn").on('click',function(){
				$("#Deletemodel").modal('show');

				$tr=$(this).closest('tr');
				var data=$tr.children("td").map(function(){
					return $(this).text();
				}).get();
				console.log(data);

				  $('#delete_id').val(data[0]);
				
		});
});	

</script>

<script type="text/javascript">
$(document).ready(function(){
		$(".editbtn").on('click',function(){
				$("#editmodel").modal('show');

				$tr=$(this).closest('tr');
				var data=$tr.children("td").map(function(){
					return $(this).text();
				}).get();
				console.log(data);

				 $('#update_id').val(data[0]);
				$('#Title').val(data[1]);
				$('#Publication_Date').val(data[2]);
				$('#Author').val(data[3]);
				$('#Price').val(data[4]);
				$('#Pages').val(data[5]);
				$('#Book_Type').val(data[6]);


		});
});	

</script>

 <script>
       // var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
       // $('#picker').datepicker({
       //     uiLibrary: 'bootstrap4'
       // });
       //  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
       //  $('#Publication_Date').datepicker({
       //      uiLibrary: 'bootstrap4'
       //  });


   //      $(function() {
			//   $('#picker').datetimepicker({
			//     language: 'pt-BR'
			//   });
			// });


     //     $(function() {
			  //   $("#picker").datepicker();
			  // } );
       
        // $('#endDate').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     iconsLibrary: 'fontawesome',
        //     minDate: function () {
        //         return $('#startDate').val();
        //     }
        // });
    </script>


</body>
</html>