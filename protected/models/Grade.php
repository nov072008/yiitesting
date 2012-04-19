<?php

Yii::import('application.models._base.BaseGrade');

class Grade extends BaseGrade
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}