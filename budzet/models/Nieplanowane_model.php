<?php

class Nieplanowane_model extends Model {

    function __construct() {
        parent:: __construct();
    }
    
    public function OkresRoz() {
        require_once 'Panel_model.php';
        $panel_model = new Panel_model();
        $okres_roz = $panel_model->OkresRozGet();
        return $okres_roz;
    }
    
    public function pobierzNieplanowane() {
        $stmt = $this->pdo->prepare('SELECT podkategorie.nazwa, SUM(wydatki.kwota) FROM `wydatki` JOIN plan ON wydatki.id_podkategorie = plan.id_podkategorii JOIN podkategorie ON wydatki.id_podkategorie = podkategorie.id WHERE plan.kwota = 0.00 AND wydatki.data >= "'.$this->OkresRoz().'" AND plan.p_okr_roz >= "'.$this->OkresRoz().'"GROUP BY wydatki.id_podkategorie');
        $stmt->execute();
        
        $nieplanowane = $stmt->fetchall();
        $stmt->closeCursor();
        
        return $nieplanowane;
    }
}
