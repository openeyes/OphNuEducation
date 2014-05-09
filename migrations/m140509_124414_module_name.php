<?php

class m140509_124414_module_name extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Patient education'),"class_name = 'OphNuEducation'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Education'),"class_name = 'OphNuEducation'");
	}
}
