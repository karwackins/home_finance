<?php


class Admin extends Controller {
    function __construct($params) {
        parent::__construct();
        $this-> view -> controller = "Admin";
        $this-> view -> page = "Panel";
        
        require_once 'models/Panel_model.php';
        $this -> model = new Panel_model();
                
        $action = "Panel"; // ustawienie domyslnej metody;
       // print_r($params);
        if(isset($params[1])) $action = ucfirst ($params[1]);

        
       $this-> $action(); //użycie zmiennej jako metody
}

    public function Panel() {
        $this->view->okres_roz_p = $this->model->OkresRozGet();
        $this->view->Render();
    
}
    public function OkresRozUp() {
        $this->model->OkresRozUp();
    
}
    public function Plan() {
        $this->view->page = 'Plan';
        require_once 'models/Plan_model.php';
        $this->model = new Plan_model();
        $sprawdz_plan = $this->model->sprawdzPlan();
        if($sprawdz_plan > 0){
            $this->view->ustawPlan = $this->model->pobierzPlan();
        }else
        {
            $this->view->ustawPlan = $this->model->ustawPlan();
        } 
        $this->view->okresRoz = $this->model->OkresRoz();
        $this->view->Render();
    }
    
    public function zapiszPlan() {
        require_once 'models/Plan_model.php';
        $this->model = new Plan_model();
        $this->model->zapiszPlan();
    }
}
