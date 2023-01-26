<?php
 namespace app\controllers;
  use \app\core\Application;
  use \app\core\Controller;
  use \app\core\Request;
  use \app\core\Model;
  use \app\models\User;
  use \app\core\Response;
  use \app\models\LoginForm;
 /**
  * 
  */
 class AuthController extends Controller
 {
 	
 	 function login(Request $request, Response $response){
         $loginForm = new LoginForm();
         if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
             $response->redirect('/');
             return;
            }
         }
         $this->setLayout('auth');
 	 	return $this->render('login' , [
         'model' => $loginForm
      ]);
 	 }
 	 function register(Request $request){
         $User = new User();
        if($request->isPost()){
          $User->loadData($request->getBody());
          if($User->validate() && $User->save()){
             Application::$app->session->setFlash('success', 'Thanks for registering');
             Application::$app->response->redirect('/');
             exit;
          }
          
       
          return $this->render('register', ['model' => $User]);
        }
         $this->setLayout('auth');
 	 	return $this->render('register', ['model', $User]);
 	 }
 }



?>