<?php 
class ConnectionDB {
  private static $dbconn = '';
  private static $dblink = '';
  //0 = postgresql; 1 = mysql
  private static $dbType = 0;
  private function __construct() {}
  private function __clone() {}
  /**
   * Get db connection resource
   */
  public static function getDBConnection(){
    if(self::$dbType == 0){
      if(!self::$dbconn || pg_connection_status(self::$dbconn) === PGSQL_CONNECTION_BAD)
        self::connect();
      return self::$dbconn;
    } else{
      if(!self::$dblink)
        self::connectMysql();
      return self::$dblink;
    }
    
  }

  /**
   * Connect to database
   */
  private static function connect(){
    self::$dbconn = pg_connect("host=postgres dbname=game-store user=postgres password=postgres");
    if(!self::$dbconn){
      echo "Error in connecting to database.";
      exit;
    }
  }

  private static function connectMysql(){
    self::$dblink = mysqli_connect("localhost", "id6102581_root", "root123", "id6102581_gamestore");
    if(!self::$dblink){
      echo "Error in connecting to database.";
      exit;
    }
  }

  /**
   * Disconnect to databse
   */
  private static function disconnect(){
    pg_close(self::$dbconn);
  }

  public static function getDbType(){
    return self::$dbType;
  }
}
?>