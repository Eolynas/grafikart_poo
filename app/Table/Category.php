<?php

namespace App\Table;

use App\App;

class Category {

    protected static $table = 'catogory';

    public static function all() {
        return App::getDb()->query("SELECT * FROM category", __CLASS__);
//                        . "SELECT *"
//                        . "FROM category "
//                        , __CLASS__);
   
    }

    public function getUrl() {
        return 'index.php?p=category&id=' . $this->id;
    }

}
