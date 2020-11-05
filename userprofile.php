<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: font_page.php');
}
$errors = array();
if(isset($_SESSION['username'])){

  
  $username = $_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");

  $query = "SELECT * FROM user WHERE user_name='$username'";

  $res = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($res);

  $uid=$user['user_id'];
  $uname=$user['user_name'];
  $uemail=$user['user_email'];
  $upass=$user['user_password'];
  $uinst=$user['user_institution'];

  if(isset($_POST['btn_update'])){
   
    $email = mysqli_real_escape_string($db, $_POST['u_email']);
    $institution = mysqli_real_escape_string($db, $_POST['u_inst']);
    $password = mysqli_real_escape_string($db, $_POST['u_passwd']);

    if(empty($email)){
      array_push($errors, "Email is required");
    }
    if(empty($password)){
      array_push($errors, "Password is required");
    }
    
    if(count($errors)==0){
      $pass=md5($password);
      $query2="Update user SET user_email='$email', user_institution='$institution', user_password='$pass' 
               WHERE  user_name='$username'";
      mysqli_query($db, $query2);
      
      $uemail=$email;
      $upass=$institution;
      $uinst=$password;

    }
  }

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
  <link rel="stylesheet" href="userstyle.css">-->
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
                                 <a class="nav-link" href="index2.php">Back</a>
                            </li>
                          </ul>
                        </div>  
                      </nav>
        </div>
    </div>

    
    <div class="obj" style="overflow-x: auto;">
                <h3 class="text-center"><b>Profile</b></h3>
                <?php include('error.php') ?>
                <form action="" method="post">          
                <table class="table table-dark table-hover">
                      
                        <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td><input type="int" name="userid" style="width: 80%; height: 25%; font-size: 1.3rem;" 
                                value="<?php echo $uid;?>"readonly/></td>
                        </tr>   
                       <tr>
                          <td>Name</td>
                          <td>:</td>
                          <td><input type="text" name="u_name" style="width: 80%; height: 25%; font-size: 1.3rem;" 
                          value="<?php echo $uname;?>"readonly/></td>
                      </tr> 
                      <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td><input type="email" name="u_email" style="width: 80%; height: 25%; font-size: 1.3rem;" 
                          value="<?php echo $uemail;?>"required/></td>
                      </tr> 
                      <tr>
                          <td>Password</td>
                          <td>:</td>
                          <td><input type="password" name="u_passwd" style="width: 80%; height: 25%; font-size: 1.3rem;" 
                          value="<?php echo $upass;?>"required/></td>
                      </tr> 
                      <tr>
                          <td>Institute</td>
                          <td>:</td>
                          <td><input type="text" name="u_inst" style="width: 80%; height: 25%; font-size: 1.3rem;"
                          value="<?php echo $uinst;?>"/></td>
                      </tr> 
                      
                      <tr>
                          <td></td>
                          <td></td>
                          <td><input  type="submit" value="Update" name="btn_update" class="btn btn-success badge-pill" /></td>
                      </tr>          
                </table>
                
                </form>
                     
  
                
        </div>
        

        

         <div style="height: 40px;">
         <nav class="navbar navbar-expand-lg bg-dark navbar-dark bottom">
         <ul class="navbar-nav mx-auto">
          <li class="nav-item">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
          </li>
         </ul>
          </div>
         </nav>
         </div>
    
</body>
</html>
<?php
}
?>