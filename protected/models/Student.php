<?php
/**
* MANY_MANY  Ajax Crud Admnistration
* Student Model
* InfoWebSphere {@link http://libkal.gr/infowebsphere}
* @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.0
 * @license The MIT License
 */

Yii::import('application.models._base.BaseStudent');

class Student extends BaseStudent
{

    //paging size for all products
     const PAGING_SIZE_ALL=10;
    public $student_image;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

        public function rules() {
		return array(
 array('student_image', 'file', 'types' => 'png, gif, jpg', 'allowEmpty' => true),
array('name', 'required'),
array('name', 'length', 'max'=>100),
array('email, phone', 'length', 'max'=>45),
array('gradelevel', 'length', 'max'=>3),
array('dob', 'safe'),
array('email, phone, dob, gradelevel', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, email, phone, dob, gradelevel', 'safe', 'on'=>'search'),
		);
	}

      public function searchCriteria(){

    $criteria = new CDbCriteria;
$criteria->compare('t.id', $this->id, true);
$criteria->compare('t.name', $this->name, true);
$criteria->compare('t.email', $this->email, true);
$criteria->compare('t.phone', $this->phone, true);
$criteria->compare('t.dob', $this->dob, true);
$criteria->compare('t.gradelevel', $this->gradelevel, true);
		
return $criteria;
    }

        	public function search() {
		$criteria = new CDbCriteria;

$criteria->compare('id', $this->id, true);
$criteria->compare('name', $this->name, true);
$criteria->compare('email', $this->email, true);
$criteria->compare('phone', $this->phone, true);
$criteria->compare('dob', $this->dob, true);
$criteria->compare('gradelevel', $this->gradelevel, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
          'pagination' => array(
                                                             'pageSize' => self::PAGING_SIZE_ALL,
                                                              )
		));
	}


  	public function behaviors() {
		return array(
			'studentImgBehavior' => array(
				'class' => 'ImageARBehavior',
				'attribute' => 'student_image', // this must exist
				'extension' => 'png, gif, jpg', // possible extensions, comma separated
				'prefix' => 'img_',
				'relativeWebRootFolder' => 'img/product', // this folder must exist

				# 'forceExt' => png, // this is the default, every saved image will be a png one.
				# Set to null if you want to keep the original format

			//	'useImageMagick' => '/usr/bin', # I want to use imagemagick instead of GD, and
				# it is located in /usr/bin on my computer.

				// this will define formats for the image.
				// The format 'normal' always exist. This is the default format, by default no
				// suffix or no processing is enabled.
				'formats' => array(
					// create a thumbnail grayscale format
					'thumb' => array(
						'suffix' => '_thumb',
						'process' => array('resize' => array(100, 100)),
					),
                    	'small' => array(
						'suffix' => '_small',
						'process' => array('resize' => array(50,50)),
					),
				
					// create a large one (in fact, no resize is applied)
					'large' => array(
						'suffix' => '_large',
					),
					// and override the default :
					'normal' => array(
						'process' => array('resize' => array(200, 200)),
					),
				),

				'defaultName' => 'default', // when no file is associated, this one is used by getFileUrl
				// defaultName need to exist in the relativeWebRootFolder path, and prefixed by prefix,
				// and with one of the possible extensions. if multiple formats are used, a default file must exist
				// for each format. Name is constructed like this :
				//     {prefix}{name of the default file}{suffix}{one of the extension}
			)
		);
	}

}