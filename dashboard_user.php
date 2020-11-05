<?php
session_start();


if(($_SESSION['username'])){
  
  $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");
  $user_detail_query = "SELECT user_id, name, mark_obt, total_mark FROM user_detail ORDER BY mark_obt desc";
  $result = mysqli_query($db, $user_detail_query);

  



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
                       <a class="navbar-brand" href="#"><img src="image/exm.png"></a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="collapsibleNavbar">
                         <ul class="navbar-nav ml-auto">
                           <li class="nav-item">
                             <a class="nav-link" href="index2.php">Home</a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link" href="userprofile.php">Profile </a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="dashboard_user.php">Dashboard</a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="test.php?q=1">Test</a>
                           </li>
                           
                           
                           <li class="nav-item">
                                <a class="nav-link" href="index2.php">Back </a>
                           </li>
                         </ul>
                       </div>  
                     </nav>
        
        </div>
    </div>
        <div class="obj" style="overflow-x: auto;">
                <h3 class="text-center">Obtained marks of users</h3>
                          <table class="table table-dark table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    
                                    <th scope="col">Obtained mark</th>
                                    <th scope="col">Total mark</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                if(mysqli_num_rows($result)){
                                  while($user_detail=mysqli_fetch_assoc($result)){
                                ?>
                                   <tr>
                                    <td><?php echo $user_detail['user_id'];?></td>
                                    <td><?php echo $user_detail['name'];?></td>
                                    
                                    <td><?php echo $user_detail['mark_obt'];?></td>
                                    <td><?php echo $user_detail['total_mark'];?></td>
                                    
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