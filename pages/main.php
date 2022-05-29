<!-- Middleware  -->
<?php 
session_start();
if(!isset($_SESSION['email'])){
echo '<meta http-equiv="refresh" content="0;url=http://localhost/praktikum_web/daftar_tugas/">';
}

if(isset($_POST['btn_logout'])){
session_destroy();
echo '<meta http-equiv="refresh" content="0;url=http://localhost/praktikum_web/daftar_tugas/">';
}
?>
<!-- Middleware  -->

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.84.0">
<title>Dashboard Template · Bootstrap v5.0</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

<!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">

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
<link href="../assets/css/dashboard.css" rel="stylesheet">
</head>
<body>

<?php include "components/header.php" ?>

<div class="container-fluid">
<div class="row">

    <?php include "components/navbar.php" ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php include "routes/routes.php" ?>
    </main>
</div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
