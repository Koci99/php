USE tutorial;

CREATE TABLE `users` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `username`  varchar(70)          NOT NULL,
    `email` varchar(70)          NOT NULL,

    PRIMARY KEY (`id`)
);

ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE 'utf8_czech_ci';

INSERT INTO `users` (`id`, `username`, `email`) VALUES ('1', 'admin', 'admin@admin.com');