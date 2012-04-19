<?php echo CHtml::beginForm(); ?>
 <?php echo $this->renderPartial('_form', array('student'=>$a, 'classroom'=>$b)); ?>
    <?php echo CHtml::errorSummary(array($a,$b)); ?>
 
    <!-- ...input fields for $a, $b... -->
 
    <div class="row">
        <?php echo $form->labelEx($a,'a_field'); ?>
        <?php echo $form->textField($a,'name'); ?>
   
    </div>
 
    <div class="row">
        <?php echo $form->labelEx($b,'b_field'); ?>
        <?php echo $form->textField($b,'description'); ?>
       
    </div>
 
 
<?php echo CHtml::endForm(); ?>