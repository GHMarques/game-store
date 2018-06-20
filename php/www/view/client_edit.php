<?php
  require_once '../model/CountryModel.php';
  require_once '../model/ClientModel.php';
  include_once('../config/Template.php');

  $template = new Template();
  $countryModel = new CountryModel();
  $clientModel = new ClientModel();
  if(isset($_GET['id']) && $_GET['id']){
    $template->client = $clientModel->getById($_GET['id']);
  } else {
    $template->client = false;
  }
  $template->countryArray = $countryModel->getAll();
  $template->render('/client_edit.tpl.php');
?>