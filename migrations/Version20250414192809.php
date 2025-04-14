<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250414192809 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'make slug and timestamps not nullables';
	}

	public function up(Schema $schema): void
	{
		
		$this->addSql('UPDATE starship SET slug = id, updated_at = arrived_at, created_at = arrived_at');
		// this up() migration is auto-generated, please modify it to your needs
		$this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__starship AS SELECT id, name, class, captain, status, arrived_at, slug, updated_at, created_at FROM starship
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE starship
        SQL);
		$this->addSql(<<<'SQL'
            CREATE TABLE starship (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, captain VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, arrived_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            )
        SQL);
		$this->addSql(<<<'SQL'
            INSERT INTO starship (id, name, class, captain, status, arrived_at, slug, updated_at, created_at) SELECT id, name, class, captain, status, arrived_at, slug, updated_at, created_at FROM __temp__starship
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE __temp__starship
        SQL);
		$this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_C414E64A989D9B62 ON starship (slug)
        SQL);
	}

	public function down(Schema $schema): void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__starship AS SELECT id, name, class, captain, status, arrived_at, slug, updated_at, created_at FROM starship
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE starship
        SQL);
		$this->addSql(<<<'SQL'
            CREATE TABLE starship (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, captain VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, arrived_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , slug VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL)
        SQL);
		$this->addSql(<<<'SQL'
            INSERT INTO starship (id, name, class, captain, status, arrived_at, slug, updated_at, created_at) SELECT id, name, class, captain, status, arrived_at, slug, updated_at, created_at FROM __temp__starship
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE __temp__starship
        SQL);
	}
}
