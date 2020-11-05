<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>Login Page</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="style_login.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body data-spy="scroll" class="bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                        <form class="form-container" action="login_page.php" method="post">
                                <h1 style="text-align: center; font-weight: 600 ; color:darkorange">Login Form</h1>
                                <?php include('error.php') ?>
                                <div class="form-group">
                                  <label for="exampleInputName1" style="font-size: 1.8rem; ">Username</label>
                                  <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-size: 1.8rem; ">Password</label>
                                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div>
                                  <label>
                                    <a href="#"><h5><u style="font-size: 1.5rem; color:rgb(96, 221, 252);">Forgot Password</u></h5></a> 
                                  </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                                <a href="registration_page.php"><h4 style="text-align: center; "><u style="color:yellow">Are you not registered? Sign up</u></h4></a>
                        </form>
                              
                </div>
            </div>
        </div>
        
        <div class="foot text-center">
            <p style="color:wheat;">Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
     </div>
    </body>
</html>