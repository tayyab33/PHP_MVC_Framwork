<div>
	<h1>Create an Account</h1>
    <?php 
       $form = \app\core\form\Form::begin('', "post"); ?>
       <?php echo $form->field($model, 'firstname') ?>
      <input type="submit" name="submit">
    <?php echo \app\core\form\Form::end(); ?>

</div>