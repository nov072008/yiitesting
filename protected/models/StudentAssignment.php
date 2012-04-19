<?php

Yii::import('application.models._base.BaseStudentAssignment');

class StudentAssignment extends BaseStudentAssignment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}