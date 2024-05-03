<?php
/* @var $model Patient */
/* @var $form CActiveForm */

$form = $this->beginWidget('CActiveForm', [
  'id' => 'patients-form',
  'enableAjaxValidation' => false,
]);

echo $form->errorSummary($model);
?>

<div class="form">

  <div class="form-group">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'name'); ?>
  </div>

  <div class="form-group">
    <?php echo $form->labelEx($model, 'address'); ?>
    <?php echo $form->textField($model, 'address', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'address'); ?>
  </div>

  <div class="form-group">
    <?php echo $form->labelEx($model, 'date_of_birth'); ?>
    <?php echo $form->dateField($model, 'date_of_birth', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'date_of_birth'); ?>
  </div>

  <div class="form-group">
    <?php echo CHtml::submitButton('Create', ['class' => 'btn btn-primary']); ?>
    <?php echo CHtml::button('Back', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back()']); ?>
  </div>

</div>

<?php $this->endWidget(); ?>