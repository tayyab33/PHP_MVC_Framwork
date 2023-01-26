<?php
namespace app\core;
use \app\core\DbModel;
/**
 * 
 */
class Application
{
	 public static string $ROOT_DIR;

	 public string $userClass;
	 public Router $router;
	 public Request $request;
     public Response $response;
     public Session $session;
     public Database $db;
     public static Application $app;
     public Controller $controller;
     public ?DbModel $user;
	
	public function __construct($rootpath, array $config)
	{
		$this->userClass = $config['userClass'];
		self::$ROOT_DIR = $rootpath;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->router  = new Router($this->request, $this->response);
		$this->db = new Database($config['db']);
		$primaryValue = $this->session->get('user');
		if($primaryValue){
       $primaryKey = (new $this->userClass)->primaryKey();
		$this->user = (new $this->userClass)->findOne([$primaryKey => $primaryValue]);
	} else {
		 $this->user = null;
	}
	}
	public function run(){
		echo $this->router->resolve();
	}
	public function getController(){

	}
	public function setController(){

	}
	public function login(DbModel $user){
		 $this->user = $user;
         $primaryKey = $user->primaryKey();
	     $primaryValue = $user->{$primaryKey};
	     $this->session->set('user' , $primaryValue);
	     return true;
	}
	public function logout(){
		$this->user = null;
		$this->session->remove('user');
	}

}


?>