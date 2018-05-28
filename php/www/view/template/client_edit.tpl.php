<link rel="stylesheet" href="../view/template/style.css">
<?php include('../view/template/header.tpl.php'); ?>
<?php 
  
?>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title">Menu</span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/client_list.php">Read</a>
    <a class="mdl-navigation__link" href="">Update</a>
    <a class="mdl-navigation__link" href="">Delete</a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <div class="mdl-card mdl-shadow--6dp">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
          <h2 class="mdl-card__title-text">Create client</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <form method="POST" action="../../controller/clientController.php" name="creatForm" enotype="multipart/form-data">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="name" pattern="[A-Z,a-z,\s]*">
              <label class="mdl-textfield__label" for="name">Name</label>
              <span class="mdl-textfield__error">Only alphabet, please!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="email" id="email" name="email">
              <label class="mdl-textfield__label" for="email">Email</label>
              <span class="mdl-textfield__error">Must be a valid email!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="password" id="password" name="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="password" id="confirmPassword" name="confirmPassword">
              <label class="mdl-textfield__label" for="confirmPassword">Confirm password</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="date" id="birth" value="2013-07-24" name="birth">
              <label class="mdl-textfield__label" for="birth">Birth</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="street" name="street">
              <label class="mdl-textfield__label" for="street">Street</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="number" name="number">
              <label class="mdl-textfield__label" for="number">Number</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="state" name="state">
              <label class="mdl-textfield__label" for="state">State</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="complement" name="complement" optional>
              <label class="mdl-textfield__label" for="complement">Complement</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <select class="mdl-textfield__input" id="country" name="country">
                <?php foreach($this->countryArray as $country) { ?>
                  <option value="<?=$country[id]?>"><?=$country[name]?></option>
                <?php } ?>
              </select>
              <label class="mdl-textfield__label" for="country">Country</label>
            </div>
            <button  class="mdl-button mdl-button--raised mdl-button--colored" value="Submit" name ="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include('../view/template/footer.tpl.php'); ?>