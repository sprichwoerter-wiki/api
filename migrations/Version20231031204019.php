<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031204019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proverb ALTER explanation TYPE VARCHAR(5000)');
        $this->addSql('ALTER TABLE proverb ALTER history TYPE VARCHAR(5000)');
        $this->addSql('ALTER TABLE proverb ALTER example TYPE VARCHAR(5000)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE proverb ALTER explanation TYPE VARCHAR(500)');
        $this->addSql('ALTER TABLE proverb ALTER history TYPE VARCHAR(500)');
        $this->addSql('ALTER TABLE proverb ALTER example TYPE VARCHAR(500)');
    }
}
