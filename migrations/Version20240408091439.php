<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408091439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_groupe (groupe_source INT NOT NULL, groupe_target INT NOT NULL, INDEX IDX_6F87701B34B48349 (groupe_source), INDEX IDX_6F87701B2D51D3C6 (groupe_target), PRIMARY KEY(groupe_source, groupe_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_groupe ADD CONSTRAINT FK_6F87701B34B48349 FOREIGN KEY (groupe_source) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_groupe ADD CONSTRAINT FK_6F87701B2D51D3C6 FOREIGN KEY (groupe_target) REFERENCES groupe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_groupe DROP FOREIGN KEY FK_6F87701B34B48349');
        $this->addSql('ALTER TABLE groupe_groupe DROP FOREIGN KEY FK_6F87701B2D51D3C6');
        $this->addSql('DROP TABLE groupe_groupe');
    }
}
