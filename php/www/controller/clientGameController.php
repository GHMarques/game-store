<?php require('../model/ClientGameModel.php'); ?>
<?php
if (isset($_POST['submit']) && $_POST['submit'] === 'Create'){
  $clientGame = new ClientGameModel($_POST[client], $_POST[game], $_POST[buyDate], $_POST[price], $_POST[paymentType]);
  $clientGame->insert();
  header('Location: ../view/store_list.php');
  exit();
}

if (isset($_POST['submit']) && $_POST['submit'] === 'Edit'){
  $clientGame = new ClientGameModel($_POST[client], $_POST[game], $_POST[buyDate], $_POST[price], $_POST[paymentType], $_POST[id]);
  $clientGame->update();
  header('Location: ../view/store_list.php');
  exit();
}

if ((isset($_POST['submit']) && $_POST['submit'] === 'Delete') || $_GET['id']){
  $idToDelete = ($_GET['id']) ? $_GET['id'] : $_POST[id];
  $clientGame = new ClientGameModel();
  $clientGame->delete($idToDelete);
  header('Location: ../view/store_list.php');
  exit();
}

?>