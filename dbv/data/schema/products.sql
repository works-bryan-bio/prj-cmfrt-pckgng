CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thumb` varchar(254) NOT NULL,
  `body` text,
  `meta_descriptions` text,
  `meta_keywords` text,
  `publish` tinyint(1) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8