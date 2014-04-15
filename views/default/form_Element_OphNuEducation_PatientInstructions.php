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
		<div class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuEducation_Checklist_adult_instructions"></label>
			</div>
			<div class="large-9 column">
				<?php echo $form->checkBox($element, 'adult_instructions', array('nowrapper' => true), array('label' => 3, 'field' => 4))?>
			</div>
		</div>
		<div class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuEducation_Checklist_young_children"></label>
			</div>
			<div class="large-9 column">
				<?php echo $form->checkBox($element, 'young_children', array('nowrapper' => true), array('label' => 3, 'field' => 4))?>
			</div>
		</div>
		<div class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuEducation_Checklist_laser_injection_patients"></label>
			</div>
			<div class="large-9 column">
				<?php echo $form->checkBox($element, 'laser_injection_patients', array('nowrapper' => true), array('label' => 3, 'field' => 4))?>
			</div>
		</div>
		<?php echo $form->textArea($element, 'comments', array(), false, array(), array('label' => 3, 'field' => 5))?>
	</div>
</section>
