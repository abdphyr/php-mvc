<div class="mt-5">
  <h3 class="text-center">
    Login
  </h3>
  <?php $form = app\core\form\Form::begin('', "post") ?>
  <?php if (getFlash('login')) : ?>
      <div class="alert alert-danger">
        <?php echo getFlash('login') ?>
      </div>
    <?php endif ?>
    
  <?php echo $form->field($errors, $model, 'email')->email() ?>
  <?php echo $form->field($errors, $model, 'password')->password() ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <?php app\core\form\Form::end() ?>
</div>