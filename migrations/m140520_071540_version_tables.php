<?php

class m140520_071540_version_tables extends OEMigration
{
	public $tables = array(
		'et_ophnueducation_checklist',
		'et_ophnueducation_patientid',
		'et_ophnueducation_patientinstructions',
		'ophnueducation_checklist_biometry',
		'ophnueducation_patientid_caregivers_present',
		'ophnueducation_patientid_identifier',
		'ophnueducation_patientid_identifier_assignment',
		'ophnueducation_patientid_relationship',
		'ophnueducation_patientid_translator_present',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->versionExistingTable($table);
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropTable($table.'_version');
		}
	}
}
