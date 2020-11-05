<?php
//include('session.php');
session_start();

if(isset($_SESSION['adminname']) ){
    header('location: index1.php');
}

else if(isset($_SESSION['username']) ){
    header('location: index2.php');
}

$username="";
$email="";
$password="";

$admin_name="";
$admin_password="";

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");

if(isset($_POST['reg_user'])){

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$institution = mysqli_real_escape_string($db, $_POST['institution']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

if(empty($username)){
    array_push($errors, "Username is required");
}
if(empty($email)){
    array_push($errors, "Email is required");
}
if(empty($password)){
    array_push($errors, "Password is required");
}
if($password!=$cpassword){
    array_push($errors, "Confirmation wrong");
}

$user_check_query = "SELECT * FROM user WHERE user_name='$username' OR user_email='$email' LIMIT 1";

$result = mysqli_query($db, $user_check_query);
$user_double=mysqli_fetch_assoc($result);

if($user_double){
    if($user_double['user_name']===$username){
        array_push($errors, "Username already exists");
    }
    if($user_double['user_email']===$email){
        array_push($errors, "This email has a regsitered username");
    }
}

if(count($errors)==0){
    $pass = md5($password);

    $reg_query = "INSERT INTO user(user_name, user_email, user_institution, user_password) VALUES
                  ('$username', '$email', '$institution', '$pass')";
    mysqli_query($db, $reg_query);

    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";

    header('location: index2.php');
}
}
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }
    
    if(count($errors)==0){
    $pass=md5($password);

    $user_auth_query = "SELECT * FROM user WHERE user_name='$username' AND user_password='$pass'";
    $result = mysqli_query($db, $user_auth_query);

    if(mysqli_num_rows($result)){
        $_SESSION['username']=$username;
        $_SESSION['success']="Logged in successfully";
        header('location: index2.php');
    }
    else{
        array_push($errors, "Wrong username/password combination");
    }
}
}
if(isset($_POST['proceed'])){
    $admin_name = mysqli_real_escape_string($db, $_POST['adminname']);
    $admin_password = mysqli_real_escape_string($db, $_POST['adminpass']);

    if(empty($admin_name)){
        array_push($errors, "Username is required");
    }
    if(empty($admin_password)){
        array_push($errors, "Password is required");
    }
    
    if(count($errors)==0){
    $pass=md5($admin_password);

    $admin_auth_query = "SELECT * FROM admin WHERE admin_name='$admin_name' AND admin_password='$pass'";
    $result = mysqli_query($db, $admin_auth_query);

    if(mysqli_num_rows($result)){
        $_SESSION['adminname']=$admin_name;
        $_SESSION['admin_success']="Logged in successfully";
        header('location: index1.php');
    }
    else{
        array_push($errors, "Wrong username/password combination");
    }
}
}

?>