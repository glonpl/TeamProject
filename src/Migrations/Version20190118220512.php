<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190118220512 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disease (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, probability INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disease_symptoms (disease_id INT NOT NULL, symptoms_id INT NOT NULL, INDEX IDX_56590376D8355341 (disease_id), INDEX IDX_5659037667CA3534 (symptoms_id), PRIMARY KEY(disease_id, symptoms_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptoms (id INT AUTO_INCREMENT NOT NULL, fk_area_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_CD3CAE134D207DB0 (fk_area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disease_symptoms ADD CONSTRAINT FK_56590376D8355341 FOREIGN KEY (disease_id) REFERENCES disease (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disease_symptoms ADD CONSTRAINT FK_5659037667CA3534 FOREIGN KEY (symptoms_id) REFERENCES symptoms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE symptoms ADD CONSTRAINT FK_CD3CAE134D207DB0 FOREIGN KEY (fk_area_id) REFERENCES area (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE symptoms DROP FOREIGN KEY FK_CD3CAE134D207DB0');
        $this->addSql('ALTER TABLE disease_symptoms DROP FOREIGN KEY FK_56590376D8355341');
        $this->addSql('ALTER TABLE disease_symptoms DROP FOREIGN KEY FK_5659037667CA3534');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE disease');
        $this->addSql('DROP TABLE disease_symptoms');
        $this->addSql('DROP TABLE symptoms');
    }
}
