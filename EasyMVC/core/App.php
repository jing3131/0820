<?php

class App {
    
    public function __construct() {
        $url = $this->parseUrl();
        
        $controllerName = "{$url[0]}Controller";                       // 一個類別名稱(HomeController)
        if (!file_exists("controllers/$controllerName.php"))
            return;
        require_once "controllers/$controllerName.php";                // index引用過App.php -> 參考位置以index為主
        $controller = new $controllerName;                             // 根據一個變數儲存的內容(HomeController)呼叫(新增)物件
        $methodName = isset($url[1]) ? $url[1] : "index";              // $url[1]->  controller裡的function
        if (!method_exists($controller, $methodName))
            return;
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();                 // $params一個陣列，如果$params還有內容($url[2])，把它變陣列 -> function裡的參數
        call_user_func_array(Array($controller, $methodName), $params);
    }
    
    public function parseUrl() {
        if (isset($_GET["url"])) {                      // "url" -> .htaccess
            $url = rtrim($_GET["url"], "/");            // 清除字尾的 "/"含以後的字元
            $url = explode("/", $url);                  // 用 "/" 做分隔拆成陣列
            return $url;
        }
    }
    
}

?>