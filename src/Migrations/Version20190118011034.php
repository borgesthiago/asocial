<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190118011034 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE atendimento (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, data DATE DEFAULT NULL, relato VARCHAR(500) DEFAULT NULL, tipo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_3FA50F2CDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beneficios (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, transfere_renda INT DEFAULT NULL, programa VARCHAR(150) DEFAULT NULL, bpc INT DEFAULT NULL, tipo_bpc VARCHAR(100) DEFAULT NULL, INDEX IDX_33F0AFCCDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contato (id INT AUTO_INCREMENT NOT NULL, telefone VARCHAR(10) DEFAULT NULL, celular VARCHAR(11) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, documento_reiterado_id INT DEFAULT NULL, numero VARCHAR(50) DEFAULT NULL, tipo VARCHAR(20) DEFAULT NULL, data_emitido DATE DEFAULT NULL, data_recebido DATE DEFAULT NULL, reiteracao TINYINT(1) DEFAULT NULL, setor VARCHAR(255) DEFAULT NULL, prazo_resposta VARCHAR(20) DEFAULT NULL, respondido TINYINT(1) NOT NULL, documento_resposta VARCHAR(30) DEFAULT NULL, UNIQUE INDEX UNIQ_B6B12EC7F55AE19E (numero), INDEX IDX_B6B12EC7DB38439E (usuario_id), INDEX IDX_B6B12EC7721B4553 (documento_reiterado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familia (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, data_nascimento DATE DEFAULT NULL, grau_parentesco VARCHAR(100) DEFAULT NULL, profissao VARCHAR(150) DEFAULT NULL, ocupacao VARCHAR(150) DEFAULT NULL, renda DOUBLE PRECISION DEFAULT NULL, escolaridade VARCHAR(50) DEFAULT NULL, fator_risco VARCHAR(150) DEFAULT NULL, INDEX IDX_5E69C24FDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE funcionario (id INT AUTO_INCREMENT NOT NULL, secretaria_id INT NOT NULL, habitacao_id INT NOT NULL, remuneracao_id INT DEFAULT NULL, contato_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, matricula VARCHAR(10) DEFAULT NULL, cpf VARCHAR(11) DEFAULT NULL, status INT NOT NULL, vinculo VARCHAR(50) NOT NULL, data_admissao DATE DEFAULT NULL, data_exoneracao DATE DEFAULT NULL, cargo VARCHAR(150) DEFAULT NULL, funcao VARCHAR(150) DEFAULT NULL, rg VARCHAR(15) DEFAULT NULL, orgao_rg VARCHAR(20) DEFAULT NULL, coordenador INT DEFAULT NULL, rg_profissao VARCHAR(20) DEFAULT NULL, orgao_rg_profissao VARCHAR(50) DEFAULT NULL, INDEX IDX_7510A3CF584CC12E (secretaria_id), UNIQUE INDEX UNIQ_7510A3CF34AF7696 (habitacao_id), UNIQUE INDEX UNIQ_7510A3CF3AF70DDF (remuneracao_id), INDEX IDX_7510A3CFB279BE46 (contato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitacao (id INT AUTO_INCREMENT NOT NULL, endereco VARCHAR(255) DEFAULT NULL, bairro VARCHAR(100) DEFAULT NULL, cidade VARCHAR(100) DEFAULT NULL, cep VARCHAR(20) DEFAULT NULL, tipo_imovel VARCHAR(10) DEFAULT NULL, tipo_construcao VARCHAR(20) DEFAULT NULL, situacao VARCHAR(30) DEFAULT NULL, saneamento INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remuneracao (id INT AUTO_INCREMENT NOT NULL, salario DOUBLE PRECISION DEFAULT NULL, gratificacao DOUBLE PRECISION DEFAULT NULL, desconto DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saude (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, medicamento VARCHAR(255) DEFAULT NULL, data_inicio DATE DEFAULT NULL, periodo VARCHAR(50) DEFAULT NULL, dosagem VARCHAR(30) DEFAULT NULL, validade DATE DEFAULT NULL, doenca INT DEFAULT NULL, nome_doenca VARCHAR(255) DEFAULT NULL, tratamento INT DEFAULT NULL, anotacao VARCHAR(255) DEFAULT NULL, INDEX IDX_95B96CABDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secretaria (id INT AUTO_INCREMENT NOT NULL, secretaria_pai_id INT DEFAULT NULL, documento_id INT DEFAULT NULL, documentos_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) DEFAULT NULL, bairro VARCHAR(50) DEFAULT NULL, telefone VARCHAR(8) DEFAULT NULL, email VARCHAR(150) DEFAULT NULL, equipamento TINYINT(1) DEFAULT NULL, INDEX IDX_C39D81C2FBAF5A21 (secretaria_pai_id), INDEX IDX_C39D81C245C0CF75 (documento_id), INDEX IDX_C39D81C2C75BF859 (documentos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servico (id INT AUTO_INCREMENT NOT NULL, secretaria_id INT NOT NULL, nome VARCHAR(255) DEFAULT NULL, status INT DEFAULT NULL, INDEX IDX_14873CC584CC12E (secretaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, habitacao_id INT DEFAULT NULL, contato_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(11) DEFAULT NULL, rg VARCHAR(20) DEFAULT NULL, orgao_rg VARCHAR(20) DEFAULT NULL, data_nascimento DATE DEFAULT NULL, email VARCHAR(200) DEFAULT NULL, sexo VARCHAR(1) DEFAULT NULL, pcd INT DEFAULT NULL, naturalidade VARCHAR(100) DEFAULT NULL, profissao VARCHAR(255) DEFAULT NULL, ocupacao VARCHAR(255) DEFAULT NULL, renda DOUBLE PRECISION DEFAULT NULL, ctps VARCHAR(20) DEFAULT NULL, serie_ctps VARCHAR(20) DEFAULT NULL, escolaridade VARCHAR(40) DEFAULT NULL, nis VARCHAR(30) DEFAULT NULL, UNIQUE INDEX UNIQ_2265B05D34AF7696 (habitacao_id), INDEX IDX_2265B05DB279BE46 (contato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atendimento ADD CONSTRAINT FK_3FA50F2CDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE beneficios ADD CONSTRAINT FK_33F0AFCCDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7721B4553 FOREIGN KEY (documento_reiterado_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE familia ADD CONSTRAINT FK_5E69C24FDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF584CC12E FOREIGN KEY (secretaria_id) REFERENCES secretaria (id)');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF34AF7696 FOREIGN KEY (habitacao_id) REFERENCES habitacao (id)');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF3AF70DDF FOREIGN KEY (remuneracao_id) REFERENCES remuneracao (id)');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CFB279BE46 FOREIGN KEY (contato_id) REFERENCES contato (id)');
        $this->addSql('ALTER TABLE saude ADD CONSTRAINT FK_95B96CABDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE secretaria ADD CONSTRAINT FK_C39D81C2FBAF5A21 FOREIGN KEY (secretaria_pai_id) REFERENCES secretaria (id)');
        $this->addSql('ALTER TABLE secretaria ADD CONSTRAINT FK_C39D81C245C0CF75 FOREIGN KEY (documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE secretaria ADD CONSTRAINT FK_C39D81C2C75BF859 FOREIGN KEY (documentos_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE servico ADD CONSTRAINT FK_14873CC584CC12E FOREIGN KEY (secretaria_id) REFERENCES secretaria (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D34AF7696 FOREIGN KEY (habitacao_id) REFERENCES habitacao (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DB279BE46 FOREIGN KEY (contato_id) REFERENCES contato (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CFB279BE46');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05DB279BE46');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC7721B4553');
        $this->addSql('ALTER TABLE secretaria DROP FOREIGN KEY FK_C39D81C245C0CF75');
        $this->addSql('ALTER TABLE secretaria DROP FOREIGN KEY FK_C39D81C2C75BF859');
        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CF34AF7696');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D34AF7696');
        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CF3AF70DDF');
        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CF584CC12E');
        $this->addSql('ALTER TABLE secretaria DROP FOREIGN KEY FK_C39D81C2FBAF5A21');
        $this->addSql('ALTER TABLE servico DROP FOREIGN KEY FK_14873CC584CC12E');
        $this->addSql('ALTER TABLE atendimento DROP FOREIGN KEY FK_3FA50F2CDB38439E');
        $this->addSql('ALTER TABLE beneficios DROP FOREIGN KEY FK_33F0AFCCDB38439E');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC7DB38439E');
        $this->addSql('ALTER TABLE familia DROP FOREIGN KEY FK_5E69C24FDB38439E');
        $this->addSql('ALTER TABLE saude DROP FOREIGN KEY FK_95B96CABDB38439E');
        $this->addSql('DROP TABLE atendimento');
        $this->addSql('DROP TABLE beneficios');
        $this->addSql('DROP TABLE contato');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE familia');
        $this->addSql('DROP TABLE funcionario');
        $this->addSql('DROP TABLE habitacao');
        $this->addSql('DROP TABLE remuneracao');
        $this->addSql('DROP TABLE saude');
        $this->addSql('DROP TABLE secretaria');
        $this->addSql('DROP TABLE servico');
        $this->addSql('DROP TABLE usuario');
    }
}
