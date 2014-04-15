<?php

class m140415_121816_consent_signed_field_should_be_in_checklist_element extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnueducation_caregivers','consent_signed');
		$this->addColumn('et_ophnueducation_checklist','consent_signed','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnueducation_checklist','consent_signed');
		$this->addColumn('et_ophnueducation_caregivers','consent_signed','tinyint(1) unsigned not null');
	}
}
