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
	<div class="element-data">
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_identified'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_identified ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->patient_identified) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('identifiers'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->identifiers) {?>
								None
							<?php } else {?>
									<?php foreach ($element->identifiers as $item) {
										echo $item->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator_present_id'))?>?</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->translator_present) ? 'Not recorded' : ($element->translator_present ? $element->translator_present->name : 'None')?></div></div>
		</div>
		<?php if ($element->translator_present && $element->translator_present->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator_name'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->translator_name)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('caregivers_present_id'))?>?</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->caregivers_present) ? 'Not recorded' : ($element->caregivers_present ? $element->caregivers_present->name : 'None')?></div></div>
		</div>
		<?php if ($element->caregivers_present && $element->caregivers_present->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('caregiver_name1'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->caregiver_name1)?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('caregiver_relationship1_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->relationship_1 ? $element->relationship_1->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('caregiver_name2'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->caregiver_name2)?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('caregiver_relationship2_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->relationship_2 ? $element->relationship_2->name : 'None'?></div></div>
			</div>
		<?php }?>
	</div>
