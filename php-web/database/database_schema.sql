DROP TABLE IF EXISTS `users`;
CREATE TABLE
    `users` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `email` varchar(100) DEFAULT NULL,
        `password` varchar(60) DEFAULT NULL,
        `name` varchar(100) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB

DROP TABLE IF EXISTS `notes`;
CREATE TABLE
    `notes` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `user_id` int(11) unsigned NOT NULL,
        `title` varchar(255) NOT NULL,
        `text` text NOT NULL,
        `created_at` datetime NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB


DROP TABLE IF EXISTS `products`;
CREATE TABLE
  `products` (
               `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
               `enable` int(1) NOT NULL DEFAULT '0',
               `label` varchar(255) NOT NULL,
               `brand` varchar(255) NOT NULL,
               `description` text NOT NULL,
               `price_ttc` double NOT NULL,
               `price_ht` double NOT NULL,
               `vat` double NOT NULL,
               `quantity` int NOT NULL,
               `created_at` datetime NOT NULL,
               PRIMARY KEY (`id`)
) ENGINE = InnoDB

