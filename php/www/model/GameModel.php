<?php
  require_once '../config/ConnectionDB.php';
  class GameModel {
    public function __construct() {}

    public function getAll(){
      $result = pg_query(connectionDB::getDBConnection(), "SELECT * FROM game");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_all($result);
    }
  }
?>