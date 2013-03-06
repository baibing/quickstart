<?php
class Migration_1361565387_GroupInfo extends Mooduino_Db_Migrations_Migration_Abstract {

	public function __construct() {
		parent::__construct('GroupInfo', 1361565387);
	}

	public function up() {
		$sql = "CREATE TABLE GroupInfo(
					id INT NOT NULL AUTO_INCREMENT,
					name VARCHAR(40) NOT NULL,
					type VARCHAR(40) NOT NULL,
					studentSize INT NOT NULL,
					adultSize INT NOT NULL,
					totalSize INT NOT NULL,
					payment VARCHAR(20) NOT NULL,
					parking BOOL NOT NULL,
					busName VARCHAR(40) NOT NULL,
					PRIMARY KEY (id)
		);";
		
		return $sql;
	}

	public function down() {
		return "DROP TABLE GroupLeader;";
	}
}

