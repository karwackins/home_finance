<?php

class Nieplanowane extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->controller = "Nieplanowane"; //wkazuje w ktorym katalogu w views ma szukac pliku z widokiem
        $this->view->page = "Nieplanowane_view"; // nazwa pliku widoku
        
        require_once 'models/Nieplanowane_model.php';
        $this->model = new Nieplanowane_model;
        
        $action = "Nieplanowane";
        $this->$action();
    }
    
    
    private function Nieplanowane(){
        $this->view->pobierzNieplanowane = $this->model->pobierzNieplanowane();
        $this->view->okres_rozliczeniowy = $this->model->OkresRoz();
        $this->view->Render();
    }


}
