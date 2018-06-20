<?php
  require_once '../config/ConnectionDB.php';
  class ClientGameModel {
    public $id;
    public $client;
    public $game;
    public $buyDate;
    public $price;
    public $paymentType;
    /**
     * Constructor
     */
    function __construct($client = null, $game = null, $buyDate = null, $price = null, $paymentType = null, $id = null) {
      if($id)
        $this->id = $id;
      $this->client = $client;
      $this->game = $game;
      $this->buyDate = $buyDate;
      $this->price = $price;
      $this->paymentType = $paymentType;
    }
    /**
     * Insert a new client_game
     */
    public function insert(){
      if(connectionDB::getDbType() == 0){
        $sql = "INSERT INTO public.client_game(
          client_id, game_id, date, total_price, payment_type)
          VALUES ('" . $this->client . "', '" . $this->game . "', '" . $this->buyDate . "', '" . $this->price . "', '" . $this->paymentType . "');";
        $result = pg_query(connectionDB::getDBConnection(), $sql);
      } else {
        $sql = "INSERT INTO client_game(
          client_id, game_id, date, total_price, payment_type)
          VALUES ('" . $this->client . "', '" . $this->game . "', '" . $this->buyDate . "', '" . $this->price . "', '" . $this->paymentType . "');";
        $result = mysqli_query(connectionDB::getDBConnection(), $sql);
      }
      
    }
    /**
     * Return client_game by id
     */
    public function getById($id){
      if(connectionDB::getDbType() == 0){
        $result = pg_query(connectionDB::getDBConnection(), 
          "SELECT * FROM client_game WHERE id=" . $id);
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return pg_fetch_row($result);
      } else {
        $result = mysqli_query(connectionDB::getDBConnection(), 
          "SELECT * FROM client_game WHERE id=" . $id);
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return mysqli_fetch_row($result);
      }
      
    }
    /**
     * Return all client_game
     */
    public function getAll(){
      if(connectionDB::getDbType() == 0){
        $result = pg_query(connectionDB::getDBConnection(), 
          "SELECT * FROM client_game ORDER BY id ASC");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return pg_fetch_all($result);
      } else {
        $result = mysqli_query(connectionDB::getDBConnection(), 
          "SELECT * FROM client_game ORDER BY id ASC");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      
    }
    /**
     * Return all client_game with names
     */
    public function getAllWithClientGameName(){
      if(connectionDB::getDbType() == 0){
        $result = pg_query(connectionDB::getDBConnection(), 
          "SELECT client_game.id, client.name as client_name, game.name as game_name, client_game.date, client_game.total_price, client_game.payment_type
          FROM client_game 
          INNER JOIN client ON client.id=client_game.client_id 
          INNER JOIN game ON game.id=client_game.game_id 
          ORDER BY client_game.id ASC");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return pg_fetch_all($result);
      } else {
        $result = mysqli_query(connectionDB::getDBConnection(), 
          "SELECT client_game.id, client.name as client_name, game.name as game_name, client_game.date, client_game.total_price, client_game.payment_type
          FROM client_game 
          INNER JOIN client ON client.id=client_game.client_id 
          INNER JOIN game ON game.id=client_game.game_id 
          ORDER BY client_game.id ASC");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      
    }
    /**
     * Update the client_game
     */
    public function update(){
      if(connectionDB::getDbType() == 0){
        $sql = "UPDATE client_game 
          SET client_id = '" . $this->client . "', game_id = '" . $this->game . "', date = '" . $this->buyDate . "', total_price = '" . $this->price . "', payment_type = '" . $this->paymentType . "'
          WHERE id =".$this->id;
        $result = pg_query(connectionDB::getDBConnection(), $sql);
        if(!$result){
          echo pg_last_error(connectionDB::getDBConnection());
        }
      } else {
        $sql = "UPDATE client_game 
          SET client_id = '" . $this->client . "', game_id = '" . $this->game . "', date = '" . $this->buyDate . "', total_price = '" . $this->price . "', payment_type = '" . $this->paymentType . "'
          WHERE id =".$this->id;
        $result = mysqli_query(connectionDB::getDBConnection(), $sql);
        if(!$result){
          echo "An error occurred.\n";
        }
      }
       
    }

    /**
     * Delete the client
     */
    public function delete($id){
      if(connectionDB::getDbType() == 0){
        $sql = "DELETE FROM client_game WHERE id =".$id;
        $result = pg_query(connectionDB::getDBConnection(), $sql);
        if(!$result){
          echo pg_last_error(connectionDB::getDBConnection());
        }
      } else {
        $sql = "DELETE FROM client_game WHERE id =".$id;
        $result = mysqli_query(connectionDB::getDBConnection(), $sql);
        if(!$result){
          echo "An error occurred.\n";
        }
      }
      
    }
  }
?>