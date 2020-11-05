<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['adminname']);
    header('location: font_page.php');
}

if(($_SESSION['adminname'])){
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
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target="#collapsibleNavbar">
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
                                <a class="nav-link" href="feedback.php">Feedback</a>
                           </li>
                           <li class="nav-item">
                                <a class="nav-link" href="index1.php?logout=1">Log Out </a>
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
        
                     <div class="caption text-center">
                            <h3>Welcome to </h3>
                            <h1>Admin Panel</h1>
                           
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
