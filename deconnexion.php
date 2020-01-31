<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat|Sniglet&display=swap" rel="stylesheet">
  <title>Science Factory</title>
</head>

<body class="body_index">
  <header>
    <?php include 'include-php/header.php' ?>
  </header>
  

  <?php 

  if (isset($_SESSION['loginco'])) {

    session_destroy();
    header("location:index.php");
    
  }

?>