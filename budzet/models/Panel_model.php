<?php

class Panel_model extends Model {
    function __construct() {
        parent::__construct();
    }
    
    public function OkresRozGet() {
        $stmt = $this->pdo->prepare('SELECT data_rozp FROM okres_rozlicz');
        $stmt->execute();
        
        $okres_roz_p = $stmt->fetch(PDO::FETCH_OBJ);
        return $okres_roz_p->data_rozp;
    }
    
    public function OkresRozUp() {
        $stmt = $this->pdo->prepare('UPDATE okres_rozlicz SET data_rozp = :data_rozp ');
        $stmt -> bindParam(':data_rozp', $_POST['data_rozp']);
        $stmt->execute();
        header("refresh:0;url=./");
}
    
    
}
