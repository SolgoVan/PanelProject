<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403073510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE citoyen ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE citoyen ADD CONSTRAINT FK_8E7EF6ACA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES society (id)');
        $this->addSql('CREATE INDEX IDX_8E7EF6ACA4AEAFEA ON citoyen (entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE citoyen DROP FOREIGN KEY FK_8E7EF6ACA4AEAFEA');
        $this->addSql('DROP INDEX IDX_8E7EF6ACA4AEAFEA ON citoyen');
        $this->addSql('ALTER TABLE citoyen DROP entreprise_id');
    }
}
