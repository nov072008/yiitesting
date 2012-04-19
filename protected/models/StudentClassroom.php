<?php

Yii::import('application.models._base.BaseStudentClassroom');

class StudentClassroom extends BaseStudentClassroom
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}