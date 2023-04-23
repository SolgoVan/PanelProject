<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316131558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medical_file (id INT AUTO_INCREMENT NOT NULL, motif VARCHAR(255) NOT NULL, examen VARCHAR(255) NOT NULL, soin VARCHAR(255) NOT NULL, doc VARCHAR(255) NOT NULL, annexe VARCHAR(255) NOT NULL, date DATETIME NOT NULL, montant INT NOT NULL, facture TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX id ON health');
        $this->addSql('ALTER TABLE health CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE taille taille VARCHAR(255) DEFAULT NULL, CHANGE poids poids VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE medical_file');
        $this->addSql('ALTER TABLE health CHANGE id id INT NOT NULL, CHANGE taille taille VARCHAR(5) DEFAULT NULL, CHANGE poids poids VARCHAR(5) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX id ON health (id)');
    }
}
