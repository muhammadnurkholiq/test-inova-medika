<?php
/* @var $model Action */
/* @var $form CActiveForm */

$form = $this->beginWidget('CActiveForm', [
  'id' => 'actions-form',
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
    <?php echo $form->labelEx($model, 'cost'); ?>
    <?php echo $form->textField($model, 'cost', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'cost'); ?>
  </div>

  <div class="form-group">
    <?php echo CHtml::submitButton('Create', ['class' => 'btn btn-primary']); ?>
    <?php echo CHtml::button('Back', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back()']); ?>
  </div>

</div>

<?php $this->endWidget(); ?>