<?php

class m140723_073008_patient_id_consistency extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophnueducation_patientid_identifier_assignment_version');
		$this->dropTable('ophnueducation_patientid_identifier_assignment');
		$this->dropTable('ophnueducation_patientid_identifier_version');
		$this->dropTable('ophnueducation_patientid_identifier');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophnueducation_patientid_identifier` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) COLLATE utf8_bin NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnueducation_patientid_identifier_lmui_fk` (`last_modified_user_id`),
	KEY `ophnueducation_patientid_identifier_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnueducation_patientid_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnueducation_patientid_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnueducation_patientid_identifier');

		$this->execute("CREATE TABLE `ophnueducation_patientid_identifier_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`identifier_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnueducation_patientid_identifier_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophnueducation_patientid_identifier_assignment_cui_fk` (`created_user_id`),
	KEY `ophnueducation_patientid_identifier_assignment_ele_fk` (`element_id`),
	KEY `ophnueducation_patientid_identifier_assignment_idi_fk` (`identifier_id`),
	CONSTRAINT `ophnueducation_patientid_identifier_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnueducation_patientid_identifier_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnueducation_patientid_identifier_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnueducation_patientid` (`id`),
	CONSTRAINT `ophnueducation_patientid_identifier_assignment_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophnueducation_patientid_identifier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnueducation_patientid_identifier_assignment');
	}
}
