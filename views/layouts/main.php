
<?php use \app\core\Application; ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!-- <link rel="stylesheet" type="text/css" href='<?php echo  __dir__."/../css/bootstrap.min.css"; ?>'> -->
 	<title>Mvc</title>
   <style type="text/css">
      .alert-success{
         background: green;
      }
      .is-invalid {
         border: 1px solid red;
      }
   </style>
 </head>
 <body>
 	<ul><li><a href="/">Home</a></li><li><a href="/contact">contact</a></li></ul>
    <ul><li><a href="/login">login</a></li><li><a href="/register">register</a></li></ul>
     <?php if(Application::$app->session->getFlash('success')): ?>
        <div class="alert-success">
           <?php echo Application::$app->session->getFlash('success'); ?>
        </div>
     <?php endif;  ?>
  {{content}}



 </body>
 </html>