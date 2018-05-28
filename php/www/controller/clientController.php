<?php require('../model/clientModel.php'); ?>
<?php

if (isset($_POST['submit'])){
  header('Location: /controller/client.php');
  exit();
  print_r($_POST);
  $client = new ClientModel($_POST[name], $_POST[email], $_POST[password], $_POST[birth], $_POST[street], $_POST[number], $_POST[state], $_POST[complement], $_POST[country]);
  //$client->insert();
}


?>