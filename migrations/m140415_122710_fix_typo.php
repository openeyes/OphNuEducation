<?php

class m140415_122710_fix_typo extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophnueducation_patientid','patient_identifed','patient_identified');
	}

	public function down()
	{
		$this->renameColumn('et_ophnueducation_patientid','patient_identified','patient_identifed');
	}
}
