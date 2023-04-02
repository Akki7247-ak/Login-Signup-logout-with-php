<?php
$login=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/_dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];

  $sql="Select * from users where username='$username' and password='$password'";
$result=mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  
if($num==1){
$login=true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:welcome.php");

}
else{
  $showError="Username  Password not match";
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  form{
    display: flex;
    flex-direction: column;
    align-items: center;
  }
</style>
    <title>Signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($login) {
      echo '
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
  <strong>login Successful!</strong> welcome.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}

if ($showError) {
  echo '
<div class="alert alert-danger  alert-dismissible fade show" role="alert">
<strong>Error!</strong>'.$showError.'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';}
?>

    <div class="container col-md-6 " style="margin-top: 100px;">
<h1 class="text-center">Login to our website</h1>
    <form action="/loginform/login.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" earia-describedby="emailHelp" placeholder="Please enter your username">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

 
 
  <button type="submit" class="btn btn-primary col-md-6" >Login</button>
</form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>