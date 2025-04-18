<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407214442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE exercise (exercise_id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, exercise_name VARCHAR(100) NOT NULL, exercise_order INT NOT NULL, INDEX IDX_AEDAD51CE9ED820C (block_id), PRIMARY KEY(exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE `set` (set_id INT AUTO_INCREMENT NOT NULL, exercise_id INT NOT NULL, set_order INT NOT NULL, reps INT NOT NULL, weight DOUBLE PRECISION NOT NULL, execution_time INT DEFAULT NULL, rest_time INT DEFAULT NULL, rpe INT DEFAULT NULL, intensity VARCHAR(50) DEFAULT NULL, INDEX IDX_E61425DCE934951A (exercise_id), PRIMARY KEY(set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workout (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, time INT NOT NULL, date DATE NOT NULL, INDEX IDX_649FFB72A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workout_block (block_id INT AUTO_INCREMENT NOT NULL, workout_id INT NOT NULL, block_type VARCHAR(50) NOT NULL, block_order INT NOT NULL, INDEX IDX_DAD02436A6CCCFC9 (workout_id), PRIMARY KEY(block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51CE9ED820C FOREIGN KEY (block_id) REFERENCES workout_block (block_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `set` ADD CONSTRAINT FK_E61425DCE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (exercise_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout ADD CONSTRAINT FK_649FFB72A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout_block ADD CONSTRAINT FK_DAD02436A6CCCFC9 FOREIGN KEY (workout_id) REFERENCES workout (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exercises DROP FOREIGN KEY exercises_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workouts DROP FOREIGN KEY workouts_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sets DROP FOREIGN KEY sets_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout_blocks DROP FOREIGN KEY workout_blocks_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE exercises
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workouts
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE sets
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workout_blocks
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE exercises (exercise_id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, exercise_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, exercise_order INT NOT NULL, INDEX block_id (block_id), PRIMARY KEY(exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workouts (workout_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, workout_title VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, workout_time INT NOT NULL, workout_date DATE NOT NULL, workout_notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX user_id (user_id), PRIMARY KEY(workout_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE sets (set_id INT AUTO_INCREMENT NOT NULL, exercise_id INT NOT NULL, set_order INT NOT NULL, reps INT NOT NULL, weight DOUBLE PRECISION NOT NULL, execution_time INT DEFAULT NULL, rest_time INT DEFAULT NULL, rpe INT DEFAULT NULL, intensity VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX exercise_id (exercise_id), PRIMARY KEY(set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workout_blocks (block_id INT AUTO_INCREMENT NOT NULL, workout_id INT NOT NULL, block_type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, block_order INT NOT NULL, INDEX workout_id (workout_id), PRIMARY KEY(block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exercises ADD CONSTRAINT exercises_ibfk_1 FOREIGN KEY (block_id) REFERENCES workout_blocks (block_id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workouts ADD CONSTRAINT workouts_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sets ADD CONSTRAINT sets_ibfk_1 FOREIGN KEY (exercise_id) REFERENCES exercises (exercise_id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout_blocks ADD CONSTRAINT workout_blocks_ibfk_1 FOREIGN KEY (workout_id) REFERENCES workouts (workout_id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51CE9ED820C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `set` DROP FOREIGN KEY FK_E61425DCE934951A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout DROP FOREIGN KEY FK_649FFB72A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout_block DROP FOREIGN KEY FK_DAD02436A6CCCFC9
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE exercise
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE `set`
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workout
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workout_block
        SQL);
    }
}
