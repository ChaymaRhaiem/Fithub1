<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223211944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket CHANGE disponibilite disponibilite TINYINT(1) NOT NULL, CHANGE prix prix INT NOT NULL, CHANGE nombre_max nombre_max INT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE booking_date booking_date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket CHANGE disponibilite disponibilite TINYINT(1) DEFAULT NULL, CHANGE prix prix INT DEFAULT NULL, CHANGE nombre_max nombre_max INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE booking_date booking_date DATETIME DEFAULT NULL');
    }
}
