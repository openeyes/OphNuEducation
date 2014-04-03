<?php 
class m140403_102643_event_type_OphNuEducation extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuEducation'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuEducation', 'name' => 'Education','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuEducation'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient ID',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient ID','class_name' => 'Element_OphNuEducation_PatientId', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient ID'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Translator',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphNuEducation_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Translator'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Care givers',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Care givers','class_name' => 'Element_OphNuEducation_CareGivers', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Care givers'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Checklist',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Checklist','class_name' => 'Element_OphNuEducation_Checklist', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Checklist'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Instructions',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Instructions','class_name' => 'Element_OphNuEducation_PatientInstructions', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Instructions'))->queryRow();



		$this->createTable('et_ophnueducation_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_identifed' => 'tinyint(1) unsigned NOT NULL',

				'dob' => 'tinyint(1) unsigned NOT NULL',

				'patient_name' => 'tinyint(1) unsigned NOT NULL',

				'parent_caregiver' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnueducation_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnueducation_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophnueducation_patientid_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnueducation_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnueducation_translator_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_translator_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_translator_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_translator_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_translator_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_translator_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnueducation_translator_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnueducation_translator_translator_present',array('name'=>'N/A','display_order'=>3));



		$this->createTable('et_ophnueducation_translator', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL',

				'name_of_translator' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnueducation_translator_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnueducation_translator_cui_fk` (`created_user_id`)',
				'KEY `et_ophnueducation_translator_ev_fk` (`event_id`)',
				'KEY `ophnueducation_translator_translator_present_fk` (`translator_present_id`)',
				'CONSTRAINT `et_ophnueducation_translator_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_translator_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_translator_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnueducation_translator_translator_present_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophnueducation_translator_translator_present` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnueducation_caregivers_caregivers_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_caregivers_caregivers_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_caregivers_caregivers_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_caregivers_caregivers_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_caregivers_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_caregivers_caregivers_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnueducation_caregivers_caregivers_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnueducation_caregivers_caregivers_present',array('name'=>'N/A','display_order'=>3));

		$this->createTable('ophnueducation_caregivers_relationship', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_caregivers_relationship_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_caregivers_relationship_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_caregivers_relationship',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnueducation_caregivers_relationship',array('name'=>'Father','display_order'=>2));

		$this->createTable('ophnueducation_caregivers_relationship', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_caregivers_relationship_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_caregivers_relationship_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_caregivers_relationship',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnueducation_caregivers_relationship',array('name'=>'Father','display_order'=>2));



		$this->createTable('et_ophnueducation_caregivers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'caregivers_present_id' => 'int(10) unsigned NOT NULL',

				'name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'relationship_id' => 'int(10) unsigned NOT NULL',

				'name2' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'relationship_id' => 'int(10) unsigned NOT NULL',

				'consent_signed' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnueducation_caregivers_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnueducation_caregivers_cui_fk` (`created_user_id`)',
				'KEY `et_ophnueducation_caregivers_ev_fk` (`event_id`)',
				'KEY `ophnueducation_caregivers_caregivers_present_fk` (`caregivers_present_id`)',
				'KEY `ophnueducation_caregivers_relationship_fk` (`relationship_id`)',
				'KEY `ophnueducation_caregivers_relationship_fk` (`relationship_id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_caregivers_present_fk` FOREIGN KEY (`caregivers_present_id`) REFERENCES `ophnueducation_caregivers_caregivers_present` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_fk` FOREIGN KEY (`relationship_id`) REFERENCES `ophnueducation_caregivers_relationship` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_fk` FOREIGN KEY (`relationship_id`) REFERENCES `ophnueducation_caregivers_relationship` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnueducation_checklist', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgical_examination' => 'tinyint(1) unsigned NOT NULL',

				'anesthesia_assessment' => 'tinyint(1) unsigned NOT NULL',

				'biometry' => 'tinyint(1) unsigned NOT NULL',

				'patient_rights' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnueducation_checklist_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnueducation_checklist_cui_fk` (`created_user_id`)',
				'KEY `et_ophnueducation_checklist_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnueducation_checklist_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_checklist_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_checklist_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnueducation_patientinstructions', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'adult_instructions' => 'tinyint(1) unsigned NOT NULL',

				'young_children' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'laser_injection_patients' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnueducation_patientinstructions_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnueducation_patientinstructions_cui_fk` (`created_user_id`)',
				'KEY `et_ophnueducation_patientinstructions_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnueducation_patientinstructions_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_patientinstructions_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_patientinstructions_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophnueducation_patientid');



		$this->dropTable('et_ophnueducation_translator');


		$this->dropTable('ophnueducation_translator_translator_present');

		$this->dropTable('et_ophnueducation_caregivers');


		$this->dropTable('ophnueducation_caregivers_caregivers_present');
		$this->dropTable('ophnueducation_caregivers_relationship');
		$this->dropTable('ophnueducation_caregivers_relationship');

		$this->dropTable('et_ophnueducation_checklist');



		$this->dropTable('et_ophnueducation_patientinstructions');




		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuEducation'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}

