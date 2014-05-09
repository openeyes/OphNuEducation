<?php

class m140509_114836_data_changes extends CDbMigration
{
	public function up()
	{
		$this->insert('ophnueducation_caregivers_relationship_1',array('id'=>3,'name'=>'Relative','display_order'=>3));
		$this->insert('ophnueducation_caregivers_relationship_1',array('id'=>4,'name'=>'Other','display_order'=>4));
		$this->insert('ophnueducation_caregivers_relationship_2',array('id'=>3,'name'=>'Relative','display_order'=>3));
		$this->insert('ophnueducation_caregivers_relationship_2',array('id'=>4,'name'=>'Other','display_order'=>4));

		$this->createTable('ophnueducation_checklist_biometry', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_checklist_biometry_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_checklist_biometry_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_checklist_biometry_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_checklist_biometry_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_checklist_biometry',array('id'=>1,'name'=>'Yes','display_order'=>1));
		$this->insert('ophnueducation_checklist_biometry',array('id'=>2,'name'=>'No','display_order'=>2));
		$this->insert('ophnueducation_checklist_biometry',array('id'=>3,'name'=>'N/A','display_order'=>3));

		$this->alterColumn('et_ophnueducation_checklist','biometry','int(10) unsigned null');
		$this->renameColumn('et_ophnueducation_checklist','biometry','biometry_id');
		$this->createIndex('et_ophnueducation_checklist_biometry_fk','et_ophnueducation_checklist','biometry_id');
		$this->update('et_ophnueducation_checklist',array('biometry_id' => null),"biometry_id = 0");
		$this->addForeignKey('et_ophnueducation_checklist_biometry_fk','et_ophnueducation_checklist','biometry_id','ophnueducation_checklist_biometry','id');

		$this->addColumn('et_ophnueducation_checklist','instructions_provided','tinyint(1) unsigned not null');

		$this->createTable('ophnueducation_patientid_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_patientid_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_patientid_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_patientid_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_patientid_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_patientid_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnueducation_patientid_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnueducation_patientid_translator_present',array('name'=>'N/A','display_order'=>3));

		$this->createTable('ophnueducation_patientid_caregivers_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_patientid_caregivers_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_patientid_caregivers_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_patientid_caregivers_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_patientid_caregivers_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_patientid_caregivers_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnueducation_patientid_caregivers_present',array('name'=>'No','display_order'=>2));

		$this->createTable('ophnueducation_patientid_relationship', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_patientid_relationship_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_patientid_relationship_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_patientid_relationship_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_patientid_relationship_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_patientid_relationship',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnueducation_patientid_relationship',array('name'=>'Father','display_order'=>2));
		$this->insert('ophnueducation_patientid_relationship',array('name'=>'Relative','display_order'=>3));
		$this->insert('ophnueducation_patientid_relationship',array('name'=>'Other','display_order'=>4));

		$this->addColumn('et_ophnueducation_patientid','translator_present_id','int(10) unsigned null');
		$this->createIndex('et_ophnueducation_patientid_translator_present_id_fk','et_ophnueducation_patientid','translator_present_id');
		$this->addForeignKey('et_ophnueducation_patientid_translator_present_id_fk','et_ophnueducation_patientid','translator_present_id','ophnueducation_patientid_translator_present','id');

		$this->addColumn('et_ophnueducation_patientid','translator_name','varchar(255) not null');

		$this->addColumn('et_ophnueducation_patientid','caregivers_present_id','int(10) unsigned null');
		$this->createIndex('et_ophnueducation_patientid_cpid_fk','et_ophnueducation_patientid','caregivers_present_id');
		$this->addForeignKey('et_ophnueducation_patientid_cpid_fk','et_ophnueducation_patientid','caregivers_present_id','ophnueducation_patientid_caregivers_present','id');

		$this->addColumn('et_ophnueducation_patientid','caregiver_name1','varchar(255) not null');
		$this->addColumn('et_ophnueducation_patientid','caregiver_name2','varchar(255) not null');

		$this->addColumn('et_ophnueducation_patientid','caregiver_relationship1_id','int(10) unsigned null');
		$this->createIndex('et_ophnueducation_patientid_cr1_fk','et_ophnueducation_patientid','caregiver_relationship1_id');
		$this->addForeignKey('et_ophnueducation_patientid_cr1_fk','et_ophnueducation_patientid','caregiver_relationship1_id','ophnueducation_patientid_relationship','id');

		$this->addColumn('et_ophnueducation_patientid','caregiver_relationship2_id','int(10) unsigned null');
		$this->createIndex('et_ophnueducation_patientid_cr2_fk','et_ophnueducation_patientid','caregiver_relationship2_id');
		$this->addForeignKey('et_ophnueducation_patientid_cr2_fk','et_ophnueducation_patientid','caregiver_relationship2_id','ophnueducation_patientid_relationship','id');

		$this->dropTable('et_ophnueducation_translator');
		$this->dropTable('ophnueducation_translator_translator_present');
		$this->delete('element_type',"class_name = 'Element_OphNuEducation_Translator'");

		$this->dropTable('et_ophnueducation_caregivers');
		$this->dropTable('ophnueducation_caregivers_relationship_1');
		$this->dropTable('ophnueducation_caregivers_relationship_2');
		$this->dropTable('ophnueducation_caregivers_caregivers_present');
		$this->delete('element_type',"class_name = 'Element_OphNuEducation_CareGivers'");
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuEducation'))->queryRow();
		$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphNuEducation_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		$this->insert('element_type', array('name' => 'Care givers','class_name' => 'Element_OphNuEducation_CareGivers', 'event_type_id' => $event_type['id'], 'display_order' => 1));

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

		$this->createTable('ophnueducation_caregivers_relationship_1', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_caregivers_relationship_1_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_caregivers_relationship_1_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_1_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_1_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_caregivers_relationship_1',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnueducation_caregivers_relationship_1',array('name'=>'Father','display_order'=>2));

		$this->createTable('ophnueducation_caregivers_relationship_2', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_caregivers_relationship_2_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_caregivers_relationship_2_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_2_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_2_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnueducation_caregivers_relationship_2',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnueducation_caregivers_relationship_2',array('name'=>'Father','display_order'=>2));

		$this->createTable('et_ophnueducation_caregivers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'caregivers_present_id' => 'int(10) unsigned NOT NULL',

				'relationship_1_name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'relationship_1_id' => 'int(10) unsigned NOT NULL',

				'relationship_2_name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'relationship_2_id' => 'int(10) unsigned NOT NULL',

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
				'KEY `ophnueducation_caregivers_relationship_1_fk` (`relationship_1_id`)',
				'KEY `ophnueducation_caregivers_relationship_2_fk` (`relationship_2_id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnueducation_caregivers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_caregivers_present_fk` FOREIGN KEY (`caregivers_present_id`) REFERENCES `ophnueducation_caregivers_caregivers_present` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_1_fk` FOREIGN KEY (`relationship_1_id`) REFERENCES `ophnueducation_caregivers_relationship_1` (`id`)',
				'CONSTRAINT `ophnueducation_caregivers_relationship_2_fk` FOREIGN KEY (`relationship_2_id`) REFERENCES `ophnueducation_caregivers_relationship_2` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropForeignKey('et_ophnueducation_patientid_cr2_fk','et_ophnueducation_patientid');
		$this->dropIndex('et_ophnueducation_patientid_cr2_fk','et_ophnueducation_patientid');
		$this->dropColumn('et_ophnueducation_patientid','caregiver_relationship2_id');

		$this->dropForeignKey('et_ophnueducation_patientid_cr1_fk','et_ophnueducation_patientid');
		$this->dropIndex('et_ophnueducation_patientid_cr1_fk','et_ophnueducation_patientid');
		$this->dropColumn('et_ophnueducation_patientid','caregiver_relationship1_id');

		$this->dropColumn('et_ophnueducation_patientid','caregiver_name1');
		$this->dropColumn('et_ophnueducation_patientid','caregiver_name2');

		$this->dropForeignKey('et_ophnueducation_patientid_cpid_fk','et_ophnueducation_patientid');
		$this->dropIndex('et_ophnueducation_patientid_cpid_fk','et_ophnueducation_patientid');
		$this->dropColumn('et_ophnueducation_patientid','caregivers_present_id');

		$this->dropColumn('et_ophnueducation_patientid','translator_name');

		$this->dropForeignKey('et_ophnueducation_patientid_translator_present_id_fk','et_ophnueducation_patientid');
		$this->dropIndex('et_ophnueducation_patientid_translator_present_id_fk','et_ophnueducation_patientid');
		$this->dropColumn('et_ophnueducation_patientid','translator_present_id');

		$this->dropTable('ophnueducation_patientid_relationship');
		$this->dropTable('ophnueducation_patientid_caregivers_present');
		$this->dropTable('ophnueducation_patientid_translator_present');

		$this->dropColumn('et_ophnueducation_checklist','instructions_provided');

		$this->dropForeignKey('et_ophnueducation_checklist_biometry_fk','et_ophnueducation_checklist');
		$this->dropIndex('et_ophnueducation_checklist_biometry_fk','et_ophnueducation_checklist');
		$this->renameColumn('et_ophnueducation_checklist','biometry_id','biometry');
		$this->alterColumn('et_ophnueducation_checklist','biometry','tinyint(1) unsigned not null');

		$this->dropTable('ophnueducation_checklist_biometry');

		$this->delete('ophnueducation_caregivers_relationship_1',"id in (3,4)");
		$this->delete('ophnueducation_caregivers_relationship_2',"id in (3,4)");
	}
}
