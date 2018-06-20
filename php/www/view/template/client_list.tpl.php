<link rel="stylesheet" href="../view/template/style.css">
<?php 
  include('../view/template/header.tpl.php');
  require_once '../config/Constant.php'; 
?>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><?=constant::getString('Menu')?></span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/client_edit.php"><?=constant::getString('Create')?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Name')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Email')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Password')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Birth')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Street')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Number')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('State')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Complement')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Country')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Options')?></th>
          </tr>
        </thead>
        <tbody>
          <?php  if($this->clientArray) foreach($this->clientArray as $client) { ?>
            <tr>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['client_name']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['email']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['password']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['birth']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['street']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['number']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['state']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['complement']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client['country_name']?></td>
              <td class="mdl-data-table__cell--non-numeric">
                <a href="client_edit.php?id=<?=$client['id']?>">
                  <i class="material-icons">mode_edit</i>
                </a>
                <a href="../../controller/clientController.php?id=<?=$client['id']?>">
                  <i class="material-icons">delete</i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php include('../view/template/footer.tpl.php'); ?>