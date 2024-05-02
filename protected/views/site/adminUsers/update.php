<?php
/* @var $model User */
/* @var $form CActiveForm */

$form = $this->beginWidget('CActiveForm', [
  'id' => 'users-form',
  'enableAjaxValidation' => false,
]);

echo $form->errorSummary($model);
?>

<div class="form">

  <div class="row">
    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'username'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', ['class' => 'form-control', 'id' => 'passwordField']); ?>
    <?php echo $form->error($model, 'password'); ?>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="togglePassword" />
      <label class="form-check-label" for="togglePassword">Show Password</label>
    </div>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'role'); ?>
    <?php echo $form->dropDownList($model, 'role', [
      'admin' => 'Admin',
      'employee' => 'Employee'
    ], ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'role'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'address'); ?>
    <?php echo $form->textField($model, 'address', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'address'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'date_of_birth'); ?>
    <?php echo $form->dateField($model, 'date_of_birth', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'date_of_birth'); ?>
  </div>

  <div class="row buttons">
    <?php echo CHtml::submitButton('Update User', ['class' => 'btn btn-primary']); ?>
    <?php echo CHtml::button('Back', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back()']); ?>
  </div>

</div>

<?php
$this->endWidget();
?>

<script>
  document.getElementById('togglePassword').addEventListener('change', function() {
    var passwordField = document.getElementById('passwordField');
    passwordField.type = this.checked ? 'text' : 'password';
  });
</script>