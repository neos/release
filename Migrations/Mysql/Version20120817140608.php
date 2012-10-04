<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Remove release notes table, add release notes uri field to branch.
 * Adjusts nullability as well.
 */
class Version20120817140608 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("DROP TABLE typo3_release_domain_model_releasenotes");

		$this->addSql("ALTER TABLE typo3_release_domain_model_download CHANGE label `label` VARCHAR(255) NOT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_downloadformat CHANGE filename filename VARCHAR(255) NOT NULL, CHANGE url url VARCHAR(255) NOT NULL, CHANGE sha1 sha1 VARCHAR(255) NOT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_product CHANGE name name VARCHAR(255) NOT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_release CHANGE version version VARCHAR(255) NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE status status VARCHAR(255) NOT NULL, CHANGE changeloguri changeloguri VARCHAR(255) NOT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_branch ADD releasenotesurl VARCHAR(255) NOT NULL, CHANGE version version VARCHAR(255) NOT NULL, CHANGE phpversions phpversions VARCHAR(255) NOT NULL, CHANGE mysqlversions mysqlversions VARCHAR(255) NOT NULL, CHANGE giturl giturl VARCHAR(255) NOT NULL");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE typo3_release_domain_model_releasenotes (flow3_persistence_identifier VARCHAR(40) NOT NULL, teaser VARCHAR(255) DEFAULT NULL, article VARCHAR(255) DEFAULT NULL, PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");

		$this->addSql("ALTER TABLE typo3_release_domain_model_branch DROP releasenotesurl, CHANGE version version VARCHAR(255) DEFAULT NULL, CHANGE phpversions phpversions VARCHAR(255) DEFAULT NULL, CHANGE mysqlversions mysqlversions VARCHAR(255) DEFAULT NULL, CHANGE giturl giturl VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_download CHANGE label `label` VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_downloadformat CHANGE filename filename VARCHAR(255) DEFAULT NULL, CHANGE url url VARCHAR(255) DEFAULT NULL, CHANGE sha1 sha1 VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_product CHANGE name name VARCHAR(255) DEFAULT NULL");
		$this->addSql("ALTER TABLE typo3_release_domain_model_release CHANGE version version VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE changeloguri changeloguri VARCHAR(255) DEFAULT NULL");
	}
}

?>