<?php
$this->breadcrumbs=array(
	'Assignments',
);

$this->menu=array(
	array('label'=>'Create Assignment','url'=>array('create')),
	array('label'=>'Manage Assignment','url'=>array('admin')),
);
?>

<h1>Assignments</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
