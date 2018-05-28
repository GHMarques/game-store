<?php
  require_once '../config/ConnectionDB.php';
  class ClientModel {
    private $name;
    private $email;
    private $password;
    private $birth;
    private $street;
    private $number;
    private $state;
    private $complement;
    private $countryId;
    /**
     * Constructor
     */
    function __construct() {}
    function __construct1($name, $email, $password, $birth, $street, $number, $state, $complement, $countryId) {
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
     * Return all clients with country name
     */
    public function getAll(){
      $result = pg_query(connectionDB::getDBConnection(), 
        "SELECT * FROM client ");
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
        FROM client INNER JOIN country ON country.id=client.country_id");
      if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
      return pg_fetch_all($result);
    }
  }
?>