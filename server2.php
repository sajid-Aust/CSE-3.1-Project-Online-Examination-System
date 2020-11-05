<?php
session_start();

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");


if(isset($_SESSION['adminname']) ){

if(isset($_POST['update'])){
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

    $admin_change_query = "UPDATE admin SET admin_name='$admin_name',admin_password='$pass'";
    mysqli_query($db, $admin_change_query);
    $_SESSION['adminname']=$admin_name;
    header('location: index1.php');
}
}
}
?>
