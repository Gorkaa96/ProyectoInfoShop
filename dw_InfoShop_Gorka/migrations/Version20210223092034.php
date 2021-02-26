<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223092034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, categorias_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, empresa VARCHAR(255) NOT NULL, precio INT NOT NULL, INDEX IDX_767490E65792B277 (categorias_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos_usuarios (id INT AUTO_INCREMENT NOT NULL, productos_id INT DEFAULT NULL, usuarios_id INT DEFAULT NULL, INDEX IDX_83C694E6ED07566B (productos_id), INDEX IDX_83C694E6F01D3B25 (usuarios_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, contrasena VARCHAR(255) NOT NULL, administrador TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E65792B277 FOREIGN KEY (categorias_id) REFERENCES categorias (id)');
        $this->addSql('ALTER TABLE productos_usuarios ADD CONSTRAINT FK_83C694E6ED07566B FOREIGN KEY (productos_id) REFERENCES productos (id)');
        $this->addSql('ALTER TABLE productos_usuarios ADD CONSTRAINT FK_83C694E6F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E65792B277');
        $this->addSql('ALTER TABLE productos_usuarios DROP FOREIGN KEY FK_83C694E6ED07566B');
        $this->addSql('ALTER TABLE productos_usuarios DROP FOREIGN KEY FK_83C694E6F01D3B25');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE productos_usuarios');
        $this->addSql('DROP TABLE usuarios');
    }
}
