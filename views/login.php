<?php
/** @var $model \app\models\User */
?>
<div>
	<h1>Login</h1>
    <form method="post">
    	  <div>	
    	  <input type="text" name="email" value="<?php echo $model->email ?>" class="">
    	  <h1 class="is-invalid"> <?php echo $model->getFirstError('email'); ?>
    	  </h1>
    	  </div>

    	   <div>	
    	  <input type="text" name="password" value="<?php echo $model->password ?>" class="">
    	  <h1 class="is-invalid"> <?php echo $model->getFirstError('password'); ?>
    	  </h1>
    	  </div>
    	
    	  <input type="submit" name="submit">
    </form>
</div> 