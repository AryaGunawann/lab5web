<?php
include "koneksi.php";
$sql = "SELECT * FROM form_input";
$result = mysqli_query($koneksi, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="container">
    <header>
    
    </header>
    <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </nav>
