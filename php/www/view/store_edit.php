<?php
  require_once '../model/ClientGameModel.php';
  require_once '../model/GameModel.php';
  require_once '../model/ClientModel.php';
  include_once('../config/template.php');

  $template = new Template();
  $clientGameModel = new ClientGameModel();
  $gameModel = new GameModel();
  $clientModel = new ClientModel();
  if($_GET['id']){
    $template->clientGame = $clientGameModel->getById($_GET['id']);
  }
  $template->gameArray = $gameModel->getAll();
  $template->clientArray = $clientModel->getAll();
  $template->paymentTypeArray = ['Boleto', 'Cartão de crédito'];
  $template->render('/store_edit.tpl.php');
?>