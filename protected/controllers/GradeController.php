<?php
/**
 * MANY_MANY  Ajax Crud Admnistration Demo
 * GradeController * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.0
 * @license The MIT License
 */

class GradeController extends GxController {


  public function actionCreate()
    {
        $model = new Grade;
        //	$this->performAjaxValidation($model, 'product-form');
        if (isset($_POST['Grade'])) {
            $model->setAttributes($_POST['Grade']);
            $relatedData = array(
                'assignments' => $_POST['Grade']['assignments'] === '' ? null : $_POST['Grade']['assignments'],
            );

            if ($model->saveWithRelated($relatedData)) { //if model was saved

                echo '<textarea>' . json_encode(array('success' => true,
                                                     'id' => $model->primaryKey)
                ) . '</textarea>';
                Yii::app()->end();
            } //else if model was not saved
            else {
                echo '<textarea>' . json_encode(array('success' => false)) . '</textarea>';
                Yii::app()->end();
            }
        }
    }

            public function actionUpdate()
    {

        //	$this->performAjaxValidation($model, 'grade-form');
        if (isset($_POST['Grade'])) {
            $model = $this->loadModel($_POST['Grade']['update_id'], 'Grade');
            $model->setAttributes($_POST['Grade']);
            $relatedData = array(
                'assignments' => $_POST['Grade']['assignments'] === '' ? null : $_POST['Grade']['assignments'],
            );

            if ($model->saveWithRelated($relatedData)) {
                echo '<textarea>' . json_encode(array('success' => true,
                                                     'id' => $model->primaryKey,
                                                     'thumb_url' => $model->gradeImgBehavior->getFileUrl('thumb')
                                                )
                ) . '</textarea>';
                Yii::app()->end();
            } else {
                echo '<textarea>' . json_encode(array('success' => false)) . '</textarea>';
                Yii::app()->end();
            }

        } //isset POST

    }


 public function actionDelete()
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            if ($this->loadModel($_POST['id'], 'Grade')->delete()) {
                echo json_encode(array('success' => true));
                exit;
            } else
            {
                echo json_encode(array('success' => false));
                exit;
            }
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }


/**
	 * Returns options for the related model multiple select
	 * @param string $model
	 * @return  string options for relate model  multiple select
	 * @since 1.0
	 */
     public function related_opts($model){
        $relatedPKs=Assignment::extractPkValue($model->assignments);
        $options='';
       $categories=GxHtml::listDataEx(Assignment::model()->findAllAttributes(null, true));
       foreach ($categories as $value=>$text){
                     if(!$model->isNewRecord) {
                            in_array($value,$relatedPKs)?
           $options .= '<option selected="selected" value='.$value.'>'.$text.'</option>\n':
           $options .= '<option  value='.$value.'>'.$text.'</option>\n';
                     }else{
           $options.='<option  value='.$value.'>'.$text.'</option>\n';
                     }
       }
          echo  $options;
    }


      public function actionReturnProductForm(){

               //don't reload these scripts or they will mess up the page
                //yiiactiveform.js still needs to be loaded that's why we don't use
                // Yii::app()->clientScript->scriptMap['*.js'] = false;
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array(
                 'jquery.min.js'=>false,
                'jquery.js'=>false,
                'jquery.fancybox.js'=>false,
        );

          //if we are creating a new product
          if($_POST['update']!='true') {
          $model=new Grade;
           //else load the model to update
          }else{
              $model=$this->loadModel($_POST['update_id'],Grade);
          }
        $this->renderPartial('_form', array('model'=>$model ), false, true);
      }

            //renders the details view inside fancybox
public function actionReturnProductView(){

               //don't reload these scripts or they will mess up the page
                //yiiactiveform.js still needs to be loaded that's why we don't use
                // Yii::app()->clientScript->scriptMap['*.js'] = false;
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array(
                 'jquery.min.js'=>false,
                'jquery.js'=>false,
                'jquery.fancybox.js'=>false,

        );
        $model=$this->loadModel($_POST['id'],Grade);
        $this->renderPartial('view', array('model'=>$model),  false, true);
      }


}