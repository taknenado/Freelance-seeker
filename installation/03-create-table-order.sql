CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT,
    `category` VARCHAR(255),
    `proposal_type` VARCHAR(255),
    `payment` VARCHAR(255),
    `budget` DECIMAL(10, 2),
    `currency` VARCHAR(3),
    `proposal_title` VARCHAR(255),
    `company_name` VARCHAR(255),
    `proposal_description` TEXT,
    PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;