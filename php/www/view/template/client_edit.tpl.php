<link rel="stylesheet" href="../view/template/style.css">
<script type="text/javascript" src="../view/template/jsFunctions.js"></script>
<?php 
  include('../view/template/header.tpl.php');
  require_once '../config/Constant.php';
?>

<div class="mdl-layout__drawer">
  <span class="mdl-layout-title"><?=constant::getString('Menu')?></span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/client_list.php"><?=constant::getString('Search')?></a>
    <a class="mdl-navigation__link" href=""><?=constant::getString('Update')?></a>
    <a class="mdl-navigation__link" href=""><?=constant::getString('Delete')?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <div class="mdl-card mdl-shadow--6dp">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
          <h2 class="mdl-card__title-text"><?=($this->client) ? constant::getString('Edit client') : constant::getString('Create client')?></h2>
        </div>
        <div class="mdl-card__supporting-text">
          <form method="POST" onsubmit="return validate(this);" action="../../controller/clientController.php" name="creatForm" enotype="multipart/form-data">
            <input class="mdl-textfield__input" type="hidden" id="id" name="id" value="<?= ($this->client) ? $this->client[0] : '' ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-name">
              <input class="mdl-textfield__input" type="text" id="name" name="name" pattern="[A-Z,a-z,\s]*" value="<?= ($this->client) ? $this->client[1] : '' ?>">
              <label class="mdl-textfield__label" for="name"><?=constant::getString('Name')?>*</label>
              <span class="mdl-textfield__error"><?=constant::getString('Only alphabet, please!')?></span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-email">
              <input class="mdl-textfield__input" type="email" id="email" name="email" value="<?= ($this->client) ? $this->client[2] : '' ?>">
              <label class="mdl-textfield__label" for="email"><?=constant::getString('Email')?>*</label>
              <span class="mdl-textfield__error"><?=constant::getString('Must be a valid email!')?></span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-password">
              <input class="mdl-textfield__input" type="password" id="password" name="password" value="<?= ($this->client) ? $this->client[3] : '' ?>">
              <label class="mdl-textfield__label" for="password"><?=constant::getString('Password')?>*</label>
            </div>
            <?php 
              if(!$this->client){ ?>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-confirm-password">
                <input class="mdl-textfield__input" type="password" id="confirmPassword" name="confirmPassword">
                <label class="mdl-textfield__label" for="confirmPassword"><?=constant::getString('Confirm password')?>*</label>
                <span class="mdl-textfield__error"><?=constant::getString('Password and confirm password must be equal!')?></span>
            </div>
            <?php
              }
            ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-birth">
              <input class="mdl-textfield__input" type="date" id="birth" name="birth" value="<?= ($this->client) ? $this->client[4] : '2013-07-24' ?>">
              <label class="mdl-textfield__label" for="birth"><?=constant::getString('Birth')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-street">
              <input class="mdl-textfield__input" type="text" id="street" name="street" value="<?= ($this->client) ? $this->client[5] : '' ?>">
              <label class="mdl-textfield__label" for="street"><?=constant::getString('Street')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-number">
              <input class="mdl-textfield__input" type="text" id="number" name="number" value="<?= ($this->client) ? $this->client[6] : '' ?>">
              <label class="mdl-textfield__label" for="number"><?=constant::getString('Number')?>*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="div-state">
              <input class="mdl-textfield__input" type="text" id="state" name="state" pattern="[A-Z,a-z,\s]*" value="<?= ($this->client) ? $this->client[7] : '' ?>">
              <label class="mdl-textfield__label" for="state"><?=constant::getString('State')?>*</label>
              <span class="mdl-textfield__error"><?=constant::getString('Only alphabet, please!')?></span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="complement" name="complement" optional value="<?= ($this->client) ? $this->client[8] : '' ?>">
              <label class="mdl-textfield__label" for="complement"><?=constant::getString('Complement')?></label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input" id="country" name="country">
                <?php foreach($this->countryArray as $country) { ?>
                  <option value="<?=$country[id]?>" <?= ($this->client[9] ===$country[id] ) ? 'selected' : '' ?>><?=$country[name]?></option>
                <?php } ?>
              </select>
              <label class="mdl-textfield__label" for="country"><?=constant::getString('Country')?>*</label>
            </div>
            <div>
              <p>* <?=constant::getString('Required fields')?></p>
            <div>
              <div class="right-align">
                <button  class="mdl-button mdl-button--raised mdl-button--colored" value="<?= ($this->client) ? 'Edit' : 'Create' ?>" name ="submit"><?=($this->client) ? constant::getString('Edit') : constant::getString('Create')?></button>
              </div>
              <?php if($this->client){ ?>
                <div class="left-align">
                  <button type="button" class="mdl-button mdl-button--raised mdl-button--colored show-modal"><?=constant::getString('Delete')?></button>
                </div>
              <?php } ?>
            </div>
            <dialog class="mdl-dialog">
              <div class="mdl-dialog__content">
                <p>
                  <?=constant::getString('Are you sure you want to delete this client?')?>
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

