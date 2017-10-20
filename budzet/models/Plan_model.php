 <?php

class Plan_model extends Model {

    function __construct() {
        parent:: __construct();
    }
    
    public function OkresRoz() {
        require_once 'Panel_model.php';
        $panel_model = new Panel_model();
        $okres_roz = $panel_model->OkresRozGet();
        return $okres_roz;
    }
    
    public function sprawdzPlan(){
        $stmt = $this->pdo->prepare('SELECT * FROM plan WHERE p_okr_roz = "'.$this->OkresRoz().'"');
        $stmt->execute();
        $wynik = $stmt->rowCount();
        return $wynik;
    }
    
    public function ustawPlan() {
        $stmt = $this->pdo->prepare('SELECT podkategorie.id, podkategorie.nazwa  FROM podkategorie');
        $stmt->execute();
        
        $ustaw_plan = $stmt->fetchAll();
        return $ustaw_plan;
    }
    
    public function pobierzPlan() {
        $stmt = $this->pdo->prepare('SELECT podkategorie.id, podkategorie.nazwa, plan.kwota FROM plan JOIN podkategorie ON podkategorie.id = plan.id_podkategorii JOIN kategorie ON kategorie.id = podkategorie.id_kategorie WHERE plan.p_okr_roz = "'.$this->OkresRoz().'"');
        $stmt->execute();
        
        $plan = $stmt->fetchall();
        $stmt->closeCursor();
        
        return $plan;
    }
    
    public function zapiszPlan() {
       $sprawdz_plan = $this->sprawdzPlan();
       $okres_roz = $this->OkresRoz();
       $nr = 1;
       if($sprawdz_plan == 0){
           while(isset($_POST['podkategoria'.$nr]))
            {
               $stmt = $this->pdo->prepare("INSERT INTO `plan` (`p_okr_roz`, `id_podkategorii`, `kwota`) VALUES (:okres_roz, :id_podkategorii, :kwota)");
               $stmt -> bindParam( ':okres_roz', $okres_roz );
               $stmt -> bindParam( ':id_podkategorii', $_POST['podkategoria'.$nr] );
               $stmt -> bindParam( ':kwota', $_POST['plan'.$nr] );
               $stmt -> execute();
               echo $okres_roz.' '.$_POST['podkategoria'.$nr].' '.$_POST['plan'.$nr].'<br />';
               $nr++;
            }
           }else{
               while(isset($_POST['podkategoria'.$nr]))
                {
                   $stmt = $this->pdo->prepare("UPDATE `plan` SET `kwota` = :kwota WHERE id_podkategorii = :id_podkategorii AND p_okr_roz = :okres_roz");
                   $stmt -> bindParam( ':okres_roz', $okres_roz );
                   $stmt -> bindParam( ':id_podkategorii', $_POST['podkategoria'.$nr] );
                   $stmt -> bindParam( ':kwota', $_POST['plan'.$nr] );
                   $stmt -> execute();
                   $nr++;
                }
                }
       
         header( "refresh:0;url=../");

    }
}
