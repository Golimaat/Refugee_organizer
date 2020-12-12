<?php
$conn = mysqli_connect("localhost","root","","refugee_db");
if(isset($_POST['btnSubmit'])){
    $txtEmail = $_POST['txtEmail'];
    $txtPass = $_POST['txtPass'];

    $query = "select * from tbl_login where email_id='{$txtEmail}' and password='{$txtPass}'";
    $result = mysqli_query($conn,$query);

    if($res=mysqli_fetch_array($result)){
        echo "<script>alert(\"login successful\");</script>";
    }else{
        echo "<script>alert(\"login failed\");</script>";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    </head>
    <div class="header">
        <nav class="nav">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link "href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="About.html">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact us</a>
                </li>
               
              </ul>
        </nav>
      </div>     

      <div class="jumbotron jumbotron-fluid bg-info text-white text-center" style="background: #aaa;">
        <div class="container">
            <h1>Welocom to refugee organizer system <h1>
            <p class="lead">we try to help every refugee get a fair treatment</p>
        </div>
            
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-10">
                <form action="login.php" method="post">
                    <div class="panel-heading">
                        LOGIN
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="txtEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="txtPass" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSub" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div> 

    </div>
    <body>

    </body>
</html>