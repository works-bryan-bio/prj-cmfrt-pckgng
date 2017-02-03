CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_number` varchar(255) NOT NULL,
  `customer_pin` varchar(255) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `second_name` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1