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
?>
	<div class="element-fields">
		<?php echo $form->checkBox($element, 'patient_identified', array('text-align' => 'right', 'class' => 'linked-fields', 'data-linked-fields' => 'identifiers', 'data-linked-values' => '1'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'identifiers', 'identifiers', 'identifier_id', CHtml::listData(OphNuEducation_PatientId_Identifier::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Two identifiers'), !$element->patient_identified, false, null, false, false, array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'translator_present_id', CHtml::listData(OphNuEducation_PatientId_TranslatorPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'translator_name', 'data-linked-values' => 'Yes', 'label-character' => '?'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'translator_name', array('hide' => !$element->translator_present || $element->translator_present->name != 'Yes'), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'caregivers_present_id', CHtml::listData(OphNuEducation_PatientId_CaregiversPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'caregiver_name1,caregiver_relationship1_id,caregiver_name2,caregiver_relationship2_id','data-linked-values' => 'Yes', 'label-character' => '?'), array('label' => 3, 'field' => 4))?>
		<div id="div_Element_OphNuEducation_PatientId_caregiver_name1" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuEducation_PatientId_caregiver_name1"><?php echo $element->getAttributeLabel('caregiver_name1')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'caregiver_name1', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuEducation_PatientId_caregiver_relationship1_id"><?php echo $element->getAttributeLabel('caregiver_relationship1_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'caregiver_relationship1_id', CHtml::listData(OphNuEducation_PatientId_Relationship::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' => true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuEducation_PatientId_caregiver_name2" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuEducation_PatientId_caregiver_name2"><?php echo $element->getAttributeLabel('caregiver_name2')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'caregiver_name2', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuEducation_PatientId_caregiver_relationship2_id"><?php echo $element->getAttributeLabel('caregiver_relationship2_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'caregiver_relationship2_id', CHtml::listData(OphNuEducation_PatientId_Relationship::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' => true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
	</div>
