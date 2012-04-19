<!--/**
 * MANY_MANY  Ajax Crud Administration
 *  _form  Form for Grade  create and update operations,rendered inside fancybox
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.0
 * @license The MIT License
 */-->
        

    <div id="form_wrapper" class="client-val-form">

    <?php     if ($model->isNewRecord) : ?>
    <h3 id="create_header"><span style="color:#4079C8">Create New Grade</span></h3>
    <?php    elseif (!$model->isNewRecord): ?>
    <h3 id="update_header">
        Update Grade <span  style="color:#4079C8">with ID: <?php echo $model->id?></span>
     </h3>
    <?php   endif; ?>

    <?php 
    $val_error_msg = 'Error.Grade was not saved.';
    $val_success_message = ($model->isNewRecord) ?
    'Grade was created successfuly.' :
    'Grade was updated successfuly.';

    ?>

    <div id="success-note" class="notification success png_bg" style="display:none;">
        <a href="#" class="close">
             <img
                src="<?php echo Yii::app()->request->baseUrl;?>/js_plugins/ajaxform/images/icons/cross_grey_small.png"
                title="Close this notification" alt="close"/>
         </a>
        <div>
            <?php echo $val_success_message;?>
        </div>
    </div>

    <div id="error-note" class="notification errorshow png_bg" style="display:none;">
        <a href="#" class="close">
            <img
                src="<?php echo Yii::app()->request->baseUrl;?>/js_plugins/ajaxform/images/icons/cross_grey_small.png"
                title="Close this notification" alt="close"/>
        </a>
        <div>
            <?php echo $val_error_msg;?>            
        </div>
</div>
        
    <div id="ajax-form" class="form">
     <?php  
        $formId = 'grade-form';
        $actionUrl = ($model->isNewRecord) ?
                CController::createUrl('grade/create') :
                CController::createUrl('grade/update');

        $form = $this->beginWidget('CActiveForm', array(
        'id' => $formId,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'action' => $actionUrl,
        // 'enableAjaxValidation'=>true,
        'enableClientValidation' => true,
        'focus' => array($model, 'name'),
        'errorMessageCssClass' => 'input-notification-error error-simple png_bg',
        'clientOptions' => array('validateOnSubmit' => true,
        'validateOnType' => false,
        'afterValidate' => 'js:function(form,data,hasError){ $.js_afterValidate(form,data,hasError); }',
        'errorCssClass' => 'err',
        'successCssClass' => 'suc',
        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
        $.js_afterValidateAttribute(form, attribute, data, hasError);
        }'
        ),
        ));

        
        ?>
        <?php  echo $form->errorSummary($model,
        '<div style="font-weight:bold">Please correct these errors:</div>
        ', NULL, array('class' => 'errorsum notification errorshow png_bg'));
        ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <div class="row">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model, 'name', array('maxlength' => 50)); ?>
                    <span id="success-Grade_name"
                          class="hid input-notification-success  success png_bg right"></span>
                    <div>
                        <small></small>
                    </div>
                    <?php echo $form->error($model,'name'); ?>
                </div>
                                <div class="row">
                    <?php echo $form->labelEx($model,'description'); ?>
                    <?php echo $form->textField($model, 'description', array('maxlength' => 200)); ?>
                    <span id="success-Grade_description"
                          class="hid input-notification-success  success png_bg right"></span>
                    <div>
                        <small></small>
                    </div>
                    <?php echo $form->error($model,'description'); ?>
                </div>
                                <div class="row">
                    <?php echo $form->labelEx($model,'letter'); ?>
                    <?php echo $form->textField($model, 'letter', array('maxlength' => 45)); ?>
                    <span id="success-Grade_letter"
                          class="hid input-notification-success  success png_bg right"></span>
                    <div>
                        <small></small>
                    </div>
                    <?php echo $form->error($model,'letter'); ?>
                </div>
                                <div class="row">
                    <?php echo $form->labelEx($model,'assignmentid'); ?>
                    <?php echo $form->textField($model, 'assignmentid'); ?>
                    <span id="success-Grade_assignmentid"
                          class="hid input-notification-success  success png_bg right"></span>
                    <div>
                        <small></small>
                    </div>
                    <?php echo $form->error($model,'assignmentid'); ?>
                </div>
                

          <div class="row">
            <?php  echo $form->fileField($model,'grade_image'); ?>
            <div>
                <small><?php echo 'Grade Image';?></small>
            </div>
        </div>

        
 <div class="row">
            <select data-placeholder="Choose Assignments..."
                    name="Grade[assignments][]"
                    class="assignment-select" multiple="true"
                    style="width: 250px;" tabindex="-1">
                <option value=""></option>
                <?php  $this->related_opts($model);?>
            </select>

            <div>
                <small><?php echo 'Assignments in this Grade';?></small>
            </div>
        </div>

        <div class="row">
         <input type="hidden" name="YII_CSRF_TOKEN"   value="<?php echo Yii::app()->request->csrfToken;?>"/>
            </div>
        
           <?php  if (!$model->isNewRecord): ?>        
        <div class="row">
       <?php echo $form->hiddenField($model, 'update_id', array('value'=>$model->id)) ;?>
           </div>
        <?php endif; ?>

  <div class="row buttons">
   <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'button align-right'));?>      
            </div>
            <?php  $this->endWidget();?>
        </div>
        <!-- form -->

</div>
<script  type="text/javascript">
      $(function () {
          //multiple selection list
         $(".assignment-select").chosen();

           //Close button on top of ajax response div
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(600);
				});
				return false;
			}
		);
            });
</script>