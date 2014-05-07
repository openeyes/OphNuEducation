<?php

class m140507_185400_nullable_foreign_keys extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnueducation_translator','translator_present_id','int(10) unsigned null');
		$this->alterColumn('et_ophnueducation_caregivers','caregivers_present_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnueducation_translator','translator_present_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnueducation_caregivers','caregivers_present_id','int(10) unsigned not null');
	}
}
