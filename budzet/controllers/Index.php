<?php

class Index extends Controller{

    function __construct($params) {
        parent::__construct();
        $this-> view -> controller = "Index";
        $this-> view -> page = "News";
        
        require_once 'models/Index_model.php';
        $this -> model = new Index_model();
                
        $action = "News"; // ustawienie domyslnej metody;
       // print_r($params);
        if(isset($params[1])) $action = ucfirst ($params[1]);

        
       $this-> $action(); //użycie zmiennej jako metody
    }
    
    
    
    private function News() {
        $this->view->dane = $this-> model -> Dane();
        $this->view->plan_przychodow = $this->model->getSumPlan_p();
        $this->view->plan_wydatkow = $this->model->getSumPlan_w();
        $this->view->do_rozdysponowania = $this->model->DoRozdysponowania();
        $this->view->podkategorie = $this->model->pobierzKategorie();
        $this->view->przychody = $this->model->PobierzPrzychody();
        $this->view->ostatniedziesiec = $this->model->OstatnieDziesiec();
        $this->view->kategorie = $this->model->Kategorie();
        $this->view->okres_roz_p = $this->model->OkresRoz();
                
                
     
        
        $this-> view -> Render();
                
    }
    
    private function Insert(){
        $this->model->DodajWydatek();
    }
}
