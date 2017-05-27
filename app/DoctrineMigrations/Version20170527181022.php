<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170527181022 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, to_user INT DEFAULT NULL, from_user INT DEFAULT NULL, to_luser INT DEFAULT NULL, from_luser INT DEFAULT NULL, message LONGTEXT NOT NULL, INDEX IDX_DB021E966A7DC786 (to_user), INDEX IDX_DB021E96F8050BAA (from_user), INDEX IDX_DB021E963D0B5534 (to_luser), INDEX IDX_DB021E96F41411B (from_luser), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E966A7DC786 FOREIGN KEY (to_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96F8050BAA FOREIGN KEY (from_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E963D0B5534 FOREIGN KEY (to_luser) REFERENCES luser (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96F41411B FOREIGN KEY (from_luser) REFERENCES luser (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE messages');
    }
}
