<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function whatsMyIP()
    { 
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;
                }
            }
        }
    }

    return $ip;
    }

    
    public function Auth()
    {
        //$login = $_POST['login'];
        //$password = $_POST['password'];
        $stmt = $this->pdo->prepare("SELECT `login`, `pass`, `ip` FROM pracownicy WHERE login = :login AND pass = :password AND ip = :ip");
        $stmt -> bindParam( ':login', $_POST['login']);
        $stmt -> bindParam( ':password', $_POST['password']);
        $stmt -> bindParam( ':ip', '46.134.123.205');
        $stmt -> execute();
            
        $count = $stmt->rowCount();
        
        
     
        return $count;

    }
}

