<?php

class Controller {
    public function model($model) { 
        require_once "models/$model.php";                   // index引用過Contorller.php -> 參考位置以index為主
        return new $model ();
    }

    public function view($view, $data = Array()) {          // view 輸出成html
        require_once "views/$view.php";
    }
}

?>