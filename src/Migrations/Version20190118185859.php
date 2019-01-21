<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190118185859 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documento ADD origem_id INT NOT NULL, ADD destinatario_id INT NOT NULL');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC781E73123 FOREIGN KEY (origem_id) REFERENCES secretaria (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7B564FBC1 FOREIGN KEY (destinatario_id) REFERENCES secretaria (id)');
        $this->addSql('CREATE INDEX IDX_B6B12EC781E73123 ON documento (origem_id)');
        $this->addSql('CREATE INDEX IDX_B6B12EC7B564FBC1 ON documento (destinatario_id)');
        $this->addSql('ALTER TABLE secretaria DROP FOREIGN KEY FK_C39D81C245C0CF75');
        $this->addSql('ALTER TABLE secretaria DROP FOREIGN KEY FK_C39D81C2C75BF859');
        $this->addSql('DROP INDEX IDX_C39D81C2C75BF859 ON secretaria');
        $this->addSql('DROP INDEX IDX_C39D81C245C0CF75 ON secretaria');
        $this->addSql('ALTER TABLE secretaria DROP documento_id, DROP documentos_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC781E73123');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC7B564FBC1');
        $this->addSql('DROP INDEX IDX_B6B12EC781E73123 ON documento');
        $this->addSql('DROP INDEX IDX_B6B12EC7B564FBC1 ON documento');
        $this->addSql('ALTER TABLE documento DROP origem_id, DROP destinatario_id');
        $this->addSql('ALTER TABLE secretaria ADD documento_id INT DEFAULT NULL, ADD documentos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secretaria ADD CONSTRAINT FK_C39D81C245C0CF75 FOREIGN KEY (documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE secretaria ADD CONSTRAINT FK_C39D81C2C75BF859 FOREIGN KEY (documentos_id) REFERENCES documento (id)');
        $this->addSql('CREATE INDEX IDX_C39D81C2C75BF859 ON secretaria (documentos_id)');
        $this->addSql('CREATE INDEX IDX_C39D81C245C0CF75 ON secretaria (documento_id)');
    }
}
