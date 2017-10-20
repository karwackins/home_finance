<?php

class View {

    function __construct() {
        
    }
    
    public function Render() {
        require_once 'views/Header.php';
        //echo $this-> controller; 
        require_once 'views/' . $this->controller. '/' . $this->page .'.php';
        
    }

}