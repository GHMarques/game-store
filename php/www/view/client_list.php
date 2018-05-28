<link rel="stylesheet" href="../view/template/style.css">
<?php
  require_once '../model/CountryModel.php';
  require_once '../model/ClientModel.php';
  include_once('../config/template.php');
  $template = new Template();
  $country = new CountryModel();
  $template->countryArray = $country->getAll();
  $client = new ClientModel();
  $template->clientArray = $client->getAllWithCountryName();
  $template->render('/client_list.tpl.php');

?>