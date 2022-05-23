<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    
<main class="form-signin">
  <form method="post">
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <!-- INSERT DATA  -->
    <?php 
      // SESSION LOGIN
      session_start();
      if(isset($_SESSION['email'])){
        header('Location: ..pages/main.php');
      };
      // SESSION END LOGIN
      
      include_once("../database/database.php");
      $database = new Database;
      $connection = $database->getConnection();

      if(isset($_POST['btn-signin'])){
          $email = $_POST['email'];
          $password = md5($_POST['password']);

          $login = "SELECT * FROM pengguna WHERE email='" . $email ."' AND password = '".$password."'";

          $statement = $connection->prepare($login);
          $statement->execute();
          $row_count = $statement->rowCount();
          
          if($row_count > 0) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            header('Location: ../pages/main.php?page=');
            echo '<div class="alert alert-success" role="alert">login successfully</div>';
          }else{
            echo '<div class="alert alert-danger" role="alert">login Failed</div>';
          }
      }
    ?>
    <!-- INSERT END  -->

    
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button name="btn-signin" class="w-100 btn-lg btn btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>
