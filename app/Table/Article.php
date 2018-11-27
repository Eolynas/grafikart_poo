<?php

namespace App\Table;

use App\App;

class Article {
    
    public static function getLast(){
        //return App::getDb()->query('SELECT * FROM blog', __CLASS__);
        return App::getDb()->query(""
                . "SELECT blog.id, blog.title, blog.content, category.title as category "
                . "FROM blog "
                . "LEFT JOIN category "
                . "ON blog.category_id = category.id"
                , __CLASS__);
        closeCursor();        
        
    }
    
     // Methode magique
    public function __get($key) {

        $methode = 'get' . ucfirst($key);
        $this->$key = $this->$methode();
        return $this->$key;
    }

    public function getUrl() {
        return 'index.php?p=article&id=' . $this->id;
        
    }
    public function getExtrait() {
        $html = '<p>' . substr($this->content,0 , 150) . '...</p>';
        
        $html .= '<p><a href="' . $this->getUrl() . '"> Voir la suite </a></p>';
        return $html;
    }
    
    
}
