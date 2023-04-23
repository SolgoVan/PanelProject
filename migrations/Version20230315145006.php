<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315145006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE health (id INT AUTO_INCREMENT NOT NULL, taille INT DEFAULT NULL, poids INT DEFAULT NULL, tabac VARCHAR(50) NOT NULL, alcool VARCHAR(50) NOT NULL, drogue VARCHAR(50) NOT NULL, allergie TINYINT(1) NOT NULL, comment_allergie VARCHAR(255) DEFAULT NULL, diabete TINYINT(1) NOT NULL, comment_diabete VARCHAR(255) DEFAULT NULL, asthme TINYINT(1) NOT NULL, comment_asthme VARCHAR(255) DEFAULT NULL, cardiaque TINYINT(1) NOT NULL, comment_cardiaque VARCHAR(255) DEFAULT NULL, epilepsie TINYINT(1) NOT NULL, comment_epilepsie VARCHAR(255) DEFAULT NULL, antecedent TINYINT(1) NOT NULL, comment_boolean VARCHAR(255) DEFAULT NULL, traitement TINYINT(1) NOT NULL, comment_traitement VARCHAR(255) DEFAULT NULL, groupe_sanguin VARCHAR(5) NOT NULL, comment_general VARCHAR(255) DEFAULT NULL, urg_nom VARCHAR(50) DEFAULT NULL, urg_prenom VARCHAR(50) DEFAULT NULL, urg_telephone VARCHAR(30) DEFAULT NULL, comment_urg VARCHAR(255) DEFAULT NULL, post_it VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE health');
    }
}
