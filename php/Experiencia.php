<?php

require_once('DBAbstractModel.php');

class Experiencia extends DBAbstractModel {

    function __construct() {
        $this->db_name = "a18paucaltov_g1";
    }

    public function selectUltimesExperiencies() {
        $this->query = "SELECT * FROM experiencia ORDER BY fecha_publ DESC LIMIT 6";
        $this->get_results_from_query();

        if (count($this->rows)==1) {
            foreach ($this->rows[0] as $property => $value)
            $this->$property = $value;
        }

        return $this->rows;
    }

    public function selectUltimesExperienciesSenseLimits() {
        $this->query = "SELECT * FROM experiencia ORDER BY fecha_publ";
        $this->get_results_from_query();

        if (count($this->rows)==1) {
            foreach ($this->rows[0] as $property => $value)
            $this->$property = $value;
        }

        return $this->rows;
    }

    public function selectOneExperiencia($id){
        $this->query = "SELECT experiencia.* , categoria.nom FROM experiencia inner join categoria where experiencia.id_cat = categoria.id  and experiencia.id = $id ";
        $this->get_results_from_query();

        if (count($this->rows)==1) {
            foreach ($this->rows[0] as $property => $value)
            $this->$property = $value;
        }

        return $this->rows;
    }

    public function crearExperiencia($titulo, $contenido, $imagen, $coordenada){
        $this->query = "INSERT INTO experiencia (titol, contingut, imatge, coordenadas) VALUES ('$titulo', '$contenido', '$imagen', '$coordenada')";
        $this->execute_single_query();

        return "OK";
    }

    public function eliminarExperiencia($id){
        $this->query = "DELETE FROM experiencia WHERE id = '$id'";
        $this->execute_single_query();
    }
    
    public function editarExperiencia($id, $titulo, $contenido, $imagen, $coordenada){
        $this->query = "UPDATE experiencia SET titol = '$titulo', contingut = '$contenido', imatge = '$imagen', coordenadas = '$coordenada' WHERE id = '$id'";
        $this->execute_single_query();

        return "OK";
    }

    public function addLike($id){
        $this->query = "UPDATE experiencia SET valoracioPos = valoracioPos+1 where id= '$id'";
        $this->execute_single_query();
        
        return "OK";
    }
    public function disLike($id){
        $this->query = "UPDATE experiencia SET valoracioNeg = valoracioNeg+1 where id= '$id'";
        $this->execute_single_query();
        
        return "OK";
    }
}

?>