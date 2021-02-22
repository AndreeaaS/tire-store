-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2017 г., 08:59
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tire_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `parent_id` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `parent_id`) VALUES
(1, 'Aeolus', 0),
(2, 'Barum', 0),
(3, 'BFGoodrich', 0),
(4, 'Effiplus ', 0),
(5, 'Viatti', 0),
(6, 'Nexen', 0),
(7, 'Bridgestone', 0),
(8, 'Continental', 0),
(12, 'Dunlop', 0),
(13, 'test', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `character`
--

CREATE TABLE IF NOT EXISTS `character` (
  `id_role` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name_character` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `character`
--

INSERT INTO `character` (`id_role`, `name_character`) VALUES
(1, 'Пользователь'),
(2, 'Администратор'),
(3, 'Менеджер');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Second_name` varchar(255) NOT NULL,
  `Otchestvo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_role` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `Second_name`, `Otchestvo`, `email`, `phone`, `address`, `password`, `id_role`) VALUES
(9, 'Андрей', 'Алюков', 'Викторович', 'andruxa95@inbox.ru', '+7(904) 131-0399', 'г.Иркутск, ул.Байкальская д.207, кв 76', '202cb962ac59075b964b07152d234b70', 1),
(12, 'Админ', '', '', 'admin@tire_store', '', '', '202cb962ac59075b964b07152d234b70', 2),
(14, 'menedger', '', '', 'menedger@tire_store', '231981', 'Иркутск', '202cb962ac59075b964b07152d234b70', 3),
(21, 'Антон', 'Антонов', 'Антонович', 'antonov@mail.ru', '+7(904) 131-0533', 'г.Иркутск, ул.Декабрьских событий, д.305 кв.17', '202cb962ac59075b964b07152d234b70', 1),
(22, 'Андрей', 'Андреев', 'Викторович', '@mail.ru', '', '', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `dostavka`
--

CREATE TABLE IF NOT EXISTS `dostavka` (
  `dostavka_id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`dostavka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `dostavka`
--

INSERT INTO `dostavka` (`dostavka_id`, `name`) VALUES
(1, 'Самовывоз (бесплатно)'),
(2, 'Доставка до дома (цена в зависимости от веса)'),
(3, 'В магазин (бесплатно)');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `big_image` varchar(255) NOT NULL DEFAULT 'no_image_BIG.jpg',
  `goods_brandid` int(10) unsigned NOT NULL,
  `anons` text NOT NULL,
  `content` text NOT NULL,
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  `hits` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `date` date NOT NULL,
  `width` int(11) unsigned NOT NULL,
  `Radius` int(11) unsigned NOT NULL,
  `height` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `available` int(10) unsigned NOT NULL,
  `season` varchar(255) NOT NULL,
  PRIMARY KEY (`goods_id`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`goods_id`, `name`, `keywords`, `description`, `image`, `big_image`, `goods_brandid`, `anons`, `content`, `visible`, `hits`, `new`, `sale`, `price`, `date`, `width`, `Radius`, `height`, `full_name`, `available`, `season`) VALUES
(1, 'BRIDGESTONE VRX 205/60R16 92S', 'ключевики', 'описание', 'Bridg VRX 205 60 R16 92S.jpg', 'Bridg VRX 205 60 R16 92S.jpg', 7, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '1', '0', 6464, '2017-03-08', 205, 16, '60', 'BRIDGESTONE VRX 205/60R16 92S', 20, 'summer'),
(3, 'Barum Bravuris 2 195/55R16 87H', 'ключевики', 'описание', 'Barum Bravuris 2 195 55R16 87H.jpg', 'Barum Bravuris 2 195 55R16 87H.jpg', 2, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '1', 4585, '2017-03-08', 195, 16, '55', 'Barum Bravuris 2 195/55R16 87H', 2, 'winter'),
(4, 'Dunlop SP Sport LM703 245/40R18 ', 'ключевики', 'описание', 'Dunlop SP Sport LM703 245 40R18 97W.jpg', 'Dunlop SP Sport LM703 245 40R18 97W.jpg', 12, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '0', 7394, '2017-03-08', 245, 18, '40', 'Dunlop SP Sport LM703 245/40R18 ', 21, 'winter'),
(5, 'BFG All Terrain 225/70R16 102R', 'ключевики', 'описание', 'BFG All Terrain 225 70R16 102R.jpg', 'BFG All Terrain 225 70R16 102R.jpg', 3, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 9393, '2017-03-08', 225, 16, '70', 'BFG All Terrain 225/70R16 102R', 15, 'winter'),
(8, 'BRIDGESTONE DM-V2 265/65R17 ', 'ключевики', 'Bridgestone Corporation — японская компания-производитель шин. Основана в 1931 году предпринимателем Сёдзиро Исибаси в городе Куруме префектуры Фукуока. Бизнес Бриджстоун на 80 % состоит из производства и реализации шин для легковых автомобилей, грузовиков, автобусов, коммерческого транспорта, самолетов, мототранспорта, строительной, добывающей и сельхоз техники. Остальные 20 % составляет производство и реализация конвейерных лент, шлангов, сидений для автомобилей, изоляционных резинотехнических изделий и спортивных принадлежностей. Компания владеет 155 заводами и четырьмя техническими центрами в 27 странах мира, а также девятью собственными полигонами для тестирования шин в семи странах.', 'Bridg DM-V2 265 65R17 112R XL.jpg', 'Bridg DM-V2 265 65R17 112R XL.jpg', 7, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 8742, '2017-03-08', 265, 17, '65', 'BRIDGESTONE DM-V2 265/65R17 112R XL', 4, 'summer'),
(9, 'Viatti Strada Asimmetrico V-130', 'ключевики', 'описание', 'Viatti Strada Asimmetrico V-130.jpg', 'Viatti Strada Asimmetrico V-130 245 45R17 99V.jpg', 5, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '0', 4622, '2017-03-08', 245, 17, '45', 'Viatti Strada Asimmetrico V-130 245/45R17 99V', 5, 'summer'),
(12, 'Aeolus AU01 215/45R17 87W', 'ключевики', 'описание', 'Aeolus AU01 215 45R17 87W.jpg', 'Aeolus AU01 215 45R17 87W.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '', '1', '0', '0', '0', 6125, '2017-03-08', 215, 17, '45', 'Aeolus AU01 215/45R17 87W', 11, 'winter'),
(15, 'Aeolus AU01 215/55R16 93V', 'ключевики', 'описание', 'Aeolus AU01 215 55R16 93V.jpg', 'Aeolus AU01 215 55R16 93V.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 4139, '2017-03-08', 215, 16, '55', 'Aeolus AU01 215/55R16 93V', 16, 'summer'),
(16, 'Aeolus AG03 185/65R14 86T ', 'ключевики', 'описание', 'no_image.jpg', 'no_image_BIG.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 2404, '2017-03-08', 185, 14, '65', 'Aeolus AG03 185/65R14 86T', 10, 'summer'),
(17, 'Aeolus AH01 175/65R14 82H', 'ключевики', 'описание', 'Aeolus AH01 175 65R14 82H.jpg', 'Aeolus AH01 175 65R14 82H.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 2325, '2017-03-08', 175, 14, '65', 'Aeolus AH01 175/65R14 82H', 10, 'summer'),
(18, 'Effiplus EPLUTO 195/55R16', 'ключевики', 'описание', 'Effiplus EPLUTO 195 55R16 87H.jpeg', 'Effiplus EPLUTO 195 55R16 87H.jpeg', 4, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 2046, '2017-03-08', 195, 16, '55', 'Effiplus EPLUTO 195/55R16 87H', 13, 'winter'),
(20, 'Nexen N6000 245/40R18 ', 'ключевики', 'описание', 'Nexen N6000 245 40R18 97Y.jpg', 'Nexen N6000 245 40R18 97Y.jpg', 6, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 6268, '2017-03-08', 245, 18, '40', 'Nexen N6000 245/40R18 97Y', 11, 'winter'),
(21, 'Dunlop SP Sport LM703 225/45R17 ', 'ключевики', 'описание', 'Dunlop SP Sport LM703 225 45R17.jpg', 'Dunlop SP Sport LM703 225 45R17 94W.jpg', 12, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '0', 6045, '2017-03-08', 225, 17, '45', 'Dunlop SP Sport LM703 225/45R17 ', 5, 'summer'),
(22, 'Dunlop SP Sport LM703 215/50R17 ', 'ключевики', 'описание', 'Dunlop SP Sport LM703 215 50R17.jpg', 'Dunlop SP Sport LM703 215 50R17.jpg', 12, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '1', '0', 6305, '2017-03-08', 215, 17, '50', 'Dunlop SP Sport LM703 215/50R17 91V 285761', 2, 'summer'),
(23, 'Dunlop Grandtrek AT3 235/85R16', 'ключевики', 'описание', 'Dunlop Grandtrek AT3 235 85R16.jpg', 'Dunlop Grandtrek AT3 235 85R16 120 116R 278669.jpg', 12, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '1', 6166, '2017-03-08', 235, 16, '85', 'Dunlop Grandtrek AT3 235/85R16 120/116R 278669', 3, 'summer'),
(24, 'Viatti Strada Asimmetrico V-130', 'ключевики', 'описание', 'Viatti Strada Asimmetrico V-130 225 45R17 94V.jpg', 'Viatti Strada Asimmetrico V-130 225 45R17 94V.jpg', 5, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '0', 3767, '2017-03-08', 225, 17, '45', 'Viatti Strada Asimmetrico V-130 225/45R17 94V', 17, 'summer'),
(25, 'Viatti Brina V-521 175/65R14 82Т', 'ключевики', 'описание', 'Viatti Brina V-521 175 65R14 82Т.jpg', 'Viatti Brina V-521 175 65R14 82Т.jpg', 5, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '0', 1804, '2017-03-08', 175, 14, '65', 'Viatti Brina V-521 175/65R14 82Т', 14, 'winter'),
(26, 'Viatti Bosco А/Т V-237', 'ключевики', 'описание', 'Viatti Bosco А Т V-237.jpg', 'Viatti Bosco А Т V-237 225 60R17 99H.jpg', 5, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '1', '0', '1', 5162, '2017-03-08', 255, 17, '60', 'Viatti Bosco А/Т V-237 225/60R17 99H', 0, 'winter'),
(42, 'Aeolus AG03 ', 'ключевики', 'описание', 'no_image.jpg', 'no_image_BIG.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 2404, '2017-03-08', 165, 14, '65', 'Aeolus AG03 185/65R14 86T', 10, 'summer'),
(41, 'Aeolus AG03 ', 'ключевики', 'описание', 'no_image.jpg', 'no_image_BIG.jpg', 1, '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '<p>Разработанная компанией Бриджстоун технология, позволяющая продолжать движение со спущенной шиной (не более 80 км, с максимальной скоростью 80 км/ч)</p>', '1', '0', '1', '0', 2404, '2017-03-08', 195, 16, '85', 'Aeolus AG03 185/65R14 86T', 10, 'summer');

-- --------------------------------------------------------

--
-- Структура таблицы `informers`
--

CREATE TABLE IF NOT EXISTS `informers` (
  `informer_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `informer_name` varchar(255) NOT NULL,
  `informer_position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`informer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `informers`
--

INSERT INTO `informers` (`informer_id`, `informer_name`, `informer_position`) VALUES
(1, 'Способы оплаты', 2),
(2, 'Доставка', 1),
(3, 'Информация для Вас', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL,
  `parent_informer` tinyint(3) unsigned NOT NULL,
  `links_position` tinyint(3) unsigned NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`link_id`, `link_name`, `parent_informer`, `links_position`, `keywords`, `description`, `text`) VALUES
(1, 'Наличный расчет', 1, 1, 'ключевики статьи "наличный расчет"', 'описание статьи "наличный расчет"', 'текст  статьи "наличный расчет"'),
(2, 'Оплата банковской картой', 1, 2, 'ключевики статьи "Оплата банковской картой"', 'описание статьи "Оплата банковской картой"', 'текст статьи "Оплата банковской картой"'),
(3, 'Кредит', 1, 4, 'ключевики статьи "кредит"', 'описание статьи "кредит"', 'текст статьи "кредит"'),
(4, 'Безналичный расчет', 1, 3, 'ключевики статьи "безналичный расчет"', 'описание статьи "безналичный расчет"', 'текст статьи "безналичный расчет"'),
(5, 'Почта России', 2, 1, 'ключевики статьи "Почта России"', 'описание статьи "Почта России"', 'текст статьи "Почта России"'),
(6, 'Курьерская служба', 2, 2, 'ключевики статьи "Курьерская служба"', 'описание статьи "Курьерская служба"', 'текст статьи "Курьерская служба"'),
(7, 'Гарантия', 3, 1, 'ключевики статьи "гарантия"', 'описание статьи "гарантия"', 'текст статьи "гарантия"'),
(8, 'Как выбрать шины для автомобиля', 3, 2, 'ключевики статьи "Как выбрать шины для автомобиля"', 'описание статьи "Как выбрать шины для автомобиля"', 'текст статьи "Как выбрать шины для автомобиля"'),
(9, 'Акции и новинки', 3, 3, 'ключевики статьи "Акции и новинки"', 'описание статьи "Акции и новинки"', 'текст статьи "Акции и новинки"');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `anons` text NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `title`, `anons`, `text`, `date`) VALUES
(1, 'Новое почти даром', 'Подарки первым покупателям нашего интернет-магазина', 'Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1Новость1', '2017-03-07'),
(2, 'Скидка Bridgstone', 'При заказе шин Bridgstone скидка до 15%', 'Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2Новость2', '2017-03-12'),
(3, 'Покупай у нас', 'При каждом заказе скидка по Вашей карте увеличивается', 'Новость 3', '2017-03-21');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `otchestvo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `dostavka_id` tinyint(3) unsigned NOT NULL,
  `payment_id` tinyint(3) unsigned NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `name`, `second_name`, `otchestvo`, `email`, `phone`, `address`, `order_date`, `dostavka_id`, `payment_id`, `status`, `comment`) VALUES
(39, 13, 'Иванов Иван Антонович', '', '', 'ivan@mail.ru', '+7(950) 062-7829', 'г.Иркутск, ул.Волжская д.105, кв 17', '2017-05-25 17:20:03', 1, 0, '0', ''),
(40, 9, 'Андрей', '', '', 'andruxa95@inbox.ru', '+7(904) 131-0399', 'г.Иркутск, ул.Байкальская д.215, кв 42', '2017-06-04 11:08:10', 1, 0, '1', 'Позвоните мне, пожалуйста, в ближайшее время.'),
(41, 9, 'Андрей', 'Алюков', 'Викторович', 'andruxa95@inbox.ru', '+7(904) 131-0399', 'г.Иркутск, ул.Байкальская д.207, кв 76', '2017-06-11 07:57:18', 2, 0, '0', 'тест фамилии');

-- --------------------------------------------------------

--
-- Структура таблицы `order_goods`
--

CREATE TABLE IF NOT EXISTS `order_goods` (
  `order_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `goods_id` int(11) unsigned NOT NULL,
  `quantity` tinyint(4) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`order_goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Дамп данных таблицы `order_goods`
--

INSERT INTO `order_goods` (`order_goods_id`, `order_id`, `goods_id`, `quantity`, `name`, `price`) VALUES
(49, 38, 4, 2, 'Dunlop SP Sport LM703 245/40R18 ', 7394),
(50, 38, 23, 1, 'Dunlop Grandtrek AT3 235/85R16', 6166),
(51, 39, 20, 1, 'Nexen N6000 245/40R18 ', 6268),
(52, 39, 9, 1, 'Viatti Strada Asimmetrico V-130', 4622),
(53, 39, 25, 3, 'Viatti Brina V-521 175/65R14 82Т', 1804),
(54, 40, 1, 4, 'BRIDGESTONE VRX 205/60R16 92S', 6464),
(55, 41, 4, 1, 'Dunlop SP Sport LM703 245/40R18 ', 7394);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `keywords`, `description`, `position`, `text`) VALUES
(1, 'Как сделать заказ', '', '', 1, '<p>Как сделать заказ</p>'),
(2, 'Способы оплаты', '', '', 2, '<p>Способы оплаты</p>'),
(3, 'Возврат', '', '', 3, '<p>Возврат</p>'),
(4, 'О нас', '', '', 4, '<p>О нас</p>'),
(5, 'Вакансии', '', '', 5, '<p>Текст Вакансии</p>'),
(6, 'Контакты', '', '', 6, '<p>Текст Контакты</p>'),
(7, 'Оплата и доставка', '', '', 7, '<p>Текст Оплата и доставка</p>'),
(8, 'Магазины', '', '', 8, '<p>Текст Магазины</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;