<?php
  require_once '../config/ConnectionDB.php';
  class CountryModel {
    public function __construct() {}
    public function getAll(){
      $result = pg_query(connectionDB::getDBConnection(), "SELECT * FROM country");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_all($result);
    }

    public function getAllMysql(){
      $result = mysqli_query(connectionDB::getDBConnectionMysql(), "SELECT * FROM country");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
  }
?>