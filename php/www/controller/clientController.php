<?php require('../model/clientModel.php'); ?>
<?php
if (isset($_POST['submit']) && $_POST['submit'] === 'Create'){
  $client = new ClientModel($_POST['name'], $_POST['email'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['number'], $_POST['state'], $_POST['complement'], $_POST['country']);
  $client->insert();
  header('Location: ../view/client_list.php');
  exit();
}

if (isset($_POST['submit']) && $_POST['submit'] === 'Edit'){
  $client = new ClientModel($_POST['name'], $_POST['email'], $_POST['password'], $_POST['birth'], $_POST['street'], $_POST['number'], $_POST['state'], $_POST['complement'], $_POST['country'], $_POST['id']);
  $client->update();
  header('Location: ../view/client_list.php');
  exit();
}

if ((isset($_POST['submit']) && $_POST['submit'] === 'Delete') || isset($_GET['id'])){
  $idToDelete = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];
  $client = new ClientModel();
  $client->delete($idToDelete);
  header('Location: ../view/client_list.php');
  exit();
}

?>