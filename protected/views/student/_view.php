<!--/**
 * MANY_MANY  Ajax Crud Administration
 *  _view.php   partial view for rendering  student records  in ListView
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.0
 * @license The MIT License
 */-->

<?php 
/**If you want you can use $img_url in thumb source url,so that you can fall back to a placeholder image,if no image exists for model.*/
$thumb_src=$data->studentImgBehavior->getFileUrl('thumb');
$img_url=(isset($thumb_src))?$thumb_src :
Yii::app()->baseUrl.'/img/placeholder_100.jpg';

?>
<div class="list_partial_view">

    <?php echo GxHtml::encode($data->getAttributeLabel('id    ')); ?>:
  <?php echo GxHtml::encode($data->id)?>
    <br/>

    <div class="thumb_wrapper" id="tmb_wrapper_<?php echo $data->id;?>">
        <img id="<?php echo 'thumb_' . $data->id;?>"
             src="<?php   echo $img_url;?>?<?php echo time();?>"
             title="<?php echo $data->id;?>"/>
    </div>
    <div class='info'
    '>
    <div class='clear'>
        <?php echo GxHtml::encode($data->getAttributeLabel('name        ')); ?>:
                <?php echo GxHtml::encode($data->name); ?>
                <br/>
                <?php echo GxHtml::encode($data->getAttributeLabel('email        ')); ?>:
                <?php echo GxHtml::encode($data->email); ?>
                <br/>
                <?php echo GxHtml::encode($data->getAttributeLabel('phone        ')); ?>:
                <?php echo GxHtml::encode($data->phone); ?>
                <br/>
                <?php echo GxHtml::encode($data->getAttributeLabel('dob        ')); ?>:
                <?php echo GxHtml::encode($data->dob); ?>
                <br/>
                <?php echo GxHtml::encode($data->getAttributeLabel('gradelevel        ')); ?>:
                <?php echo GxHtml::encode($data->gradelevel); ?>
                <br/>
            </div>
    <div class="crud_buttons">
        <a id="view_<?php echo $data->id;?>"
           class="student_properties"
           rel="<?php echo $data->name;?>" href="#">
            <img src="<?php  echo Yii::app()->baseUrl;?>/js_plugins/ajaxform/images/icons/properties.png"
                 alt="View"/>
        </a>
        <a id="update_<?php echo $data->id;?>"
           class="update_student" href="#">
            <img src="<?php  echo Yii::app()->baseUrl;?>/js_plugins/ajaxform/images/icons/pencil.png"
                 alt="Update"/>
        </a>
        <a id="delete_<?php echo $data->id;?>"
           class="delete_student"
           rel="<?php echo $data->name;?>" href="#">
            <img src="<?php  echo Yii::app()->baseUrl;?>/js_plugins/ajaxform/images/icons/cross.png"
                 alt="Delete"/>
        </a>
    </div>
</div>

</div>