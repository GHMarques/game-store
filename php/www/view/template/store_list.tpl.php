<link rel="stylesheet" href="../view/template/style.css">
<?php 
  include('../view/template/header.tpl.php');
  require_once '../config/Constant.php'; 
?>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><?=constant::getString('Menu')?></span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/store_edit.php"><?=constant::getString('Create')?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Client')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Game')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Buy date')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Price')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Payment type')?></th>
            <th class="mdl-data-table__cell--non-numeric"><?=constant::getString('Options')?></th>
          </tr>
        </thead>
        <tbody>
          <?php  if($this->clientGameArray) foreach($this->clientGameArray as $clientGame) { ?>
            <tr>
              <td class="mdl-data-table__cell--non-numeric"><?=$clientGame['client_name']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$clientGame['game_name']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$clientGame['date']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?='R$ ' . $clientGame['total_price']?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=($clientGame['payment_type']) ? 'Cartão de crédito' : 'Boleto' ?></td>
              <td class="mdl-data-table__cell--non-numeric">
                <a href="store_edit.php?id=<?=$clientGame['id']?>">
                  <i class="material-icons">mode_edit</i>
                </a>
                <a href="../../controller/clientGameController.php?id=<?=$clientGame['id']?>">
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