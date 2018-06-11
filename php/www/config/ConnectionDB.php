<?php 
class ConnectionDB {
  private static $dbconn = '';
  private static $dblink = '';
  private function __construct() {}
  private function __clone() {}
  /**
   * Get db connection resource
   */
  public static function getDBConnection(){
    if(!self::$dbconn || pg_connection_status(self::$dbconn) === PGSQL_CONNECTION_BAD)
      self::connect();
    return self::$dbconn;
  }

  public static function getDBConnectionMysql(){
    if(!self::$dblink)
      self::connectMysql();
    return self::$dblink;
  }

  /**
   * Connect to database
   */
  private static function connect(){
    self::$dbconn = pg_connect("host=tantor.db.elephantsql.com dbname=apllexzx user=apllexzx password=dv0rai7aFCh91Q1aBLD1xU29zQYXb-fQ");
    if(!self::$dbconn){
      echo "Error in connecting to database.";
      exit;
    }
  }

  private static function connectMysql(){
    self::$dblink = mysqli_connect("localhost", "id6102581_root", "root123", "id6102581_gamestore");
  }

  /**
   * Disconnect to databse
   */
  private static function disconnect(){
    pg_close(self::$dbconn);
  }
}
?>