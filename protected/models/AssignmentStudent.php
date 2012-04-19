<?php

Yii::import('application.models._base.BaseAssignmentStudent');

class AssignmentStudent extends BaseAssignmentStudent
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}