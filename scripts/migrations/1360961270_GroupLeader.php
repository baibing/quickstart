<?php
class Migration_1360961270_GroupLeader extends Mooduino_Db_Migrations_Migration_Abstract {

	public function __construct() {
		parent::__construct('GroupLeader', 1360961270);
	}

	public function up() {
		$sql = "CREATE TABLE GroupLeader(
					id INT NOT NULL AUTO_INCREMENT,
					firstName VARCHAR(20) NOT NULL,
					lastName VARCHAR(20) NOT NULL,
					email VARCHAR(45) NOT NULL,
					phone INT NOT NULL,
					street VARCHAR(45) NOT NULL,
					city VARCHAR(20) NOT NULL,
					state VARCHAR(20) NOT NULL,
					zipcode INT NOT NULL,
					PRIMARY KEY (id)
		);";
		
		return $sql;
	}

	public function down() {
		return "DROP TABLE GroupLeader;";
	}
}

