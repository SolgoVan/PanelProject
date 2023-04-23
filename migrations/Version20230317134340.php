<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317134340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE health ADD citoyen_id INT NOT NULL');
        $this->addSql('ALTER TABLE health ADD CONSTRAINT FK_CEDA231343787BBA FOREIGN KEY (citoyen_id) REFERENCES citoyen (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CEDA231343787BBA ON health (citoyen_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE health DROP FOREIGN KEY FK_CEDA231343787BBA');
        $this->addSql('DROP INDEX UNIQ_CEDA231343787BBA ON health');
        $this->addSql('ALTER TABLE health DROP citoyen_id');
    }
}
