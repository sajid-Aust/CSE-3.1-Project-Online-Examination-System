<?php
 include('server3.php');


if(isset($_SESSION['username'])){

      $db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");

     /* if(isset($_POST['submit'])){
            $ans_value = mysqli_real_escape_string($db, $_POST['ans']);
            $no = mysqli_real_escape_string($db, $_POST['number']);
            //echo $ans_value;
        
            $query="SELECT * FROM ques_table";
            $res=mysqli_query($db, $query);
        
            $rightan=mysqli_fetch_assoc($res);
            $noOfRow=mysqli_num_rows($res);
             
            $next = $no+1;
        
            
        
            if(!isset($_SESSION['score'])){
                $_SESSION['score']=0;
            }
        
            $query1="SELECT * FROM ans_table WHERE quesno='$no' and right_ans='1'";
            $res1=mysqli_query($db, $query1);
            $rightans=mysqli_fetch_assoc($res1);
        
            if($rightans['id']==$ans_value){
                $_SESSION['score']++;
            }
        
            
            header('Location: test.php?q='.$next);
      }*/
     
      

      if(isset($_GET['q'])){
            
            $qno=(int)$_GET['q'];

            $query0="SELECT * FROM ques_table";
            $query1="SELECT * FROM ques_table WHERE quesno='$qno'";
            $query2="SELECT * FROM ans_table WHERE quesno='$qno'";
            
            $result=mysqli_query($db, $query1);

            if(mysqli_num_rows($result)){
               
                  $result0=mysqli_query($db, $query0);
                  $result2=mysqli_query($db, $query2);
      
                  $noOfques=mysqli_num_rows($result0);
                  $_SESSION['tot_mark']=$noOfques;
                  $ques_detail=mysqli_fetch_assoc($result);
            }

           else{
               header('Location: final.php');
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
 <!--- <link rel="stylesheet" href="css/fixed.css">-->
  <link rel="stylesheet" href="test_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 
    <div class="wrapper">
        <div class="home">
                <h2>Test your skill</h2>
        </div>
    </div>
   
        <div class="obj" style="overflow-x: auto;">
                <h3 class="text-center"><b>Question no: <?php echo  $qno." of ".$noOfques;?></b></h3>
                <form action="test.php" method="post">          
                <table class="table table-dark">
                                
                                </thead>
                                <tbody>
                                  <tr>
                                     <td colspan="3"><h3>Ques <?php echo " ". $qno.": ". $ques_detail['question'];?></h3></td>
                                  </tr>
                                  <?php
                                    if($result2){
                                          while($answer=mysqli_fetch_assoc($result2)){
                                                ?>
                                          <tr>
                                        <td><input type="radio" name="ans" value="<?php echo $answer['id'];?>"/>
                                        <?php echo $answer['ans']?></td>
                                           </tr>
                                           <?php
                                          }
                                    }
                                    
                                    ?>
                                  
                                  
                                </tbody>
                              </table>

                              <table class="tbl">
                                    <tbody>
                                    <tr>
                                          <td><input type="submit" name="quit" value="Quit" class="btn btn-danger btn-lg badge-pill"/></td>
                                          <td><input type="submit" name="submit" value="Next" class="btn btn-primary btn-lg badge-pill"/></td></tr>
                                          
                                    <tr>
                                    <td><input type="hidden" name="number" value="<?php echo $qno;?>"/></td>
                                    </tr>
                              </tbody>
                              </table>
                          </form>

                              
                            

  
                
        </div>

        
    
        <div class="foot text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
         </div>
    
</body>
</html>
<?php
}

?>