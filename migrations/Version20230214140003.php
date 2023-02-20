<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214140003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_utilisateur (fiche_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_3E6B5208DF522508 (fiche_id), INDEX IDX_3E6B5208FB88E14F (utilisateur_id), PRIMARY KEY(fiche_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_utilisateur ADD CONSTRAINT FK_3E6B5208DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_utilisateur ADD CONSTRAINT FK_3E6B5208FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_utilisateur DROP FOREIGN KEY FK_3E6B5208DF522508');
        $this->addSql('ALTER TABLE fiche_utilisateur DROP FOREIGN KEY FK_3E6B5208FB88E14F');
        $this->addSql('DROP TABLE fiche_utilisateur');
    }
}
