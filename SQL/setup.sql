USE tutorial;

CREATE TABLE `users` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `username`  varchar(70)          NOT NULL,
    `email` varchar(70)          NOT NULL,

    PRIMARY KEY (`id`)
);

ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE 'utf8_czech_ci';

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
CREATE USER 'tutorial'@'localhost' IDENTIFIED WITH mysql_native_password BY 'tutorial';

INSERT INTO `users` (`id`, `username`, `email`) VALUES ('1', 'admin', 'admin@admin.com');