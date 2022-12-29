<div>
  <h3 class="text-center">
    Login
  </h3>
  <?php $form = app\core\form\Form::begin('', "post") ?>

  <?php echo $form->field($errors, $model, 'email')->email() ?>
  <?php echo $form->field($errors, $model, 'password')->password() ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <?php app\core\form\Form::end() ?>
</div>