<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104114444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag ADD children_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7833D3D2749 FOREIGN KEY (children_id) REFERENCES tag (id)');
        $this->addSql('CREATE INDEX IDX_389B7833D3D2749 ON tag (children_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B7833D3D2749');
        $this->addSql('DROP INDEX IDX_389B7833D3D2749 ON tag');
        $this->addSql('ALTER TABLE tag DROP children_id');
    }
}
