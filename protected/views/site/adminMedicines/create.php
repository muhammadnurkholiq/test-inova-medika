<?php
/* @var $model Medicine */
/* @var $form CActiveForm */

$form = $this->beginWidget('CActiveForm', [
  'id' => 'medicines-form',
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
    <?php echo $form->labelEx($model, 'price'); ?>
    <?php echo $form->numberField($model, 'price', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'price'); ?>
  </div>

  <div class="form-group">
    <?php echo CHtml::submitButton('Create', ['class' => 'btn btn-primary']); ?>
    <?php echo CHtml::button('Back', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back()']); ?>
  </div>

</div>

<?php $this->endWidget(); ?>