<?php
  require_once '../model/ClientGameModel.php';
  require_once '../model/ClientModel.php';
  require_once '../model/GameModel.php';
  include_once('../config/Template.php');
  $template = new Template();
  $clientGame = new ClientGameModel();
  $gameModel = new GameModel();
  $clientModel = new ClientModel();
  $template->clientGameArray = $clientGame->getAllWithClientGameName();
  $template->popularGame = $gameModel->getPopularGame();
  $template->popularClient = $clientModel->getPopularClient();
  $template->popularDate = $clientGame->getPopularDate();
  $template->popularPaymentType = $clientGame->getPopularPaymentType();
  $template->totalAmount = $clientGame->getTotalAmount();
  $template->popularCompany = $clientGame->getPopularCompany();
  $template->render('/statistics_list.tpl.php');

  
?>