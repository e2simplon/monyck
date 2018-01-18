<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180117080010 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_types (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reports (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, explanation DOUBLE PRECISION NOT NULL, relation DOUBLE PRECISION NOT NULL, comitment DOUBLE PRECISION NOT NULL, INDEX IDX_F11FA74553C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, login VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_types_users (id_user INT NOT NULL, id_user_type INT NOT NULL, INDEX IDX_1C6AB8306B3CA4B (id_user), INDEX IDX_1C6AB830766AA7C7 (id_user_type), PRIMARY KEY(id_user, id_user_type)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction_types (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, skill_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, creation_date DATE NOT NULL, exp_time TIME NOT NULL, userTicket_id INT DEFAULT NULL, INDEX IDX_54469DF45585C142 (skill_id), INDEX IDX_54469DF43CBC6411 (userTicket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offers (id INT AUTO_INCREMENT NOT NULL, ticket_id INT DEFAULT NULL, status_id INT DEFAULT NULL, amount INT NOT NULL, exec_time TIME NOT NULL, insurance TINYINT(1) NOT NULL, userOffer_id INT DEFAULT NULL, INDEX IDX_DA460427700047D2 (ticket_id), INDEX IDX_DA46042786F5E9CF (userOffer_id), INDEX IDX_DA4604276BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, receiver_id INT DEFAULT NULL, amount INT NOT NULL, transfert_date DATETIME NOT NULL, comment VARCHAR(500) NOT NULL, transactionType_id INT DEFAULT NULL, INDEX IDX_EAA81A4C85BF20CC (transactionType_id), INDEX IDX_EAA81A4CCD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reports ADD CONSTRAINT FK_F11FA74553C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE user_types_users ADD CONSTRAINT FK_1C6AB8306B3CA4B FOREIGN KEY (id_user) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_types_users ADD CONSTRAINT FK_1C6AB830766AA7C7 FOREIGN KEY (id_user_type) REFERENCES user_types (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF45585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF43CBC6411 FOREIGN KEY (userTicket_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA460427700047D2 FOREIGN KEY (ticket_id) REFERENCES tickets (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA46042786F5E9CF FOREIGN KEY (userOffer_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA4604276BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C85BF20CC FOREIGN KEY (transactionType_id) REFERENCES transaction_types (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE skills ADD language VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_types_users DROP FOREIGN KEY FK_1C6AB830766AA7C7');
        $this->addSql('ALTER TABLE user_types_users DROP FOREIGN KEY FK_1C6AB8306B3CA4B');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF43CBC6411');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA46042786F5E9CF');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4CCD53EDB6');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4C85BF20CC');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA460427700047D2');
        $this->addSql('ALTER TABLE reports DROP FOREIGN KEY FK_F11FA74553C674EE');
        $this->addSql('DROP TABLE user_types');
        $this->addSql('DROP TABLE reports');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user_types_users');
        $this->addSql('DROP TABLE transaction_types');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE offers');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('ALTER TABLE skills DROP language');
    }
}
