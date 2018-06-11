<?php
  require_once '../config/ConnectionDB.php';
  class ClientModel {
    public $id;
    public $name;
    public $email;
    public $password;
    public $birth;
    public $street;
    public $number;
    public $state;
    public $complement;
    public $countryId;
    /**
     * Constructor
     */
    function __construct($name = null, $email = null, $password = null, $birth = null, $street = null, $number = null, $state = null, $complement = null, $countryId = null, $id = null) {
      if($id)
        $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->birth = $birth;
      $this->street = $street;
      $this->number = $number;
      $this->state = $state;
      $this->complement = $complement;
      $this->countryId = $countryId;
    }
    /**
     * Insert a new client
     */
    public function insert(){
      $sql = "INSERT INTO public.client(
        name, email, password, birth, street, \"number\", state, complement, country_id)
        VALUES ('" . $this->name . "', '" . $this->email . "', '" . $this->password . "', '" . $this->birth . "', '" . $this->street . "', '" . $this->number . "', '" . $this->state . "', '" . $this->complement . "', " . $this->countryId . ");";
      $result = pg_query(connectionDB::getDBConnection(), $sql);
    }
    /**
     * Return client by id
     */
    public function getById($id){
      $result = pg_query(connectionDB::getDBConnection(), 
        "SELECT * FROM client WHERE id=" . $id);
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_row($result);
    }
    /**
     * Return all clients with country name
     */
    public function getAll(){
      $result = pg_query(connectionDB::getDBConnection(), 
        "SELECT * FROM client ORDER BY id ASC");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_all($result);
    }
    /**
     * Return all clients with country name
     */
    public function getAllWithCountryName(){
      $result = pg_query(connectionDB::getDBConnection(), 
        "SELECT client.id, client.name as client_name, country.name as country_name, client.email, client.password, client.birth, client.street, client.\"number\", client.state, client.complement
        FROM client INNER JOIN country ON country.id=client.country_id ORDER BY client.id ASC");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_all($result);
    }

    public function getAllWithCountryNameMysql(){
      $result = mysqli_query(connectionDB::getDBConnectionMysql(), 
        "SELECT client.id, client.name as client_name, country.name as country_name, client.email, client.password, client.birth, client.street, client.\"number\", client.state, client.complement
        FROM client INNER JOIN country ON country.id=client.country_id ORDER BY client.id ASC");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    /**
     * Update the client
     */
    public function update(){
      $sql = "UPDATE client 
        SET name = '" . $this->name . "', email = '" . $this->email . "', password = '" . $this->password . "', birth = '" . $this->birth . "', street = '" . $this->street . "', \"number\" = '" . $this->number . "', state = '" . $this->state . "', complement = '" . $this->complement . "', country_id = '" . $this->countryId. "' 
        WHERE id =".$this->id;
      $result = pg_query(connectionDB::getDBConnection(), $sql);
      if(!$result){
        echo pg_last_error(connectionDB::getDBConnection());
      } 
    }

    /**
     * Delete the client
     */
    public function delete($id){
      $sql = "DELETE FROM client WHERE id =".$id;
      $result = pg_query(connectionDB::getDBConnection(), $sql);
      if(!$result){
        echo pg_last_error(connectionDB::getDBConnection());
      }
    }
  }
?>