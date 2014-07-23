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
 * This is the model class for table "et_ophnueducation_patientid".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $patient_identified
 * @property integer $dob
 * @property integer $patient_name
 * @property integer $parent_caregiver
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuEducation_PatientId	extends  BaseEventTypeElement
{
	protected $auto_update_relations = true;

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
		return 'et_ophnueducation_patientid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, patient_identified, translator_present_id, translator_name, caregivers_present_id, caregiver_name1, caregiver_relationship1_id, caregiver_name2, caregiver_relationship2_id, identifiers', 'safe'),
			array('id, event_id, patient_identified', 'safe', 'on' => 'search'),
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
			'translator_present' => array(self::BELONGS_TO, 'OphNuEducation_PatientId_TranslatorPresent', 'translator_present_id'),
			'caregivers_present' => array(self::BELONGS_TO, 'OphNuEducation_PatientId_CaregiversPresent', 'caregivers_present_id'),
			'relationship_1' => array(self::BELONGS_TO, 'OphNuEducation_PatientId_Relationship', 'caregiver_relationship1_id'),
			'relationship_2' => array(self::BELONGS_TO, 'OphNuEducation_PatientId_Relationship', 'caregiver_relationship2_id'),
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
			'patient_identified' => 'Patient ID verified and ID band applied',
			'translator_present_id' => 'Translator present',
			'translator_name' => 'Name of translator',
			'caregivers_present_id' => 'Care givers present',
			'caregiver_name1' => 'Name',
			'caregiver_relationship1_id' => 'Relationship',
			'caregiver_name2' => 'Name',
			'caregiver_relationship2_id' => 'Relationship',
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
		$criteria->compare('patient_identified', $this->patient_identified);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->translator_present && $this->translator_present->name == 'Yes') {
			if (empty($this->translator_name)) {
				$this->addError('translator_name',$this->getAttributeLabel('translator_name').' cannot be blank');
			}
		}

		if ($this->caregivers_present && $this->caregivers_present->name == 'Yes') {
			if (empty($this->caregiver_name1)) {
				$this->addError('caregiver_name1',$this->getAttributeLabel('caregiver_name1').' cannot be blank');
			}
			if (empty($this->caregiver_relationship1_id)) {
				$this->addError('caregiver_relationship1_id',$this->getAttributeLabel('caregiver_relationship1_id').' cannot be blank');
			}
			if (empty($this->caregiver_name2)) {
				$this->addError('caregiver_name2',$this->getAttributeLabel('caregiver_name2').' cannot be blank');
			}
			if (empty($this->caregiver_relationship2_id)) {
				$this->addError('caregiver_relationship2_id',$this->getAttributeLabel('caregiver_relationship2_id').' cannot be blank');
			}
		}

		return parent::beforeValidate();
	}
}
?>
