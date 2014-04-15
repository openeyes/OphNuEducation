<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnueducation_caregivers".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $caregivers_present_id
 * @property string $relationship_1_name
 * @property integer $relationship_1_id
 * @property string $relationship_2_name
 * @property integer $relationship_2_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuEducation_CareGivers_CaregiversPresent $caregivers_present
 * @property OphNuEducation_CareGivers_Relationship1 $relationship_1
 * @property OphNuEducation_CareGivers_Relationship2 $relationship_2
 */

class Element_OphNuEducation_CareGivers  extends	BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnueducation_caregivers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, caregivers_present_id, relationship_1_name, relationship_1_id, relationship_2_name, relationship_2_id', 'safe'),
			array('caregivers_present_id', 'required'),
			array('id, event_id, caregivers_present_id, relationship_1_name, relationship_1_id, relationship_2_name, relationship_2_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'caregivers_present' => array(self::BELONGS_TO, 'OphNuEducation_CareGivers_CaregiversPresent', 'caregivers_present_id'),
			'relationship_1' => array(self::BELONGS_TO, 'OphNuEducation_CareGivers_Relationship1', 'relationship_1_id'),
			'relationship_2' => array(self::BELONGS_TO, 'OphNuEducation_CareGivers_Relationship2', 'relationship_2_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'caregivers_present_id' => 'Caregivers present',
			'relationship_1_name' => 'Name',
			'relationship_1_id' => 'Relationship',
			'relationship_2_name' => 'Name',
			'relationship_2_id' => 'Relationship',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('caregivers_present_id', $this->caregivers_present_id);
		$criteria->compare('relationship_1_name', $this->relationship_1_name);
		$criteria->compare('relationship_1_id', $this->relationship_1_id);
		$criteria->compare('relationship_2_name', $this->relationship_2_name);
		$criteria->compare('relationship_2_id', $this->relationship_2_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function beforeValidate()
	{
		if ($this->caregivers_present && $this->caregivers_present->name == 'Yes') {
			if (empty($this->relationship_1_name)) {
				$this->addError('relationship_1_name',$this->getAttributeLabel('relationship_1_name').' cannot be blank');
			}
			if (empty($this->relationship_1_id)) {
				$this->addError('relationship_1_id',$this->getAttributeLabel('relationship_1_id').' cannot be blank');
			}
			if (empty($this->relationship_2_name)) {
				$this->addError('relationship_2_name',$this->getAttributeLabel('relationship_2_name').' cannot be blank');
			}
			if (empty($this->relationship_2_id)) {
				$this->addError('relationship_2_id',$this->getAttributeLabel('relationship_2_id').' cannot be blank');
			}
		}
		
		return parent::beforeValidate();
	}
}
?>
