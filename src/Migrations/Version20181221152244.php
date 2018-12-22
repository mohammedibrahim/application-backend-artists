<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221152244 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, album_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, length VARCHAR(10) NOT NULL, INDEX IDX_33EDEEA19FCD471 (album_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, artist_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, token VARCHAR(6) NOT NULL, INDEX IDX_39986E431F48AE04 (artist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, token VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA19FCD471 FOREIGN KEY (album_id_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E431F48AE04 FOREIGN KEY (artist_id_id) REFERENCES artist (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA19FCD471');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E431F48AE04');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artist');
    }
}
