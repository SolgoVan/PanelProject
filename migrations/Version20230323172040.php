<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323172040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, stats_id INT DEFAULT NULL, arumure INT DEFAULT NULL, frein INT DEFAULT NULL, moteur INT DEFAULT NULL, suspension INT DEFAULT NULL, transmission INT DEFAULT NULL, turbo INT DEFAULT NULL, UNIQUE INDEX UNIQ_574767AA70AA3482 (stats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA70AA3482 FOREIGN KEY (stats_id) REFERENCES vehicle (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AA70AA3482');
        $this->addSql('DROP TABLE stats');
    }
}
