<?php
   /** User: Tayyab Ali .. */
  namespace app\core;
  use \app\core\Controller;

  /**
   * class Application
   * 
   * @author Tayyab Ali <mushtaqahmeda680@gmail.com>
   * @package app\core
   */
   class Application{
     public static string $ROOT_DIR;
     public Router $router;
     public Request $request;
     public Response $response;
     public Controller $controller;
     public static Application $app;
   	 public function __construct($rootPath){
         self::$ROOT_DIR = $rootPath;
         self::$app = $this;
         $this->request = new Request();
         $this->response = new Response();
   	  $this->router = new Router($this->request, $this->response);
   	 }
       // public function getController(){
       //   return $this->controller;
       // }

       // public function setController() : void  {
       //   $this->controller;
       // }
     public function run(){
        echo $this->router->resolve();
     }
   }
?>