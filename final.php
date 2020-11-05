<?php
session_start();

  $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");
  if(isset($_SESSION['username'])){
    
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
 <!--- <link rel="stylesheet" href="css/fixed.css">-->
  <link rel="stylesheet" href="final.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 
    <div class="wrapper">
        <div class="home">
                <h2>Congratulations!!</h2>
        </div>
    </div>
   
        <div class="obj" style="overflow-x: auto;">

        <h2>You have done your test!!</h2>
        <h2>Final score:
            <b>
            <?php
            if(isset($_SESSION['score'])){
                echo " ".$_SESSION['score'];
                
                $username=$_SESSION['username'];
                $us_mark=$_SESSION['score'];
                $tot_mark=$_SESSION['tot_mark'];

                $query="SELECT * FROM user WHERE user_name='$username'";
                $query1="SELECT * FROM user_detail WHERE name='$username'";
                $rs1=mysqli_query($db, $query1);

                if(mysqli_num_rows($rs1)){
                    $query2="UPDATE user_detail set mark_obt='$us_mark' WHERE name='$username'";
                    mysqli_query($db, $query2);
                }
                else{
                $res=mysqli_query($db, $query);
                $usd=mysqli_fetch_assoc($res);

                $us_id=$usd['user_id'];
                $us_name=$usd['user_name'];
                
               

                $user_insert_query = "INSERT INTO user_detail(user_id, name, mark_obt, total_mark) VALUES
                                   ('$us_id','$us_name', '$us_mark', '$tot_mark' )";
                mysqli_query($db, $user_insert_query);
                }
                unset($_SESSION['score']);
            }
            else{
                echo 0;
            }
            ?></b>
                 


                               <!--<table class="tbl">
                                    <tbody>
                                    <tr>
                                          <td><input type="submit" name="quit" value="Quit" class="btn btn-danger btn-lg badge-pill"/></td>
                                          <td><input type="submit" name="submit" value="Next" class="btn btn-primary btn-lg badge-pill"/></td></tr>
                                          
                                    <tr>
                                    
                              </tbody>
                              </table>-->
                              <div class="lnk">
                              
                               <a href="test.php?q=1" class="start">Start Again</a>
                               <a href="index2.php"  class="start">Quit</a>
                       
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