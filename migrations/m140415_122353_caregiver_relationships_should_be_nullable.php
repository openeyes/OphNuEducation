<?php

class m140415_122353_caregiver_relationships_should_be_nullable extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnueducation_caregivers','relationship_1_id','int(10) unsigned null');
		$this->alterColumn('et_ophnueducation_caregivers','relationship_2_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnueducation_caregivers','relationship_1_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnueducation_caregivers','relationship_2_id','int(10) unsigned not null');
	}
}
