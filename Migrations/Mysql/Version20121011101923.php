<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema,
	TYPO3\Flow\Persistence\Doctrine\Service;

/**
 * Adjust object identifier column
 */
class Version20121011101923 extends AbstractMigration {

	/**
	 * Tables where the identity column should be adjusted.
	 *
	 * @var array
	 */
	protected $tables = array(
		'typo3_release_domain_model_branch',
		'typo3_release_domain_model_download',
		'typo3_release_domain_model_downloadformat',
		'typo3_release_domain_model_product',
		'typo3_release_domain_model_release'
	);

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql');

			// collect foreign keys pointing to "our" tables
		$foreignKeyHandlingSql = Service::getForeignKeyHandlingSql($schema, $this->platform, $this->tables, 'flow3_persistence_identifier', 'persistence_object_identifier');

			// drop FK constraints
		foreach ($foreignKeyHandlingSql['drop'] as $sql) {
			$this->addSql($sql);
		}

			// rename identifier fields
		foreach ($this->tables as $tableName) {
			$this->addSql('ALTER TABLE ' . $tableName . ' DROP PRIMARY KEY');
			$this->addSql('ALTER TABLE ' . $tableName . ' CHANGE flow3_persistence_identifier persistence_object_identifier VARCHAR(40) NOT NULL');
			$this->addSql('ALTER TABLE ' . $tableName . ' ADD PRIMARY KEY (persistence_object_identifier)');
		}

			// add back FK constraints
		foreach ($foreignKeyHandlingSql['add'] as $sql) {
			$this->addSql($sql);
		}
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

			// collect foreign keys pointing to "our" tables
		$foreignKeyHandlingSql = Service::getForeignKeyHandlingSql($schema, $this->platform, $this->tables, 'persistence_object_identifier', 'flow3_persistence_identifier');

			// drop FK constraints
		foreach ($foreignKeyHandlingSql['drop'] as $sql) {
			$this->addSql($sql);
		}

		// rename identifier fields
		foreach ($this->tables as $tableName) {
			$this->addSql('ALTER TABLE ' . $tableName . ' DROP PRIMARY KEY');
			$this->addSql('ALTER TABLE ' . $tableName . ' CHANGE persistence_object_identifier flow3_persistence_identifier VARCHAR(40) NOT NULL');
			$this->addSql('ALTER TABLE ' . $tableName . ' ADD PRIMARY KEY (flow3_persistence_identifier)');
		}

			// add back FK constraints
		foreach ($foreignKeyHandlingSql['add'] as $sql) {
			$this->addSql($sql);
		}
	}
}

?>