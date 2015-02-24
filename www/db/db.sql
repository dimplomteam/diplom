DROP TABLE IF EXISTS page;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `ranking`;
DROP TABLE IF EXISTS `image`;
DROP TABLE IF EXISTS `message`;


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE  `user` ADD  `created_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE  `user` CHANGE  `image_id`  `image_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0';
ALTER TABLE  `user` ADD  `role` VARCHAR( 255 ) NULL AFTER  `email` ;
ALTER TABLE  `user` CHANGE  `image_id`  `image_src` VARCHAR( 255 ) NULL DEFAULT NULL ;

INSERT INTO `user` (`id`, `login`, `pass`, `email`, `role`, `phone`, `image_src`, `created_time`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', NULL, '234567', NULL, '2015-01-19 22:17:23');
INSERT INTO `user` (`id`, `login`, `pass`, `email`, `role`, `phone`, `image_src`, `created_time`) VALUES
(2, 'admin1', 'admin1', 'admin@admin.ru', NULL, '234567', NULL, '2015-01-19 22:17:23');

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` text,
  `content` text,
  `rank` int(11) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `rank`, `created_time`) VALUES
(1, 1, 'title1', 'content1', 0, '2015-01-19 22:17:54');

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `rank`  int(3) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL DEFAULT '0',
  `from_user_id` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE  `post` ADD  `category` VARCHAR( 255 ) NULL AFTER  `rank` ;

ALTER TABLE  `user` CHANGE  `phone`  `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;


