<?php
  require_once '../model/CountryModel.php';
  require_once '../model/ClientModel.php';
  include_once('../config/template.php');

  $template = new Template();
  $countryModel = new CountryModel();
  $clientModel = new ClientModel();
  if($_GET['id']){
    $template->client = $clientModel->getById($_GET['id']);
  }
  $template->countryArray = $countryModel->getAll();
  $template->render('/client_edit.tpl.php');
?>