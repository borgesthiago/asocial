<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190121213555 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario DROP atendimento_id');
        $this->addSql('ALTER TABLE atendimento ADD funcionario_id INT NOT NULL');
        $this->addSql('ALTER TABLE atendimento ADD CONSTRAINT FK_3FA50F2C642FEB76 FOREIGN KEY (funcionario_id) REFERENCES funcionario (id)');
        $this->addSql('CREATE INDEX IDX_3FA50F2C642FEB76 ON atendimento (funcionario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE atendimento DROP FOREIGN KEY FK_3FA50F2C642FEB76');
        $this->addSql('DROP INDEX IDX_3FA50F2C642FEB76 ON atendimento');
        $this->addSql('ALTER TABLE atendimento DROP funcionario_id');
        $this->addSql('ALTER TABLE funcionario ADD atendimento_id INT NOT NULL');
    }
}
