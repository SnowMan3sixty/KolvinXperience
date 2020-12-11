<?php

require_once('DBAbstractModel.php');

class User extends DBAbstractModel {
  private $id;
  private $titol;
  private $data_creacio;
  private $data_publicacio;
  private $descripcio;
  private $url_imatge;
  private $likes;
  private $dislikes;
  private $estado;
  private $id_categoria;
  
  function __construct() {
    $this->db_name = "a18rubonclop_kx";
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->id . ", " . $this->titol . ", " . $this->data_creacio . ", " .  
      $this->data_publicacio . ", " . $this->descripcio .", " . $this->url_imatge . 
      ", " . $this->likes . ", " . $this->dislikes . ", " . $this->estado
      . ", " . $this->id_categoria ")";
  }
  
  function __destruct() {
    unset ($this);
  }
  
  public function select($id="") {
    if ($id!="") {
      $this->query = "SELECT id, titol, data_creacio, data_publicacio, descripcio, url_imatge, likes, dislikes, estado, id_categoria
                    FROM experiencia
                    WHERE id='$id'";
      $this->get_results_from_query();
    }
    // Any register selected
    if (count($this->rows)==1) {
      foreach ($this->rows[0] as $property => $value)
        $this->$property = $value;
      }
  }
  
  public function insert($experienciaData = array()) {
    
    if (array_key_exists("id", $experienciaData)) {
      $this->select($experienciaData["id"]);
      if ($experienciaData["id"]!= $this->id) {
        foreach ($experienciaData as $property => $value)
          $$property = $value;
        $this->query="INSERT INTO experiencia (titol, data_creacio, data_publicacio, descripcio, url_imatge, likes, dislikes, estado, id_categoria)
                      VALUES ('$titol', '$data_creacio', '$data_publicacio', '$descripcio', '$url_imatge', '$likes', '$dislikes', '$estado', '$id_categoria')";
        $this->execute_single_query();
      }
      
    }
  }
  
  public function update ($experienciaData = array()) {
    foreach ($experienciaData as $property => $value)
      $$property = $value;
    $this->query = "UPDATE experiencia SET titol='$titol', data_publicacio= '$data_publicacio',
    descripcio = '$descripcio', url_imatge = '$url_imatge', likes = '$likes' , 
    dislikes='$dislikes', estado = '$estado' , id_categoria= '$id_categoria'
        WHERE id='$id'";
    $this->execute_single_query($this->query);
  }
  
  public function delete ($experienciaId="") {
    $this->query = "DELETE FROM experiencia WHERE id ='$experienciaId'";
    $this->execute_single_query($this->query);
  }
 
    
}

?>