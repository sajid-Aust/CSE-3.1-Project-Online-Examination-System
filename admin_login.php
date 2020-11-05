<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>Admin</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="style_adminlog.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body  class="bg">
      <div class="wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-12">
                          <form class="form-container" action="admin_login.php" method="post">
                          
                                  <h1 style="text-align: center; font-weight: 600 ; color:darkorange">Admin Login</h1>
                                  <?php include('error.php') ?>
                                  <div class="form-group">
                                    <label for="exampleInputName" style="font-size: 1.8rem; ">Username</label>
                                    <input type="text" class="form-control" name="adminname" id="exampleInputName" placeholder="Username" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword" style="font-size: 1.8rem; ">Password</label>
                                    <input type="password" class="form-control" name="adminpass" id="exampleInputPassword" placeholder="Password" required>
                                  </div>
                                  <br><br>
                                  <button type="submit" class="btn btn-success btn-block" name="proceed">Proceed</button>
                                 
                          </form>
                                
                  </div>
              </div>
          </div>
      </div>

      
        
      <div class="foot text-center">
            <p style="color:wheat;">Copyright &copy;<script>document.write(new Date().getFullYear());</script>, Online Exam</p>
     </div>
    </body>
</html>