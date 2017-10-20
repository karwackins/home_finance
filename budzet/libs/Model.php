<?php

class Model {

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost; dbname=budzet', 'root', '');
        $this->pdo->query ('SET NAMES utf8');
        $this->pdo->query ('SET CHARACTER_SET utf8_unicode_ci');
    }
    
    function Select($select = "*", $from = null, $where = null, $orderBy = null, $limit = null) {
        $query = "SELECT ". $select;
        if($from != null) $query .= " FROM ".$from;
        return $this-> pdo -> exec($query);
    }

}

