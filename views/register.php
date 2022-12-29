<div>
  <h3 class="text-center">
    Create an account
  </h3>
  <?php $form = app\core\form\Form::begin('', "post") ?>
  <div class="row">
    <div class="col-sm-6">
      <?php echo $form->field($errors, $model, 'firstname') ?>
    </div>
    <div class="col-sm-6">
      <?php echo $form->field($errors, $model, 'lastname') ?>
    </div>
  </div>

  <?php echo $form->field($errors, $model, 'email')->email() ?>
  <?php echo $form->field($errors, $model, 'password')->password() ?>
  <?php echo $form->field($errors, $model, 'confirmPassword')->password() ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <?php app\core\form\Form::end() ?>
</div>