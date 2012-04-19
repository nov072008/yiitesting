<?php

Yii::import('application.models._base.BaseClassroomStudent');

class ClassroomStudent extends BaseClassroomStudent
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}