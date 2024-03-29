<?php

/**
 * This is the model base class for the table "grade_assignment".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "GradeAssignment".
 *
 * Columns in table "grade_assignment" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $grade_id
 * @property string $assignment_id
 *
 */
abstract class BaseGradeAssignment extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'grade_assignment';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'GradeAssignment|GradeAssignments', $n);
	}

	public static function representingColumn() {
		return array(
			'grade_id',
			'assignment_id',
		);
	}

	public function rules() {
		return array(
			array('grade_id, assignment_id', 'required'),
			array('grade_id, assignment_id', 'length', 'max'=>10),
			array('grade_id, assignment_id', 'safe', 'on'=>'search'),
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
			'grade_id' => null,
			'assignment_id' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('grade_id', $this->grade_id);
		$criteria->compare('assignment_id', $this->assignment_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}