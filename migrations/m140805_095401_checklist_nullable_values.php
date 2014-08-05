<?php

class m140805_095401_checklist_nullable_values extends OEMigration
{
	public function up()
	{
		// No need to adjust version table schema as it's already in the format we require. See m140730_140559_checkbox_changes.php
		$this->alterColumn('et_ophnueducation_checklist','anesthesia_assessment_id','int(10) unsigned null');
		$this->refreshTableSchema('et_ophnueducation_checklist');
	}

	public function down()
	{
		$this->alterColumn('et_ophnueducation_checklist','anesthesia_assessment_id','int(10) unsigned not null');
		$this->refreshTableSchema('et_ophnueducation_checklist');
	}
}