-- phpMyAdmin SQL Dump
-- version 4.0.10.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 10:50 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comfort_packaging_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(180) CHARACTER SET latin1 NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `custom_url` text COLLATE utf8_unicode_ci,
  `excerpt` text COLLATE utf8_unicode_ci,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `is_publish` smallint(11) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `custom_url`, `excerpt`, `meta_title`, `meta_keyword`, `meta_description`, `is_publish`, `sorting`, `created`, `modified`) VALUES
(1, 'ABOUT', '<section class="cp-about-header pad-100">\r\n    <div class="container">\r\n        <div class="row">\r\n            <div class="col-md-6">\r\n                <div class="cp-about-header-content">\r\n                    <h1 class="cp-title">Our Story</h1>\r\n                    <div class="">\r\n                    <p class="content-paragraph">\r\n                            Our company was founded in 2005 out of necessity. I was an amazon seller and over time my\r\nhouse started looking like a warehouse with boxes everywhere. In addition, as my company\r\ngrew I was able to focus less on my day job and was busy straightening out details and shipping\r\norders to customers. So I decided to focus solely on my amazon business and I left my job. I\r\nthen realized that people would greatly benefit from such a service. And so, Comfort Packaging\r\nwas born! \r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n<section class="cp-about-handler">\r\n    <div class="container">\r\n        <div class="row row-eq-height">\r\n            <div class="col-sm-6 cp-line-black">\r\n                <div class="cp-about-para cp-black-p pad-50">\r\n                    <h4>Our Location</h4>\r\n                    <p class="content-paragraph">\r\n                         We have a beautiful facility located in Newark, New Jersey that boasts 10,000 square feet of\r\nbeautiful machinery and shelving. Every customer has their own zone in our warehouse where\r\nonly his products are kept so there is no confusion with inventory. We hold over 1 million dollars\r\nworth of inventory and have the best security system on the market to protect our customers''\r\nproducts. We are trusted by over 1000 sellers and our customers'' satisfaction is our greatest\r\nconcern! \r\n                    </p>\r\n\r\n                </div>\r\n                <div class="cp-about-para cp-black-p pad-50">\r\n                    \r\n                </div>\r\n            </div>\r\n            <div class="col-sm-6 cp-line-white">\r\n                <div class="cp-about-para cp-white-p pad-50">\r\n                    <h4>How We Started Out</h4>\r\n                    <p class="content-paragraph">\r\n                        We started out small and provided the service for family and friends. As word spread we slowly\r\ngrew and acquired more customers. However, we still serve every customer with a drive and\r\npassion as when we first started. We give our employees high quality training in every area that\r\npertains to our business and We are therefore able to focus on every detail of every order.\r\nWe look forward to sharing our success with you! \r\n                    </p>\r\n                </div>\r\n                \r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>', '/about', 'We have a beautiful facility located in Newark, New Jersey that boasts 10,000 square feet of beautiful machinery and shelving. Every customer has their own zone in our warehouse where only his products are kept so there is no confusion with inventory. ', 'ABOUT', 'ABOUT', 'ABOUT', 1, 0, '2016-10-25 19:17:32', '2016-12-13 04:16:35'),
(2, 'CUSTOM SOFTWARE', '<div class="cp-software">\r\n    <section class="cp-cs-app pad-100">\r\n        <div class="container">\r\n            <h1 class="cp-title">Our Custom Software</h1>\r\n            <div class="row">\r\n\r\n                <div class="cp-cs-imac visible-xs">\r\n                    <img src="assets/images/customer-app.png" alt="" class="img-responsive" />\r\n                </div>\r\n\r\n                <div class="col-sm-6">\r\n                    <div class="cp-cs-app-content">\r\n                        <h2>\r\n                            The Perfect Application<br />\r\n                            To Simplify The Process \r\n                        </h2>\r\n                        \r\n                        <p>\r\n                            Comfort Packaging has a custom software that is one of its kind in this industry. It makes being an Amazon seller so simple! \r\n                        </p>\r\n                         <h2>\r\n                            How it Works\r\n                        </h2>\r\n                        <ul>\r\n                            <li>let us know that you want to send a shipment </li>\r\n                            <li>Track the shipment until it lands in our warehouse </li>\r\n                            <li>Get an alert when the shipment has been checked in </li>\r\n                            <li>Let us know to ship to your customer </li>\r\n                            <li>Find out when it has shipped and arrived to your customer</li>\r\n                        </ul> \r\n                        <p>All this without picking up a telephone or writing up an email! It''s as simple as the click of a button!</p>\r\n                        <a href="mailto:info@comfortpackaging.com" class="btn btn-signup">Sign Up</a>\r\n                    </div>\r\n                </div>\r\n                <div class="col-sm-6">\r\n                    <div class="cp-cs-imac hidden-xs">\r\n                        <img src="<?php echo $this->Url->build("/webroot/frontend/assets/images/customer-app.png"); ?>" alt="" class="img-responsive" />\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n</div>', '/custom_software', 'Comfort Packaging has a custom software that is one of its kind in this industry. It makes being an Amazon seller so simple! ', 'CUSTOM SOFTWARE', 'CUSTOM SOFTWARE', 'CUSTOM SOFTWARE', 1, 0, '2016-10-25 19:17:32', '2016-10-25 19:17:32'),
(3, 'CONTACT', '<section class="cp-contact-header">\r\n    <div class="container">\r\n        <div class="row">\r\n            <div class="col-sm-6">\r\n                <div class="cp-contact-header-content">\r\n                    <h1 class="cp-title">Contact</h1>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n<section class="cp-contact-form pad-100">\r\n    <div class="container">\r\n        <div class="row">\r\n\r\n            <div class="col-sm-6">\r\n                <form>\r\n                    <div class="form-group">\r\n                        <input type="text" placeholder="Name" class="form-control" required />\r\n                    </div>\r\n                    <div class="form-group">\r\n                        <input type="email" placeholder="Email" class="form-control" required />\r\n                    </div>\r\n                    <div class="form-group">\r\n                        <input type="text" placeholder="Subject" class="form-control" required />\r\n                    </div>\r\n                    <div class="form-group">\r\n                        <textarea class="form-control" placeholder="Message" required></textarea>\r\n                    </div>\r\n                    <button class="btn btn-primary">Submit</button>\r\n                </form>\r\n\r\n            </div>\r\n            <div class="col-sm-6">\r\n                <div class="cp-contact-info ">\r\n                    <div class="row">\r\n                        <div class="col-md-4">\r\n                            <h3>Call Us</h3>\r\n                            <ul class="list-unstyled">\r\n                                <li>Free Call: 1-800-000-0000 </li>\r\n                                <li>Tel: 123-456-7890</li>\r\n                                <li>Fax: 123-456-7890</li>\r\n                            </ul>\r\n                        </div>\r\n                        <div class="col-md-4">\r\n                            <h3>Our Address</h3>\r\n                            <p>\r\n                                500 Terry Francois Street<br />San Francisco, CA 94158\r\n                            </p>\r\n                        </div>\r\n                        <div class="col-md-4">\r\n                            <h3>Best Time to call Back</h3>\r\n                            <p>\r\n                                Monday thru Friday<br />\r\n                                9:00AM - 5:00PM\r\n                            </p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>', '/contact', NULL, 'CONTACT', 'CONTACT', 'CONTACT', 1, 0, '2016-10-25 19:17:32', '2016-10-25 19:17:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
