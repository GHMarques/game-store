<?php
require_once '../model/CountryModel.php';
include_once('../config/template.php');
//print_r($_GET['function']);
//print_r($_GET['id']);
$template = new Template();
$country = new CountryModel();
$template->countryArray = $country->getAll();

$template->render('/client_edit.tpl.php');

?>