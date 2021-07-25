CREATE TABLE IF NOT EXISTS `bstmpl_contact_page_controller` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bstmpl_default_page_controller` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bstmpl_start_page_controller` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `simple_page_link` (   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,   `type` varchar(255) DEFAULT NULL,   `linked_page_id` int(10) unsigned DEFAULT NULL,   `url` varchar(255) DEFAULT NULL,   `label` varchar(255) DEFAULT NULL,   PRIMARY KEY (`id`),   KEY `page_link_index_1` (`linked_page_id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
