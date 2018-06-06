<?php
  require_once '../model/ClientGameModel.php';
  require_once '../model/ClientModel.php';
  include_once('../config/template.php');
  $template = new Template();
  $clientGame = new ClientGameModel();

  $template->clientGameArray = $clientGame->getAllWithClientGameName();
  $template->render('/store_list.tpl.php');
?>