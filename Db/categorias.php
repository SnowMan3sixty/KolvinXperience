<?php

require_once('DBAbstractModel.php');

class User extends DBAbstractModel {
  private $id;
  private $nombre;

  function __construct() {
    $this->db_name = "a18rubonclop_kx";
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->id . ", " . $this->nombre . ")";
  }
  
  function __destruct() {
    unset ($this);
  }
  
  public function select($id="") {
    if ($id!="") {
      $this->query = "SELECT id, nombre
                    FROM categoria
                    WHERE id='$id'";
      $this->get_results_from_query();
    }
    // Any register selected
    if (count($this->rows)==1) {
      foreach ($this->rows[0] as $property => $value)
        $this->$property = $value;
      }
  }
  
  public function insert($categoryData = array()) {
    
    if (array_key_exists("nombre", $nombre)) {
      $this->select($categoryData["id"]);
      if ($categoryData["nombre"]!= $this->nombre) {
        foreach ($categoryData as $property => $value)
          $$property = $value;
        $this->query="INSERT INTO categoria (nombre)
                      VALUES ('$nombre')";
        $this->execute_single_query();
      }
      
    }
  }
  
  public function update ($categoryData = array()) {
    foreach ($categoryData as $property => $value)
      $$property = $value;
    $this->query = "UPDATE categoria SET nombre='$nombre' WHERE id='$id'";
    $this->execute_single_query($this->query);
  }
  
  public function delete ($id="") {
    $this->query = "DELETE FROM categoria WHERE id ='$id'";
    $this->execute_single_query($this->query);
  }
 
    
}

?>
