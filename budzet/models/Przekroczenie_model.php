<?php

class Przekroczenie_model extends Model {

    function __construct() {
        parent:: __construct();
    }
    
    function OkresRoz()
    {
        require_once 'Panel_model.php';
        $panel_model = new Panel_model();
        $okres_roz = $panel_model->OkresRozGet();
        return $okres_roz;
    }


    public function pobierzPrzekroczone() {
        $stmt = $this->pdo->prepare('SELECT podkategorie.nazwa, SUM(wydatki.kwota), plan.kwota FROM `wydatki` JOIN plan ON wydatki.id_podkategorie = plan.id_podkategorii JOIN podkategorie ON wydatki.id_podkategorie = podkategorie.id WHERE plan.kwota < wydatki.kwota AND wydatki.data >= "2017-09-01" GROUP BY wydatki.id_podkategorie');
        $stmt->execute();
        
        $przekroczone = $stmt->fetchall();
        $stmt->closeCursor();
        
        return $przekroczone;
    }
}
