<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'assignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'datecreated',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'datedue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>200)); ?>

	<div class="form-actions">
                <?php $this->widget('bootstrap.widgets.BootButton', array(
                        'buttonType'=>'submit',
                        'type'=>'primary',
                        'label'=>$model->isNewRecord ? 'Create' : 'Save',
                )); ?>
        </div>

<?php $this->endWidget(); ?>
