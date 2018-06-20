<link rel="stylesheet" href="../view/template/style.css">
<script type="text/javascript" src="../view/template/jsFunctions.js"></script>
<?php 
  include('../view/template/header.tpl.php');
  require_once '../config/Constant.php';
?>

<div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><?=constant::getString('Menu')?></span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/store_list.php"><?=constant::getString('Search')?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <div class="mdl-card mdl-shadow--6dp">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
          <h2 class="mdl-card__title-text"><?=($this->clientGame) ? constant::getString('Edit buy') : constant::getString('Create buy')?></h2>
        </div>
        <div class="mdl-card__supporting-text">
          <form method="POST" onsubmit="return validateBuy(this);" action="../../controller/clientGameController.php" name="creatForm" enotype="multipart/form-data">
            <input class="mdl-textfield__input" type="hidden" id="id" name="id" value="<?= ($this->clientGame) ? $this->clientGame[0] : '' ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input" id="client" name="client">
                <?php foreach($this->clientArray as $client) { ?>
                  <option value="<?=$client['id']?>" <?= ($this->clientGame[1] === $client['id'] ) ? 'selected' : '' ?>><?=$client['name'] . ' - ' . $client['email']?></option>
                <?php } ?>
              </select>
              <label class="mdl-textfield__label" for="client"><?=constant::getString('Client')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input" id="game" name="game">
                <?php foreach($this->gameArray as $game) { ?>
                  <option value="<?=$game['id']?>" <?= ($this->clientGame[2] === $game['id'] ) ? 'selected' : '' ?>><?=$game['name'] . ' - R$ ' . $game['price']?></option>
                <?php } ?>
              </select>
              <label class="mdl-textfield__label" for="game"><?=constant::getString('Game')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-buyDate">
              <input class="mdl-textfield__input" type="date" id="buyDate" name="buyDate" value="<?= ($this->clientGame) ? $this->clientGame[3] : '2013-07-24' ?>">
              <label class="mdl-textfield__label" for="buyDate"><?=constant::getString('Buy date')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-price">
              <input class="mdl-textfield__input" type="text" id="price" name="price" value="<?= ($this->clientGame) ? $this->clientGame[4] : '' ?>">
              <label class="mdl-textfield__label" for="price"><?=constant::getString('Price')?>*</label>
              <span class="mdl-textfield__error"><?=constant::getString('Must be a number!')?></span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input" id="paymentType" name="paymentType">
                <?php foreach($this->paymentTypeArray as $key=>$paymentType) { ?>
                  <option value="<?=$key?>" <?= ($this->clientGame[5] == $key ) ? 'selected' : '' ?>><?=$paymentType?></option>
                <?php } ?>
              </select>
              <label class="mdl-textfield__label" for="paymentType"><?=constant::getString('Payment type')?>*</label>
            </div>
            <div>
              <p>* <?=constant::getString('Required fields')?></p>
            <div>
              <div class="right-align">
                <button  class="mdl-button mdl-button--raised mdl-button--colored" value="<?= ($this->clientGame) ? 'Edit' : 'Create' ?>" name ="submit"><?=($this->clientGame) ? constant::getString('Edit') : constant::getString('Create')?></button>
              </div>
              <?php if($this->clientGame){ ?>
                <div class="left-align">
                  <button type="button" class="mdl-button mdl-button--raised mdl-button--colored show-modal"><?=constant::getString('Delete')?></button>
                </div>
              <?php } ?>
            </div>
            <dialog class="mdl-dialog">
              <div class="mdl-dialog__content">
                <p>
                  <?=constant::getString('Are you sure you want to delete this buy?')?>
                </p>
              </div>
              <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                <button class="mdl-button" value="Delete" name ="submit"><?=constant::getString('Agree')?></button>
                <button type="button" class="mdl-button close"><?=constant::getString('Disagree')?></button>
              </div>
            </dialog>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php include('../view/template/footer.tpl.php'); ?>

