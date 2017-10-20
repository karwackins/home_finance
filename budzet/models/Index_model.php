<?php

class Index_model extends Model {

    function __construct() {
        parent::__construct();
    }
    

    public function OkresRoz() {
        require_once 'Panel_model.php';
        $panel_model = new Panel_model();
        $okres_roz = $panel_model->OkresRozGet();
        return $okres_roz;
    }
    
    public function Kategorie() {
    $stmt = $this->pdo->prepare('SELECT kategorie.id, kategorie.nazwa, SUM(wydatki.kwota) FROM kategorie JOIN podkategorie ON kategorie.id = podkategorie.id_kategorie JOIN wydatki ON podkategorie.id = wydatki.id_podkategorie JOIN plan ON podkategorie.id = plan.id_podkategorii WHERE wydatki.data >= "'.$this->OkresRoz().'" AND plan.p_okr_roz = "'.$this->OkresRoz().'" GROUP BY kategorie.id');
    $stmt->execute();
    
    $kategorie = array();
    while ($row = $stmt->fetch()){
        $kategorie[] = $row;
    }
    return $kategorie;
    }
    
    
    public function Dane() {

    $stmt = $this->pdo->prepare('SELECT podkategorie.nazwa, SUM(wydatki.kwota), plan.kwota, kategorie.id FROM `wydatki` JOIN podkategorie ON wydatki.id_podkategorie = podkategorie.id LEFT JOIN plan ON wydatki.id_podkategorie = plan.id_podkategorii JOIN kategorie ON podkategorie.id_kategorie = kategorie.id WHERE wydatki.data >= "'.$this->OkresRoz().'" AND plan.p_okr_roz = "'.$this->OkresRoz().'" GROUP BY `id_podkategorie`');
    $stmt->execute();

    $tablica = array();
 // pobranie/wyświetlenie wyników
    while($row = $stmt->fetch())
    {
        
        $tablica[] = $row;
    }
      $stmt->closeCursor();
      
      return $tablica;
      
    }
    
    public function getSumPlan_w(){
        $stmt = $this->pdo->prepare('SELECT SUM(kwota) FROM plan WHERE p_okr_roz = "'.$this->OkresRoz().'" AND id_podkategorii != 0');
        $stmt -> execute();
        
        $plan_wydatkow = $stmt->fetch();
        
        $stmt->closeCursor();
        return $plan_wydatkow;
    }
    
    public function getSumPlan_p(){
        $stmt = $this->pdo->prepare('SELECT SUM(kwota) FROM plan WHERE p_okr_roz = "'.$this->OkresRoz().'" AND rodzaj = "p"');
        $stmt -> execute();
        
        $plan_przychodow = $stmt->fetch();
        $stmt->closeCursor();
        
        return $plan_przychodow;   
    }
    
    public function DoRozdysponowania() {
        $plan_przychod = $this->getSumPlan_p();
        $plan_wydatki = $this->getSumPlan_w();
        
        $pozostala_kwota = $plan_przychod[0] - $plan_wydatki[0];
        
        return $pozostala_kwota;
    }
    
    public function PobierzPrzychody(){
        $stmt = $this->pdo->prepare('SELECT SUM(kwota) FROM przychody WHERE data >= "'.$this->OkresRoz().'"');
        $stmt -> execute();
        
        $przychody = $stmt->fetch();
        $stmt->closeCursor();
        
        return $przychody; 
    }
    
    public function dodajWydatek()
    {
        $data = date("Y-m-d");

        $stmt = $this->pdo->prepare("INSERT INTO `wydatki`(`data`, `id_podkategorie`, `kwota`) VALUES (:data, :id_podkategorie, :kwota)");
        $stmt -> bindParam( ':data', $data );
        $stmt -> bindParam( ':id_podkategorie', $_POST['podkategorie']);
        $stmt -> bindParam( ':kwota', $_POST['kwota_wydatku'] );
        $stmt -> execute();
        header( "refresh:0;url=../");
    }
    
    public function pobierzKategorie()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM podkategorie');
        $stmt -> execute();
        
        $kategorie = $stmt->fetchall();
        $stmt->closeCursor();
        
        return $kategorie;   
    }
    
    public function OstatnieDziesiec(){
          $data = date("Y-m-d");
        $stmt = $this->pdo->prepare('SELECT wydatki.data, podkategorie.nazwa, wydatki.kwota FROM wydatki JOIN podkategorie ON wydatki.id_podkategorie = podkategorie.id WHERE wydatki.data <= "'.$data.'" AND wydatki.data >= "'.$this->OkresRoz().'" ORDER BY wydatki.id DESC LIMIT 10');
        $stmt -> execute(); 
        
        $ostatniedziesiec = $stmt->fetchall();
        $stmt->closeCursor();
        
        return $ostatniedziesiec;
    }
            

}