-- Adminer 4.8.1 MySQL 8.2.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

-- CREATE TABLE `user` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `name` varchar(255) NOT NULL,
--   `email` varchar(255) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT INTO `user` (`id`, `name`, `email`) VALUES
-- (1,	'Erison Silva',	'hey@erison.work'),
-- (2,	'User Foo',	'foo@erison.work');

-- UPDATE `user`
-- SET `name` = 'Will'
-- WHERE `id` = 2;

-- CREATE TABLE `workouts` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `user_id` int NOT NULL,
--   `title` varchar(255) NOT NULL,
--   `time` int NOT NULL,
--   `date` date NOT NULL,
--   PRIMARY KEY (`id`),
--   FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT INTO `workouts` (`id`, `user_id`, `title`, `time`, `date`) VALUES
-- (1,	1,	'Legs',	1140,	'2023-11-23'),
-- (2,	1,	'Chest',	1080,	'2023-11-26');



-- CREATE TABLE `workout_blocks` (
--     `block_id` int NOT NULL AUTO_INCREMENT,
--     `workout_id` int NOT NULL,
--     `block_type` varchar(50) NOT NULL,
--     `block_order` int NOT NULL,
--     PRIMARY KEY (`block_id`),
--     FOREIGN KEY (`workout_id`) REFERENCES `workouts`(`workout_id`)
-- )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `exercises` (
--     `exercise_id` int NOT NULL AUTO_INCREMENT,
--     `block_id` int NOT NULL,
--     `exercise_name` varchar(100) NOT NULL,
--     `exercise_order` int NOT NULL,
--     PRIMARY KEY (`exercise_id`),
--     FOREIGN KEY (`block_id`) REFERENCES `workout_blocks`(`block_id`)
-- )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- CREATE TABLE `sets` (
--     `set_id` int NOT NULL AUTO_INCREMENT,
--     `exercise_id` int NOT NULL,
--     `set_order` int NOT NULL,
--     `reps` int NOT NULL,
--     `weight` float NOT NULL,
--     `execution_time` int,
--     `rest_time` int,
--     `rpe` int,
--     `intensity` varchar(50),
--     PRIMARY KEY (`set_id`),
--     FOREIGN KEY (`exercise_id`) REFERENCES `exercises`(`exercise_id`)
-- )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/* 
SELECT 
  w.workout_id,
  w.workout_time,
  b.block_id,
  b.block_type,
  b.block_order,
  e.exercise_id,
  e.exercise_name,
  e.exercise_order,
  s.set_id,
  s.set_order,
  s.reps,
  s.weight,
  s.execution_time,
  s.rest_time,
  s.rpe
FROM workout w
JOIN workout_block b ON w.workout_id = b.workout_id
JOIN exercise e ON b.block_id = e.block_id
JOIN set s ON e.exercise_id = s.exercise_id
ORDER BY w.workout_id, b.block_order, e.exercise_order, s.set_order;
 */

-- TRUNCATE TABLE `user`;
-- TRUNCATE TABLE `workout`;
-- TRUNCATE TABLE `workout_block`;
-- TRUNCATE TABLE `exercise`;
-- 2023-11-23 17:42:10
