<?php
namespace app\core;
/**
 * 
 */
class Application
{
	 public static string $ROOT_DIR;
	 public Router $router;
	 public Request $request;
     public Response $response;
     public Session $session;
     public Database $db;
     public static Application $app;
     public Controller $controller;
	
	public function __construct($rootpath, array $config)
	{
		self::$ROOT_DIR = $rootpath;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->router  = new Router($this->request, $this->response);
		$this->db = new Database($config['db']);
	}
	public function run(){
		echo $this->router->resolve();
	}
	public function getController(){

	}
	public function setController(){

	}

}


?>