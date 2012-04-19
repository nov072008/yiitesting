<?php

/**
 * This is the model base class for the table "assignment_student".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AssignmentStudent".
 *
 * Columns in table "assignment_student" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $assignment_id
 * @property string $student_id
 *
 */
abstract class BaseAssignmentStudent extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'assignment_student';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AssignmentStudent|AssignmentStudents', $n);
	}

	public static function representingColumn() {
		return array(
			'assignment_id',
			'student_id',
		);
	}

	public function rules() {
		return array(
			array('assignment_id, student_id', 'required'),
			array('assignment_id, student_id', 'length', 'max'=>10),
			array('assignment_id, student_id', 'safe', 'on'=>'search'),
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
			'student_id' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('assignment_id', $this->assignment_id);
		$criteria->compare('student_id', $this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}