<!DOCTYPE html>
<?php require './model/client.php' ?>
<?php include('view/header.php'); ?>
<main class="mdl-layout__content">
  <div class="page-content"><!-- Your content goes here --></div>
  <?php 
    $client = new clientModel();
    $test = $client->getAll();
    echo($test[0][name]);
  ?>
  <p>Aloooo</p>
<?php include('view/footer.php'); ?>