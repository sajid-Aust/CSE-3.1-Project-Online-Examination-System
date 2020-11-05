<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'online_exam') or die("Could not connect to database");

if(isset($_POST['quit'])){
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
    header('Location: index2.php');
}

if(isset($_POST['submit'])){
    $ans_value = mysqli_real_escape_string($db, $_POST['ans']);
    $no = mysqli_real_escape_string($db, $_POST['number']);
    echo $ans_value;

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

}