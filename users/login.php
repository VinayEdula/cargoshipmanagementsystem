<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
       <style>
body {
  background-image: url('https://images8.alphacoders.com/987/987888.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>
<?php include 'header.php' ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.html"><h3 style="color :white;"><b>CSMS USERS</b></h3></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
         <div class="new-account">
               
                <p> </p>
                 <h2> </h2>
                 <h1></h1>
              </div>
        <div class="new-account">
               
                <p> </p>
                 <h2> </h2>
                 <h1></h1>
              </div>
        <div class="new-account">
                Don't have an account yet?
                <a href="registration.php">
                  Create an account
                </a>
              </div>
      </form>
          <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<div class="copyright" style="color :white;">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase" style="color :white;"> CSMS</span>. <span style="color :white;">All rights reserved</span>
          </div>
      
    </div>

<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
