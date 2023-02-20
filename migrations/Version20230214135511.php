<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214135511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation_utilisateur (consultation_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_F8F7153B62FF6CDF (consultation_id), INDEX IDX_F8F7153BFB88E14F (utilisateur_id), PRIMARY KEY(consultation_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation_utilisateur ADD CONSTRAINT FK_F8F7153B62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation_utilisateur ADD CONSTRAINT FK_F8F7153BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation_utilisateur DROP FOREIGN KEY FK_F8F7153B62FF6CDF');
        $this->addSql('ALTER TABLE consultation_utilisateur DROP FOREIGN KEY FK_F8F7153BFB88E14F');
        $this->addSql('DROP TABLE consultation_utilisateur');
    }
}
