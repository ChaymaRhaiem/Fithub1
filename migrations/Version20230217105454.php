<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217105454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, pack_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, etat VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_351268BB1919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categories_id INT DEFAULT NULL, blog_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATE NOT NULL, image LONGBLOB DEFAULT NULL, INDEX IDX_23A0E66A21214B7 (categories_id), INDEX IDX_23A0E66DAE07E97 (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_article (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, description_categorie LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, articles_id INT DEFAULT NULL, utilisateurs_id INT DEFAULT NULL, date_commentaire DATE NOT NULL, description_commentaire VARCHAR(255) NOT NULL, INDEX IDX_67F068BC1EBAF6CC (articles_id), INDEX IDX_67F068BC1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, date_consultation DATE NOT NULL, heure_consultation TIME NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation_utilisateur (consultation_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_F8F7153B62FF6CDF (consultation_id), INDEX IDX_F8F7153BFB88E14F (utilisateur_id), PRIMARY KEY(consultation_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, nom_event VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, date DATETIME NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_utilisateur (fiche_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_3E6B5208DF522508 (fiche_id), INDEX IDX_3E6B5208FB88E14F (utilisateur_id), PRIMARY KEY(fiche_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pack (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, seances_id INT DEFAULT NULL, utilisateurs_id INT DEFAULT NULL, type_service VARCHAR(255) NOT NULL, date_participation DATE NOT NULL, INDEX IDX_AB55E24F10F09302 (seances_id), INDEX IDX_AB55E24F1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation_event (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, date_inscription DATE NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_3472872C1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_seance (planning_id INT NOT NULL, seance_id INT NOT NULL, INDEX IDX_BF5CDF613D865311 (planning_id), INDEX IDX_BF5CDF61E3797A94 (seance_id), PRIMARY KEY(planning_id, seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, nombre_participants INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, utilisateurs_id INT DEFAULT NULL, disponibilite TINYINT(1) NOT NULL, prix INT NOT NULL, nombre_max INT NOT NULL, INDEX IDX_97A0ADA371F7E88B (event_id), INDEX IDX_97A0ADA31E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, abonnement_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, poids INT DEFAULT NULL, taille DOUBLE PRECISION DEFAULT NULL, telephone INT DEFAULT NULL, specialite VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, date_de_naissance DATE DEFAULT NULL, genre VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, INDEX IDX_1D1C63B3F1D74413 (abonnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB1919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A21214B7 FOREIGN KEY (categories_id) REFERENCES categorie_article (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE consultation_utilisateur ADD CONSTRAINT FK_F8F7153B62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation_utilisateur ADD CONSTRAINT FK_F8F7153BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_utilisateur ADD CONSTRAINT FK_3E6B5208DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_utilisateur ADD CONSTRAINT FK_3E6B5208FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F10F09302 FOREIGN KEY (seances_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE participation_event ADD CONSTRAINT FK_3472872C1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE planning_seance ADD CONSTRAINT FK_BF5CDF613D865311 FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_seance ADD CONSTRAINT FK_BF5CDF61E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA371F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA31E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB1919B217');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A21214B7');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DAE07E97');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1EBAF6CC');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1E969C5');
        $this->addSql('ALTER TABLE consultation_utilisateur DROP FOREIGN KEY FK_F8F7153B62FF6CDF');
        $this->addSql('ALTER TABLE consultation_utilisateur DROP FOREIGN KEY FK_F8F7153BFB88E14F');
        $this->addSql('ALTER TABLE fiche_utilisateur DROP FOREIGN KEY FK_3E6B5208DF522508');
        $this->addSql('ALTER TABLE fiche_utilisateur DROP FOREIGN KEY FK_3E6B5208FB88E14F');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F10F09302');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F1E969C5');
        $this->addSql('ALTER TABLE participation_event DROP FOREIGN KEY FK_3472872C1E969C5');
        $this->addSql('ALTER TABLE planning_seance DROP FOREIGN KEY FK_BF5CDF613D865311');
        $this->addSql('ALTER TABLE planning_seance DROP FOREIGN KEY FK_BF5CDF61E3797A94');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA371F7E88B');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA31E969C5');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F1D74413');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE categorie_article');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE consultation_utilisateur');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE fiche');
        $this->addSql('DROP TABLE fiche_utilisateur');
        $this->addSql('DROP TABLE pack');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE participation_event');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE planning_seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
