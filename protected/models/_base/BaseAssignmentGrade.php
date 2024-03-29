<?php

/**
 * This is the model base class for the table "assignment_grade".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AssignmentGrade".
 *
 * Columns in table "assignment_grade" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $assignment_id
 * @property string $grade_id
 *
 */
abstract class BaseAssignmentGrade extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'assignment_grade';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AssignmentGrade|AssignmentGrades', $n);
	}

	public static function representingColumn() {
		return array(
			'assignment_id',
			'grade_id',
		);
	}

	public function rules() {
		return array(
			array('assignment_id, grade_id', 'required'),
			array('assignment_id, grade_id', 'length', 'max'=>10),
			array('assignment_id, grade_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'assignment_id' => null,
			'grade_id' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('assignment_id', $this->assignment_id);
		$criteria->compare('grade_id', $this->grade_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}