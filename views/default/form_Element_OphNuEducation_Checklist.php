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
		<?php echo $form->radioBoolean($element, 'consent_signed', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'surgical_examination', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'anesthesia_assessment_id', CHtml::listData(OphNuEducation_Checklist_Anaesthesia_Preop_Completed::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'biometry_id', CHtml::listData(OphNuEducation_Checklist_Biometry::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'patient_rights', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'instructions_provided', array(), array('label' => 3, 'field' => 4))?>
	</div>
