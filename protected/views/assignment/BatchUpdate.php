<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary(array($assignments,$grades)); ?>
 
    <!-- ...input fields for $a, $b... -->
 
    <div class="row">
        <?php echo $form->labelEx($assignments,'name'); ?>
        <?php echo $form->textField($assignments,'name'); ?>
        <?php echo $form->error($assignments,'name'); ?>
    </div>
 
    <div class="row">
        <?php echo $form->labelEx($grades,'letter'); ?>
        <?php echo $form->textField($grades,'letter'); ?>
        <?php echo $form->error($grades,'letter'); ?>
    </div>
 
 
<?php echo CHtml::endForm(); ?>