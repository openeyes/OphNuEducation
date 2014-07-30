<?php

class m140730_140559_checkbox_changes extends OEMigration
{
	public function up()
	{
		$this->createTable('ophnueducation_checklist_ana_preop', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(16) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnueducation_checklist_ana_preop_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnueducation_checklist_ana_preop_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnueducation_checklist_ana_preop_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnueducation_checklist_ana_preop_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnueducation_checklist_ana_preop');

		$this->initialiseData(dirname(__FILE__));

		$this->renameColumn('et_ophnueducation_checklist','anesthesia_assessment','anesthesia_assessment_id');
		$this->alterColumn('et_ophnueducation_checklist','anesthesia_assessment_id','int(10) unsigned not null');

		$this->renameColumn('et_ophnueducation_checklist_version','anesthesia_assessment','anesthesia_assessment_id');
		$this->alterColumn('et_ophnueducation_checklist_version','anesthesia_assessment_id','int(10) unsigned null');

		$this->update('et_ophnueducation_checklist',array('anesthesia_assessment_id' => 2),"anesthesia_assessment_id = 0");
		$this->update('et_ophnueducation_checklist_version',array('anesthesia_assessment_id' => 2),"anesthesia_assessment_id = 0");

		$this->addForeignKey('et_ophnueducation_checklist_anesthesia_assessment_fk','et_ophnueducation_checklist','anesthesia_assessment_id','ophnueducation_checklist_ana_preop','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnueducation_checklist_anesthesia_assessment_fk','et_ophnueducation_checklist');

		$this->update('et_ophnueducation_checklist_version',array('anesthesia_assessment_id' => 0),"anesthesia_assessment_id = 2");
		$this->update('et_ophnueducation_checklist',array('anesthesia_assessment_id' => 0),"anesthesia_assessment_id = 2");

		$this->alterColumn('et_ophnueducation_checklist_version','anesthesia_assessment_id','tinyint(1) unsigned not null');
		$this->renameColumn('et_ophnueducation_checklist_version','anesthesia_assessment_id','anesthesia_assessment');

		$this->alterColumn('et_ophnueducation_checklist','anesthesia_assessment_id','tinyint(1) unsigned not null');
		$this->renameColumn('et_ophnueducation_checklist','anesthesia_assessment_id','anesthesia_assessment');

		$this->dropTable('ophnueducation_checklist_ana_preop_version');
		$this->dropTable('ophnueducation_checklist_ana_preop');
	}
}
