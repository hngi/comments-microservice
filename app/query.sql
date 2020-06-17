CREATE TABLE `fg_expenses`.`comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `author_name` VARCHAR(100) NULL,
  `author_email` VARCHAR(100) NULL,
  `content` TEXT NOT NULL,
  `uuid` VARCHAR(100) NOT NULL,
  `created_at` VARCHAR(15) NOT NULL,
  `updated_at` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE INDEX `uuid_UNIQUE` (`uuid` ASC));
