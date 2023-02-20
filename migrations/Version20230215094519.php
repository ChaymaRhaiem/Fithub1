<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215094519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation_event ADD utilisateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participation_event ADD CONSTRAINT FK_3472872C1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_3472872C1E969C5 ON participation_event (utilisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation_event DROP FOREIGN KEY FK_3472872C1E969C5');
        $this->addSql('DROP INDEX IDX_3472872C1E969C5 ON participation_event');
        $this->addSql('ALTER TABLE participation_event DROP utilisateurs_id');
    }
}
