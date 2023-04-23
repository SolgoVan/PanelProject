<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407083435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permis ADD citoyen_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE permis ADD CONSTRAINT FK_1738945343787BBA FOREIGN KEY (citoyen_id) REFERENCES citoyen (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1738945343787BBA ON permis (citoyen_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permis DROP FOREIGN KEY FK_1738945343787BBA');
        $this->addSql('DROP INDEX UNIQ_1738945343787BBA ON permis');
        $this->addSql('ALTER TABLE permis DROP citoyen_id');
    }
}
