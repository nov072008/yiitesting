<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
<tr><th>Name</th><th>Grade Level</th><th>Special</th></tr>
<?php foreach($students as $i=>$Student): ?>
<tr>
<td><?php echo CHtml::activeTextField($Student,"[$i]name"); ?></td>
<td><?php echo CHtml::activeTextField($Student,"[$i]gradelevel"); ?></td>
<td><?php echo CHtml::activeTextField($Student,"[$i]special"); ?></td>

</tr>
<?php endforeach; ?>
</table>

<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->