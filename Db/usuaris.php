<?php

    require_once('DBAbstractModel.php');

    class User extends DBAbstractModel {
    private $nom;
    private $contraseña;
    private $email;
    private $admin_role;
    private $id;
    
    function __construct() {
        $this->db_name = "a18rubonclop_kx";
    }
    
    function __toString() {
        echo "entro string <br>";
        return "(" . $this->id . ", " . $this->nom . ", " . $this->contraseña . ", " .  
        $this->email . ", " . $this->admin_role . ")";
    }
    
    function __destruct() {
        //unset($this);
    }
    
    public function select($userName="") {
        if ($userName!="") {
        $this->query = "SELECT id, nom, contraseña, email, admin_role
                        FROM usuari
                        WHERE userName='$userName'";
        $this->get_results_from_query();
        }
        // Any register selected
        if (count($this->rows)==1) {
        foreach ($this->rows[0] as $property => $value)
            $this->$property = $value;
        }
    }
    
    public function insert($userData = array()) {
        
        if (array_key_exists("nom", $userData)) {
        $this->select($userData["nom"]);
        if ($userData["nom"]!= $this->nom) {
            foreach ($userData as $property => $value)
            $$property = $value;
            $this->query="INSERT INTO usuari (nom, contraseña, email,admin_role)
                        VALUES ('$nom', '$contraseña', '$email', '$admin_role')";
            $this->execute_single_query();
        }
        
        }
    }
    
    public function update ($userData = array()) {
        foreach ($userData as $property => $value)
        $$property = $value;
        $this->query = "UPDATE usuari SET nom='$nom', contraseña= '$contraseña',
        email = '$email',admin_role='$admin_role' WHERE id='$id'";
        $this->execute_single_query($this->query);
    }
    
    public function delete ($userId="") {
        $this->query = "DELETE FROM usuari WHERE  ='$id'";
        $this->execute_single_query($this->query);
    }
    
        
    }

?>
