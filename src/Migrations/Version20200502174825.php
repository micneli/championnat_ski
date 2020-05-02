<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502174825 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1D233E95C');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11D233E95C');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP INDEX IDX_B50A2CB1D233E95C ON competition');
        $this->addSql('ALTER TABLE competition DROP resultat_id');
        $this->addSql('DROP INDEX IDX_D79F6B11D233E95C ON participant');
        $this->addSql('ALTER TABLE participant DROP resultat_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, resultat1 DATETIME NOT NULL, resultat2 DATETIME NOT NULL, moyenne_resultat DATETIME NOT NULL, INDEX IDX_E7DB5DE2BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE competition ADD resultat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B50A2CB1D233E95C ON competition (resultat_id)');
        $this->addSql('ALTER TABLE participant ADD resultat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11D233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D79F6B11D233E95C ON participant (resultat_id)');
    }
}
