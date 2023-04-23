<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413081849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ppa (id INT AUTO_INCREMENT NOT NULL, citoyen_id INT DEFAULT NULL, exam_ems TINYINT(1) NOT NULL, exam_lspd TINYINT(1) NOT NULL, ppa TINYINT(1) NOT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_BE3A997A43787BBA (citoyen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ppa ADD CONSTRAINT FK_BE3A997A43787BBA FOREIGN KEY (citoyen_id) REFERENCES citoyen (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ppa DROP FOREIGN KEY FK_BE3A997A43787BBA');
        $this->addSql('DROP TABLE ppa');
    }
}
