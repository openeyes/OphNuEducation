<?php

class m140603_131743_fix_element_name extends CDbMigration
{
	public function up()
	{
		$this->update('element_type',array('name' => 'Patient ID verification'),"class_name = 'Element_OphNuEducation_PatientId'");
	}

	public function down()
	{
		$this->update('element_type',array('name' => 'Patient ID'),"class_name = 'Element_OphNuEducation_PatientId'");
	}
}
