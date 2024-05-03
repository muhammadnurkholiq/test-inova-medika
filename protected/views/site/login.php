<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';

?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', [
		'id' => 'login-form',
		'enableClientValidation' => true,
		'clientOptions' => [
			'validateOnSubmit' => true,
		],
	]); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username'); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password'); ?>
		<?php echo $form->error($model, 'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>admin</kbd>/<kbd>pass</kbd> or <kbd>employee</kbd>/<kbd>pass</kbd>.
		</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->