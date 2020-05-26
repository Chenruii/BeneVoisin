<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200506165712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD annonce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E58805AB2F FOREIGN KEY (annonce_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F65593E58805AB2F ON annonce (annonce_id)');
        $this->addSql('ALTER TABLE location ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB64D218E FOREIGN KEY (location_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB64D218E ON location (location_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E58805AB2F');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB64D218E');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_F65593E58805AB2F ON annonce');
        $this->addSql('ALTER TABLE annonce DROP annonce_id');
        $this->addSql('DROP INDEX IDX_5E9E89CB64D218E ON location');
        $this->addSql('ALTER TABLE location DROP location_id');
    }
}
