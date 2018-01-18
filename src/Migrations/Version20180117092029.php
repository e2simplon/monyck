<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180117092029 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transactions ADD sender_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CF624B39D FOREIGN KEY (sender_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_EAA81A4CF624B39D ON transactions (sender_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4CF624B39D');
        $this->addSql('DROP INDEX IDX_EAA81A4CF624B39D ON transactions');
        $this->addSql('ALTER TABLE transactions DROP sender_id');
    }
}
