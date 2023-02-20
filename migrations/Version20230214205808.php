<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214205808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planning_seance (planning_id INT NOT NULL, seance_id INT NOT NULL, INDEX IDX_BF5CDF613D865311 (planning_id), INDEX IDX_BF5CDF61E3797A94 (seance_id), PRIMARY KEY(planning_id, seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planning_seance ADD CONSTRAINT FK_BF5CDF613D865311 FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_seance ADD CONSTRAINT FK_BF5CDF61E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning_seance DROP FOREIGN KEY FK_BF5CDF613D865311');
        $this->addSql('ALTER TABLE planning_seance DROP FOREIGN KEY FK_BF5CDF61E3797A94');
        $this->addSql('DROP TABLE planning_seance');
    }
}
