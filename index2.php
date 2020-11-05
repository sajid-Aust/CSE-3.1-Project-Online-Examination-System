<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: font_page.php');
}

if(isset($_SESSION['username'])){
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/fixed.css">
  <link rel="stylesheet" href="style1.css ?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target="#collapsibleNavbar">
        <div class="home">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
                       <a class="navbar-brand" href="#"><img src="image/exm.png"></a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="collapsibleNavbar">
                         <ul class="navbar-nav ml-auto">
                           <li class="nav-item">
                             <a class="nav-link" href="#home">Home</a>
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
                                <a class="nav-link" href="index2.php?logout=1">Log Out </a>
                           </li>
                         </ul>
                       </div>  
                     </nav>
        
                   <div class="landing">
                         <div class="home-wrap">
                             <div class="home-inner">
                                    
                             </div>
                         </div>
                     </div>
                     <?php
                     $user_name=$_SESSION['username'];
                      ?>

                     <div class="caption text-center">
                            <h3 style="color: rgb(245, 132, 12)">Welcome to </h3>
                            <h1 style="color: rgb(245, 132, 12)">Online Exam System</h1>
                            <h1 style="color: rgb(20, 255, 122); font-size: 3.0rem;"><b><?php echo $user_name; ?><b></h1>
                           
                     </div> 
        </div>
         
              

         <div class="foot text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
         </div>
        
</body>
</html>
<?php
}
?>
   
