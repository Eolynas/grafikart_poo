<?php

namespace App\Table;

use App\App;

class Table {
    
    protected static $table;

    public static function all() {
        return App::getDb()->query("SELECT * FROM category", __CLASS__);
//                        . "SELECT *"
//                        . "FROM category "
//                        , __CLASS__);
    }

    // Methode magique
    public function __get($key) {

        $methode = 'get' . ucfirst($key);
        $this->$key = $this->$methode();
        return $this->$key;
    }

}
