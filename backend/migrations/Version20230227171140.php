<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227171140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE datas ADD data_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE datas ADD CONSTRAINT FK_CF180C1AA147DA62 FOREIGN KEY (data_type_id) REFERENCES data_types (id)');
        $this->addSql('CREATE INDEX IDX_CF180C1AA147DA62 ON datas (data_type_id)');
        $this->addSql('ALTER TABLE goals ADD data_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE goals ADD CONSTRAINT FK_C7241E2FA147DA62 FOREIGN KEY (data_type_id) REFERENCES data_types (id)');
        $this->addSql('CREATE INDEX IDX_C7241E2FA147DA62 ON goals (data_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE datas DROP FOREIGN KEY FK_CF180C1AA147DA62');
        $this->addSql('DROP INDEX IDX_CF180C1AA147DA62 ON datas');
        $this->addSql('ALTER TABLE datas DROP data_type_id');
        $this->addSql('ALTER TABLE goals DROP FOREIGN KEY FK_C7241E2FA147DA62');
        $this->addSql('DROP INDEX IDX_C7241E2FA147DA62 ON goals');
        $this->addSql('ALTER TABLE goals DROP data_type_id');
    }
}
