<?php

  namespace app\Controllers;
  use \app\core\Application;
  use \app\core\Controller;
  use \app\core\Request;
  /**
   * 
   */
  class SiteController extends Controller
  {
  	
  	 function home(){
  	 	 $params = [
            'name' => 'tayyab',
  	 	 ];
  	 	  return $this->render('home', $params);
  	 }
  	  function contact(){
  	  	  return $this->render('contact');
  	 }
  	 function handleContact(Request $request){
         $body = $request->getBody();
         echo "<pre>";

         var_dump($body);
  	 }
  }

?>