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

    public function selectExperiencia(){
        
    }
    
}

?>