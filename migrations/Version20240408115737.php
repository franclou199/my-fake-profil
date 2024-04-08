<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408115737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs_groupe (utilisateurs_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_2958EB291E969C5 (utilisateurs_id), INDEX IDX_2958EB297A45358C (groupe_id), PRIMARY KEY(utilisateurs_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateurs_groupe ADD CONSTRAINT FK_2958EB291E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs_groupe ADD CONSTRAINT FK_2958EB297A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_groupe DROP FOREIGN KEY FK_6F87701B2D51D3C6');
        $this->addSql('ALTER TABLE groupe_groupe DROP FOREIGN KEY FK_6F87701B34B48349');
        $this->addSql('DROP TABLE groupe_groupe');
        $this->addSql('ALTER TABLE utilisateurs CHANGE date_naissance date_naissance DATETIME NOT NULL, CHANGE ville_id ville_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EF0C17188 FOREIGN KEY (ville_id_id) REFERENCES villes (id)');
        $this->addSql('CREATE INDEX IDX_497B315EF0C17188 ON utilisateurs (ville_id_id)');
        $this->addSql('ALTER TABLE villes CHANGE pays_id pays_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE villes ADD CONSTRAINT FK_19209FD874FAEB6C FOREIGN KEY (pays_id_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_19209FD874FAEB6C ON villes (pays_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_groupe (groupe_source INT NOT NULL, groupe_target INT NOT NULL, INDEX IDX_6F87701B2D51D3C6 (groupe_target), INDEX IDX_6F87701B34B48349 (groupe_source), PRIMARY KEY(groupe_source, groupe_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE groupe_groupe ADD CONSTRAINT FK_6F87701B2D51D3C6 FOREIGN KEY (groupe_target) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_groupe ADD CONSTRAINT FK_6F87701B34B48349 FOREIGN KEY (groupe_source) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs_groupe DROP FOREIGN KEY FK_2958EB291E969C5');
        $this->addSql('ALTER TABLE utilisateurs_groupe DROP FOREIGN KEY FK_2958EB297A45358C');
        $this->addSql('DROP TABLE utilisateurs_groupe');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EF0C17188');
        $this->addSql('DROP INDEX IDX_497B315EF0C17188 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs CHANGE date_naissance date_naissance VARCHAR(255) NOT NULL, CHANGE ville_id_id ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE villes DROP FOREIGN KEY FK_19209FD874FAEB6C');
        $this->addSql('DROP INDEX IDX_19209FD874FAEB6C ON villes');
        $this->addSql('ALTER TABLE villes CHANGE pays_id_id pays_id INT NOT NULL');
    }
}
