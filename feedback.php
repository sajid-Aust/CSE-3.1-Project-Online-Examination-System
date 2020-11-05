<?php
session_start();


if(($_SESSION['adminname'])){
  
  $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");
  $contact_detail_query = "SELECT * FROM contact_table";
  $result = mysqli_query($db, $contact_detail_query);
 

  /*if(($_GET['delete'])){
    $key = $_GET['delete'];

    $contact_delete_query = "DELETE FROM contact_table WHERE contact_no='$key'";
    

    mysqli_query($db, $ques_delete_query);
   

    //$_GET['']=null;
    header('location: feedback.php');
  }*/



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/fixed.css">
  <link rel="stylesheet" href="dash_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 
    <div class="wrapper">
        <div id="home">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
                        <h1 style="font-weight: 700; font-size:2rem;">Administration</h1>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="collapsibleNavbar">
                         <ul class="navbar-nav ml-auto">
                           <li class="nav-item">
                             <a class="nav-link" href="#home">Home</a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link" href="update_admin.php?update=1">Update Info </a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="queslist.php">Ques. List</a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="addquestion.php">Add Ques. </a>
                           </li>
                           
                           <li class="nav-item">
                                <a class="nav-link" href="index1.php">Back </a>
                           </li>
                         </ul>
                       </div>  
                     </nav>
         
        </div>
    </div>
        <div class="obj" style="overflow-x: auto;">
                <h3 class="text-center">Feedbacks</h3>
                          <table class="table table-dark table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Feedback</th>

                                    <!--<th scope="col" class="text-center" >Action</th>-->
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                if(mysqli_num_rows($result)){
                                  while($contact_detail=mysqli_fetch_assoc($result)){
                                ?>
                                   <tr>
                                    <td><?php echo $contact_detail['contact_no'];?></td>
                                    
                                    <td><?php echo $contact_detail['email'];?></td>
                                    <td><?php echo $contact_detail['message'];?></td>

                                    <!--<td class="text-center">
                                        
                                        <button class="btn btn-danger badge-pill" style="width: 80px;">
                                        <a  href="feedback.php?delete=">Delete</a></button>
                                    </td>-->
                                  </tr>
                                  <?php
                                    }
                                  }
                                  ?>
                                </tbody>
                              </table>

                              
  
                
        </div>
    
        <div class="foot text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
         </div>
    
</body>
</html>
<?php
}
?>