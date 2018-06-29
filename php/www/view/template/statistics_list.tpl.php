<link rel="stylesheet" href="../view/template/style.css">
<?php 
  include('../view/template/header.tpl.php');
  require_once '../config/Constant.php'; 
?>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><?=constant::getString('Menu')?></span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/client_list.php"><?=constant::getString('Clients')?></a>
    <a class="mdl-navigation__link" href="/view/store_list.php"><?=constant::getString('Store')?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <caption><h5><?=constant::getString('Main statistics')?></h5></caption>
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric right-border" colspan="2" style="text-align:center;"><?=constant::getString('Most popular game')?></th>
            <th class="mdl-data-table__cell--non-numeric right-border" colspan="3" style="text-align:center"><?=constant::getString('Most popular client')?></th>
            <th class="mdl-data-table__cell--non-numeric right-border" colspan="2" style="text-align:center"><?=constant::getString('Best day')?></th>
            <th class="mdl-data-table__cell--non-numeric right-border" colspan="2" style="text-align:center"><?=constant::getString('General')?></th>
            <th class="mdl-data-table__cell--non-numeric" colspan="3" style="text-align:center"><?=constant::getString('Best Company')?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Name')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title right-border"><?=constant::getString('Quantity')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Name')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Quantity')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title right-border"><?=constant::getString('Money spent')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Date')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title right-border"><?=constant::getString('Games sold')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Most popular payment type')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title right-border"><?=constant::getString('Total amount')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Name')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Games sold')?></td>
            <td class="mdl-data-table__cell--non-numeric sub-title"><?=constant::getString('Total amount')?></td>
          </tr>
          <tr>
            <td class="mdl-data-table__cell--non-numeric"><?=$this->popularGame->name?></td>
            <td class="mdl-data-table__cell right-border"><?=$this->popularGame->quantidade?></td>
            <td class="mdl-data-table__cell--non-numeric"><?=$this->popularClient->name?></td>
            <td class="mdl-data-table__cell"><?=$this->popularClient->quantidade?></td>
            <td class="mdl-data-table__cell right-border"><?='R$ ' . $this->popularClient->valor?></td>
            <td class="mdl-data-table__cell--non-numeric"><?=$this->popularDate->date?></td>
            <td class="mdl-data-table__cell right-border"><?=$this->popularDate->quantidade?></td>
            <td class="mdl-data-table__cell--non-numeric"><?=($this->popularPaymentType->payment_type == 0) ? constant::getString('Boleto') : constant::getString('Credit card')?></td>
            <td class="mdl-data-table__cell right-border"><?='R$ ' . $this->totalAmount->total?></td>
            <td class="mdl-data-table__cell--non-numeric"><?=$this->popularCompany->name?></td>
            <td class="mdl-data-table__cell"><?=$this->popularCompany->quantidade?></td>
            <td class="mdl-data-table__cell"><?='R$ ' . $this->popularCompany->valor?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php include('../view/template/footer.tpl.php'); ?>