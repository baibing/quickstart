<?php
class Migration_1360795773_groupregist extends Mooduino_Db_Migrations_Migration_Abstract {

	public function __construct() {
		parent::__construct('groupregist', 1360795773);
	}

	public function up() {
	    return 'CREATE TABLE `groupregist` (
	             `id` bigint(20) NOT NULL AUTO_INCREMENT,
	             `text` longtext NOT NULL,
	             `title` varchar(255) NOT NULL,
	             `priority` int(11) NOT NULL,
	             PRIMARY KEY (`id`),
	             UNIQUE KEY `Search` (`title`),
	             KEY `Priority` (`priority`)
	            );
	    ';
	}

	public function down() {
    	return 'DROP TABLE `groupregist`;';
	}
}

