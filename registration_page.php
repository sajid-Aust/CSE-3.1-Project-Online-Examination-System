<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>Registration Page</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="style_reg.css?v=<?php echo time(); ?>">
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
                        <form class="form-container" action="registration_page.php" method="post">
                                
                                <h2 style="text-align: center; font-weight: 600; color:darkorange">Registration Form</h2>
                                <?php include('error.php') ?>
                                <div class="form-group">
                                        <label for="exampleInputname" style="font-size: 1.8rem;" class="ip">Username</label>
                                        <input type="text" class="form-control" name="username" id="exampleInputname" placeholder="Username" required>
                                </div>

                                <div class="form-group">
                                        <label for="exampleInputEmail" style="font-size: 1.8rem; "class="ip">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                        <label for="exampleInputInstitution" style="font-size: 1.8rem; "class="ip">Institution</label>
                                        <input type="text" class="form-control" name="institution" id="exampleInputInstitution" placeholder="Institution">
                                </div>

                                

                                <div class="form-group">
                                        <label for="exampleInputPassword1" style="font-size: 1.8rem; "class="ip">Password</label>
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
      
                                
                                <div class="form-group">
                                  <label for="exampleInputPassword2" style="font-size: 1.8rem; "class="ip">Retype Password</label>
                                  <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1" placeholder="Retype Password" required>
                                </div>
                                <div>
                                  
                                </div>
                                <div style="padding-top: 30px; text-align: center;">
                                    <button type="submit" name="reg_user" class="btn btn-primary center" >Sign Up</button>
                                </div>
                                <a href="login_page.php"><h4 style="text-align: center; "><u style="color:yellow">Already a member? Sign in</u></h4></a>

                                
                        </form>
                              
                </div>
            </div>
        </div>
        <div class="foot text-center">
                        <p style="color:wheat">Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
        </div>
    </body>
</html>