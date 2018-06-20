<?php
  require_once '../config/ConnectionDB.php';
  class GameModel {
    public function __construct() {}

    public function getAll(){
      if(connectionDB::getDbType() == 0){
        $result = pg_query(connectionDB::getDBConnection(), "SELECT * FROM game");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return pg_fetch_all($result);
      } else {
        $result = mysqli_query(connectionDB::getDBConnection(), "SELECT * FROM game");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      
    }
  }
?>