<?php require_once '../config/Constant.php'; ?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-light_green.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=constant::getString('GameStore')?></title>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title"><?=constant::getString('GameStore')?></span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="/view/client_list.php"><?=constant::getString('Clients')?></a>
            <a class="mdl-navigation__link" href="/view/store_list.php"><?=constant::getString('Store')?></a>
            <a class="mdl-navigation__link" href="/view/statistics_list.php"><?=constant::getString('Statistics')?></a>
          </nav>
        </div>
      </header>
