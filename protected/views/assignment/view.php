<?php
$this->breadcrumbs=array(
	'Assignments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Assignment','url'=>array('index')),
	array('label'=>'Create Assignment','url'=>array('create')),
	array('label'=>'Update Assignment','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Assignment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Assignment','url'=>array('admin')),
);
?>

<h1>View Assignment #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'datecreated',
		'datedue',
		'notes',
	),
)); ?>
