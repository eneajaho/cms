<?php include_once 'db.php'; ?>
<?php include_once 'functions.php'; ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login | CMS System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

<style>

html, body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  justify-content: center;

}

.form-signin {
  width: 100%;
  max-width: 450px;
  padding: 15px;
  margin: auto;
}

.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>
  </head>
  <body class="text-center">
  <div class="card mb-4 shadow-lg rounded border-0">
  <h1 class="h3 mb-3 font-weight-normal card-header text-white bg-primary">Sign in | CMS System</h1>
<div class="p-3">

    <form class="form-signin" method='post' action=''>
 
      <?php  _login(); ?>
 

      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Enter username" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="login">Login</button>
      <p class="mt-3 text-muted">&copy; CMS System 2018</p>
    </form>
</div>
    </div>
  </body>
</html>
