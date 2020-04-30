<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430141603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, nom_participant VARCHAR(255) NOT NULL, prenom_participant VARCHAR(255) NOT NULL, sexe VARCHAR(10) DEFAULT NULL, image LONGTEXT DEFAULT NULL, date_naissance DATE DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant_categorie (participant_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_8A7F19109D1C3019 (participant_id), INDEX IDX_8A7F1910BCF5E72D (categorie_id), PRIMARY KEY(participant_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participant_categorie ADD CONSTRAINT FK_8A7F19109D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_categorie ADD CONSTRAINT FK_8A7F1910BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participant_categorie DROP FOREIGN KEY FK_8A7F1910BCF5E72D');
        $this->addSql('ALTER TABLE participant_categorie DROP FOREIGN KEY FK_8A7F19109D1C3019');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE participant_categorie');
    }
}
