<?php
class Login extends Controller{

    function __construct($params) {
        parent::__construct();
        $this-> view -> controller = "Login";
        $this-> view -> page = "Check";
        
        require_once 'models/Login_model.php';
        $this -> model = new Login_model();
                
        $action = "Check"; // ustawienie domyslnej metody;
       // print_r($params);
        if(isset($params[1])) $action = ucfirst ($params[1]);

        
       $this-> $action(); //użycie zmiennej jako metody
    }
    
    private function Check(){
        $this-> view -> Render();
    }
    
    private function Spr() {
        $wynik = $this->model->Auth();
        if($wynik > 0 )
        {
            echo 'login OK!';
        } else
        {
            echo 'błędny login';
        }
            
                
                
    }
}