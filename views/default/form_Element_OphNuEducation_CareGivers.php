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

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

	<div class="element-fields">
		<?php echo $form->radioButtons($element, 'caregivers_present_id', 'ophnueducation_caregivers_caregivers_present', null, false, false, false, false, array(), array('label' => 3, 'field' => 4))?>
		<div id="div_Element_OphNuEducation_CareGivers_relationship_1_name" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuEducation_CareGivers_relationship_1_name"><?php echo $element->getAttributeLabel('relationship_1_name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'relationship_1_name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuEducation_CareGivers_relationship_1_id"><?php echo $element->getAttributeLabel('relationship_1_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'relationship_1_id', CHtml::listData(OphNuEducation_CareGivers_Relationship1::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' => true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuEducation_CareGivers_relationship_2_name" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuEducation_CareGivers_relationship_2_name"><?php echo $element->getAttributeLabel('relationship_2_name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'relationship_2_name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuEducation_CareGivers_relationship_2_id"><?php echo $element->getAttributeLabel('relationship_2_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'relationship_2_id', CHtml::listData(OphNuEducation_CareGivers_Relationship1::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' => true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
