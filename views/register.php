<?php
/** @var $model \app\models\User */
?>
<div>
	<h1>Create an Account</h1>
    <form method="post">
    	  <div>	
    	  <input type="text" name="firstname" value="<?php echo $model->firstname ?>" class="">
    	  <h1 class="is-invalid"> <?php echo $model->getFirstError('firstname'); ?>
    	  </h1>
    	  </div>
    	   <div>	
    	  <input type="text" name="lastname" value="<?php echo $model->lastname ?>" class="">
    	  <h1 class="is-invalid"> <?php echo $model->getFirstError('lastname'); ?>
    	  </h1>
    	  </div>
    	   <div>	
    	  <input type="text" name="email" value="<?php echo $model->email ?>" class="">
    	   <h1 class="is-invalid"> <?php echo $model->getFirstError('email'); ?>
    	  </h1>
    	  </div>
    	   <div>	
    	  <input type="password" name="password" value="<?php echo $model->password ?>" class="">
    	   <h1 class="is-invalid"> <?php echo $model->getFirstError('password'); ?>
    	  </h1>
    	  </div>
    	   <div>	
    	  <input type="password" name="confirmPassword" value="<?php echo $model->lastname ?>" class="">
    	    <h1 class="is-invalid"> <?php echo $model->getFirstError('confirmPassword'); ?>
    	  </h1>
    	  </div>
    	  <input type="submit" name="submit">
    </form>
</div> 