<?php

class Plan extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->controller = "Plan"; //wkazuje w ktorym katalogu w views ma szukac pliku z widokiem
        $this->view->page = "Plan"; // nazwa pliku widoku
        
        require_once 'models/Plan_model.php';
        $this->model = new Plan_model;
        
        $action = "pokazPlan";
        $this->$action();
    }
    
    
    private function pokazPlan(){
        $this->view->pobierzPlan = $this->model->pobierzPlan();
        $this->view->okres_rozliczeniowy = $this->model->OkresRoz();
        $this->view->Render();
    }
    
}
