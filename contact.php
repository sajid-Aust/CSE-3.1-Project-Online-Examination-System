<?php
$errors=array();

if(isset($_POST['send'])){
    $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");

    $email = mysqli_real_escape_string($db, $_POST['mail']);
    $message = mysqli_real_escape_string($db, $_POST['msg']);

    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($message)){
        array_push($errors, "Give a message");
    }
    if(count($errors)==0){
        $query="INSERT INTO contact_table(email, message) VALUES('$email', '$message')";
        mysqli_query($db, $query);
        header('Location: font_page.php');
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bootstrap 4 - responsive Contact form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">



   <style>
	    body{
	    	background-image: url(image/wall.jpg);
	    	background-size:cover;
	    }
	    hr{
	    	background: white;	
	    }

		.contact-form{
			background:rgba(0,0,0, .6);
			color:white;
			margin-top: 100px;
			padding: 20px;
			box-shadow: 0px 0px 10px 3px grey;
		}
   </style>


  </head>
<body>
	


<div class="container contact-form">
	<h1>Contact form</h1>
	<hr>

	<div class="row">
      
       <div class="col-md-6">
       	<address>Uttara, Dhaka-1230</address>
       	<p>Email:- raficse30@email.com</p>
       	<p>Phone:- +8801850196678</p>
       </div>

       <div class="col-md-4">
       	 <form action="contact.php" method="post">
         

         <div class="form-group">
         	<label>Email</label>
         	<input type="email" class="form-control" name="mail" required>
         </div>

         <div class="form-group">
         	<label>Message</label>
         	<textarea  class="form-control" rows="7" name="msg" required></textarea>
         </div>

         <div class="form-group">
			 <input type="submit" name="send" value="Send" class="btn btn-primary btn-block">		 
		</div>
		 </form>

       </div>

    </div>

</div>




</body>
</html>
