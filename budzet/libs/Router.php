<?php

class Router {

    function __construct() {
        $this->request = $_GET['url']; //pobiera adres
        $this->request = rtrim($this->request,"/"); //ucina znak /
        $this->params = explode("/", $this->request); // dzielenie stringa, tworzona jest tablica
        $this->controller = $this->params[0]; //przypisywany do kontrolera jest pierwszy element tablicy czyli to co było zaraz po / w adresie
        if($this->controller == "index.php") $this->controller = "Index"; // jeżeli pierwszy element tablicy wskazywał na index to do kontrolera przypisywane jest kontroler Index
        $this->controller = ucfirst($this->controller); // zamiana pierwszej litery kontrolera na dużą litere
        
        
        $file = 'controllers/'. $this->controller.'.php'; // do zmiennej przypisana jest scieżka z plikiem kontrolera
        if (file_exists($file))
            {
            require_once $file;
            $this->control = new $this->controller($this->params);
            } else{
                echo 'Nieznana strona';
            }
            
    }

}