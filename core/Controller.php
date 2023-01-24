<?php
 namespace app\core;

 class Controller
 {
     public string $layout = 'main';
     public function setLayout($layout){
        $this->layout = $layout;
     }
 	 function render($view, $params = []){
            return Application::$app->router->randerView($view , $params);
 	 }
 }

?>