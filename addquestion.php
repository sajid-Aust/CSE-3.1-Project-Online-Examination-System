<?php
session_start();


if(($_SESSION['adminname'])){
  
  $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");
  
  
      $query="SELECT * FROM ques_table";

      $result=mysqli_query($db, $query);
      $rows=mysqli_num_rows($result);

      $next=$rows+1;

      if(isset($_POST['btn'])){
        $qs_no = mysqli_real_escape_string($db, $_POST['quesno']);
        $qs = mysqli_real_escape_string($db, $_POST['ques']);

        $query1="Insert into ques_table(quesno, question) values ('$qs_no', '$qs')";
        $ins_row=mysqli_query($db, $query1);

        $answer = array();

        $answer[1] = mysqli_real_escape_string($db, $_POST['ans1']);
        $answer[2] = mysqli_real_escape_string($db, $_POST['ans2']);
        $answer[3] = mysqli_real_escape_string($db, $_POST['ans3']);
        $answer[4] = mysqli_real_escape_string($db, $_POST['ans4']);
        
        $right_answer = mysqli_real_escape_string($db, $_POST['c_ans']);

        if($ins_row){
            foreach($answer as $key=>$ansname){
                if($ansname!='null'){
                    if($key==$right_answer){
                        $query2="Insert into ans_table(quesno, ans, right_ans) values ('$qs_no', '$ansname','1')";

                    }
                    else{
                        $query2="Insert into ans_table(quesno, ans, right_ans) values ('$qs_no', '$ansname','0')";
                     
                    }
                    $ins_row=mysqli_query($db,$query2); 

                    /*if($ins_row)
                    {
                        continue;
                    }
                    else
                    {
                        die("Error..");
                    }*/
                }
            }
        }
        header('Location: index1.php');
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
  <link rel="stylesheet" href="addques.css?v=<?php echo time(); ?>">
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
                             <a class="nav-link" href="index1.php">Home</a>
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
                <h3 class="text-center">Question List</h3>
              
                <form action="addquestion.php" method="post">          
                <table class="table table-dark table-hover">
                      <tr>
                          <td>Question no</td>
                          <td>:</td>
                          <td><input type="number" value="<?php if(isset($next)){echo $next;}else{echo 0;}?>"name="quesno" readonly/></td>
                      </tr> 
                      <tr>
                          <td>Question</td>
                          <td>:</td>
                          <td><input type="text" name="ques" style="width: 80%; height: 80px; font-size: 1.3rem;" required/></td>
                      </tr> 
                      <tr>
                          <td>Choice 1</td>
                          <td>:</td>
                          <td><input type="text" name="ans1" style="width: 40%; height: 40px; font-size: 1.3rem;" required/></td>
                      </tr> 
                      <tr>
                          <td>Choice 2</td>
                          <td>:</td>
                          <td><input type="text" name="ans2" style="width: 40%; height: 40px; font-size: 1.3rem;" required/></td>
                      </tr> 
                      <tr>
                          <td>Choice 3</td>
                          <td>:</td>
                          <td><input type="text" name="ans3" style="width: 40%; height: 40px; font-size: 1.3rem;" required/></td>
                      </tr> 
                      <tr>
                          <td>Choice 4</td>
                          <td>:</td>
                          <td><input type="text" name="ans4" style="width: 40%; height: 40px; font-size: 1.3rem;"/></td>
                      </tr> 
                      <tr>
                          <td>Correct Ans</td>
                          <td>:</td>
                          <td><input type="number" name="c_ans" required/></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td><input  type="submit" value="Add" name="btn" class="btn btn-success badge-pill" /></td>
                      </tr>          
                </table>
                
                </form>
                     
  
                
        </div>
        

        <!-- <div class="footer footer-expand-lg">
         <div class="foot text-center">
          
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
</div>
         </div>-->

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