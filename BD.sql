CREATE TABLE IF NOT EXISTS `bonus_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `bonus` text CHARACTER SET utf8 NOT NULL,
  `count` int(11) DEFAULT NULL,
  `endkey` int(11) DEFAULT NULL,
  `endcount` int(11) DEFAULT NULL,
  `des` text CHARACTER SET utf8,
  `server` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE IF NOT EXISTS `bonus_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 NOT NULL,
  `id_key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE IF NOT EXISTS `bonus_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` text CHARACTER SET utf8 NOT NULL,
  `host` text CHARACTER SET utf8 NOT NULL,
  `user` text CHARACTER SET utf8 NOT NULL,
  `pass` text CHARACTER SET utf8 NOT NULL,
  `base` text CHARACTER SET utf8 NOT NULL,
  `table_shop` text CHARACTER SET utf32 NOT NULL,
  `table_time` text CHARACTER SET utf8 NOT NULL,
  `table_status` text CHARACTER SET utf8 NOT NULL,
  `table_iconomy` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
)