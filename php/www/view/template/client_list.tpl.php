<?php include('../view/template/header.tpl.php'); ?>
<div class="mdl-layout__drawer">
  <span class="mdl-layout-title">Menu</span>
  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="/view/client_edit.php">Create</a>
    <a class="mdl-navigation__link" href="">Update</a>
    <a class="mdl-navigation__link" href="">Delete</a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid center-items">
      <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th class="mdl-data-table__cell--non-numeric">Email</th>
            <th class="mdl-data-table__cell--non-numeric">Password</th>
            <th class="mdl-data-table__cell--non-numeric">Birth</th>
            <th class="mdl-data-table__cell--non-numeric">Street</th>
            <th class="mdl-data-table__cell--non-numeric">Number</th>
            <th class="mdl-data-table__cell--non-numeric">State</th>
            <th class="mdl-data-table__cell--non-numeric">Complement</th>
            <th class="mdl-data-table__cell--non-numeric">Country</th>
            <th class="mdl-data-table__cell--non-numeric">Options</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($this->clientArray as $client) { ?>
            <tr>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[client_name]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[email]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[password]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[birth]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[street]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[number]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[state]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[complement]?></td>
              <td class="mdl-data-table__cell--non-numeric"><?=$client[country_name]?></td>
              <td class="mdl-data-table__cell--non-numeric">
                <a href="client_edit.php?function=edit&id=<?=$client[id]?>">
                  <i class="material-icons">mode_edit</i>
                </a>
                <a href="client_edit.php?function=delete&id=<?=$client[id]?>">
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