<?php

class Przekroczenie extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->controller = "Przekroczenie"; //wkazuje w ktorym katalogu w views ma szukac pliku z widokiem
        $this->view->page = "Przekroczenie_view"; // nazwa pliku widoku
        
        require_once 'models/Index_model.php';
        $this->model = new Index_model();
        
        $action = "PrzekroczeniePlanu";
        $this->$action();
    }
    
    
    private function PrzekroczeniePlanu(){
        $this->view->pobierzPrzekroczone = $this->model->Dane();
        $this->view->okres_rozliczeniowy = $this->model->OkresRoz();
        $this->view->Render();
    }


}
