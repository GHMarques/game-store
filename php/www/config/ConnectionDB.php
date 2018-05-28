<?php 
class ConnectionDB {
  private static $dbconn = '';
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

  /**
   * Disconnect to databse
   */
  private static function disconnect(){
    pg_close(self::$dbconn);
  }
}
?>