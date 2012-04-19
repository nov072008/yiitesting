<!--/**
 * MANY_MANY  Ajax Crud Administration
 *  view.php   detailed view for student * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.0
 * @license The MIT License
 */-->

<?php 
/**If you want you can use $img_url for the image source url,so that you can fall back to a placeholder image,if no image exists for model.*/
$large_src = $model->studentImgBehavior->getFileUrl('large');
$img_url = (isset($large_src)) ? $large_src :
 Yii::app()->baseUrl . '/img/placeholder_100.jpg';

?>

<div class="details_view">
    <div class="large_pic_wrapper" id="large_wrapper_<?php echo $model->id;?>">
        <img id="<?php echo 'large_' . $model->id;?>"
             src="<?php   echo $img_url;?>?<?php echo time();?>"
             title="image_<?php echo $model->id;?>"/>
    </div>
   <div class="info_wrapper">
<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'email',
'phone',
'dob',
'gradelevel',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('assignments')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->assignments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo   GxHtml::encode(GxHtml::valueEx($relatedModel));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('classrooms')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->classrooms as $relatedModel) {
		echo GxHtml::openTag('li');
		echo   GxHtml::encode(GxHtml::valueEx($relatedModel));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>       </div>

    </div>