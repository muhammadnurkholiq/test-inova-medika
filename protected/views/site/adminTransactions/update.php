<?php
$form = $this->beginWidget('CActiveForm', [
  'id' => 'transactions-update-form',
  'enableAjaxValidation' => false,
]);

echo $form->errorSummary($model);
?>

<div class="form">
  <div class="row">
    <?php echo $form->labelEx($model, 'patient_id'); ?>
    <?php echo $form->textField($model, 'patient_id', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'patient_id'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'employee_id'); ?>
    <?php echo $form->textField($model, 'employee_id', ['class' => 'form-control']); ?>
    <?php echo $form->error($model, 'employee_id'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'action_id'); ?>
    <?php echo $form->dropDownList($model, 'action_id', ['0' => 'Silahkan pilih'] + CHtml::listData(Action::model()->findAll(), 'id', 'name'), [
      'class' => 'form-control',
      'onchange' => 'updateTotalCost()',
      'id' => 'Transaction_action_id',
    ]); ?>
    <?php echo $form->error($model, 'action_id'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'medicine_id'); ?>
    <?php echo $form->dropDownList($model, 'medicine_id', ['0' => 'Silahkan pilih'] + CHtml::listData(Medicine::model()->findAll(), 'id', 'name'), [
      'class' => 'form-control',
      'onchange' => 'updateTotalCost()',
      'id' => 'Transaction_medicine_id',
    ]); ?>
    <?php echo $form->error($model, 'medicine_id'); ?>
  </div>

  <div class="row">
    <?php echo CHtml::label('Total Cost', false); ?>
    <div class="form-control" id="Transaction_total_cost">
      <?php echo number_format($model->total_cost, 2); ?>
    </div>
  </div>

  <div class="row buttons">
    <?php echo CHtml::submitButton('Update Transaction', ['class' => 'btn btn-primary']); ?>
    <?php echo CHtml::button('Back', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back()']); ?>
  </div>
</div>

<?php
// Menutup form
$this->endWidget();
?>