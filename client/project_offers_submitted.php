<?php require_once 'classloader.php'; ?>
<?php
if (!$userObj->isLoggedIn()) {
  header("Location: login.php");
  exit;
}

if (!($userObj->isClient() || $userObj->isAdmin())) {
  header('Location: ../freelancer/index.php');
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    body {
      font-family: "Arial";
    }
  </style>
</head>

<body>
  <?php require_once 'includes/prelude.php'; ?>
  <?php include 'includes/navbar.php'; ?>
  <div class="container-fluid">
    <div class="display-4 text-center">Hello there and welcome! Here are all the submitted project offers!</div>
    <div class="row justify-content-center">
      <div class="col-md-12">
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>