-- HERAFY database for MySQL / MariaDB (phpMyAdmin: Import this file)
-- Creates the database `herafy`, its tables, the list of crafts and demo data.
-- Every demo account uses the password: herafy123
-- Generated from app/core/Database.php and database/seed.php

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS `herafy` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `herafy`;

DROP TABLE IF EXISTS `contact_messages`, `sponsorships`, `products`, `posts`, `company_users`, `account_users`, `services`;

CREATE TABLE IF NOT EXISTS services (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    slug VARCHAR(80) NOT NULL UNIQUE,
    image VARCHAR(255) NULL,
    search_count INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS account_users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    service_id INT UNSIGNED NULL,
    city VARCHAR(80) NULL,
    phone VARCHAR(30) NULL,
    bio TEXT NULL,
    avatar VARCHAR(255) NULL,
    cover VARCHAR(255) NULL,
    profile_views INT NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS company_users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    city VARCHAR(80) NULL,
    phone VARCHAR(30) NULL,
    website VARCHAR(255) NULL,
    description TEXT NULL,
    logo VARCHAR(255) NULL,
    cover VARCHAR(255) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    author_type VARCHAR(10) NOT NULL,
    author_id INT UNSIGNED NOT NULL,
    body TEXT NOT NULL,
    image VARCHAR(255) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_id INT UNSIGNED NOT NULL,
    name VARCHAR(120) NOT NULL,
    description TEXT NULL,
    price DECIMAL(10,2) NULL,
    image VARCHAR(255) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id) REFERENCES company_users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS sponsorships (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_id INT UNSIGNED NOT NULL,
    account_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (company_id, account_id),
    FOREIGN KEY (company_id) REFERENCES company_users(id) ON DELETE CASCADE,
    FOREIGN KEY (account_id) REFERENCES account_users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    subject VARCHAR(190) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Crafts
INSERT INTO `services` (`name`, `slug`, `image`) VALUES
  ('سباك', 'plumber', 'assets/IMAGES/services/service1.jpg'),
  ('كهربائي', 'electrician', 'assets/IMAGES/services/service2.jpg'),
  ('نجار', 'carpenter', 'assets/IMAGES/services/service3.jpg'),
  ('دهان', 'painter', 'assets/IMAGES/services/service4.jpg'),
  ('بناء', 'mason', 'assets/IMAGES/services/service5.jpg'),
  ('لحام', 'welder', 'assets/IMAGES/services/service6.jpg'),
  ('حداد', 'blacksmith', NULL),
  ('بلاط', 'tiler', NULL),
  ('ميكانيكي', 'mechanic', NULL),
  ('بستاني', 'gardener', NULL),
  ('تكييف وتبريد', 'air-conditioning', NULL),
  ('خياط', 'tailor', NULL);

-- Demo data (remove from here if you want an empty website)
INSERT INTO `account_users` (`first_name`, `last_name`, `email`, `city`, `phone`, `bio`, `avatar`, `cover`, `profile_views`, `service_id`, `password_hash`) VALUES
  ('هواري', 'بن عودة', 'houari@herafy.dz', 'وهران', '0550 11 22 33', 'نجار منذ 15 سنة، متخصص في المطابخ والأبواب الخشبية والأثاث حسب الطلب.', 'assets/IMAGES/team/team1.jpg', 'assets/IMAGES/slider-pages/slide-page1.jpg', 41, 3, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('كريمة', 'قدوري', 'karima@herafy.dz', 'الجزائر', '0551 22 33 44', 'دهان وديكور داخلي، ورق جدران وطلاء زخرفي للبيوت والمحلات.', 'assets/IMAGES/team/team2.jpg', 'assets/IMAGES/slider-pages/slide-page2.jpg', 33, 4, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('قدور', 'حمداني', 'kadour@herafy.dz', 'قسنطينة', '0552 33 44 55', 'سباكة صحية، تركيب سخانات الماء والكشف عن التسربات.', 'assets/IMAGES/team/team3.jpg', 'assets/IMAGES/slider-pages/slide-page3.jpg', 27, 1, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('حميدة', 'بن عمر', 'hamida@herafy.dz', 'سطيف', '0553 44 55 66', 'تركيبات كهربائية منزلية وصناعية، كاميرات مراقبة وأنظمة إنذار.', 'assets/IMAGES/team/team4.jpg', 'assets/IMAGES/slider-pages/slide-page1.jpg', 19, 2, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('سفيان', 'زروقي', 'sofiane@herafy.dz', 'تلمسان', '0554 55 66 77', 'أشغال البناء والترميم، الخرسانة المسلحة والواجهات.', 'assets/IMAGES/team/team5.jpg', 'assets/IMAGES/slider-pages/slide-page2.jpg', 12, 5, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('ياسين', 'مسعودي', 'yacine@herafy.dz', 'عنابة', '0555 66 77 88', 'لحام وتصنيع الأبواب والنوافذ الحديدية والدرابزين.', 'assets/IMAGES/team/team6.jpg', 'assets/IMAGES/slider-pages/slide-page3.jpg', 8, 6, '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i');

INSERT INTO `company_users` (`name`, `email`, `city`, `phone`, `website`, `description`, `logo`, `cover`, `password_hash`) VALUES
  ('مواد البناء الجزائرية', 'contact@materiaux.dz', 'الجزائر', '021 00 11 22', 'https://www.example.com', 'توزيع الإسمنت، الحديد والمواد الأولية للبناء في كامل التراب الوطني.', 'assets/IMAGES/clients/client1.png', 'assets/IMAGES/banner/banner1.jpg', '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('أدوات الحرفي', 'info@outils.dz', 'وهران', '041 00 11 22', NULL, 'معدات وأدوات كهربائية ويدوية للنجارين والحدادين والكهربائيين.', 'assets/IMAGES/clients/client2.png', 'assets/IMAGES/banner/banner2.jpg', '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i'),
  ('دهانات الأطلس', 'sales@atlas.dz', 'سطيف', '036 00 11 22', NULL, 'دهانات داخلية وخارجية عالية الجودة صنعت في الجزائر.', 'assets/IMAGES/clients/client3.png', 'assets/IMAGES/banner/banner3.jpg', '$2y$10$VFVAKW0XVdR0UQYgAF4mf.ztjNBYF2T/Bk3QzaV0DsHnF2NnUOZ0i');

INSERT INTO `products` (`company_id`, `name`, `description`, `price`, `image`) VALUES
  (1, 'إسمنت بورتلاندي 50 كغ', 'إسمنت عالي المقاومة مناسب للخرسانة المسلحة.', 950, 'assets/IMAGES/projects/project5.jpg'),
  (1, 'حديد التسليح 12 مم', 'قضبان حديد مطابقة للمعايير، تباع بالطن.', 98000, 'assets/IMAGES/projects/project6.jpg'),
  (2, 'منشار كهربائي دائري', 'منشار 1800 واط للنجارة الدقيقة مع ضمان سنتين.', 18500, 'assets/IMAGES/services/service3.jpg'),
  (2, 'آلة لحام انفرتر', 'آلة لحام خفيفة 200 أمبير.', 27000, 'assets/IMAGES/services/service6.jpg'),
  (3, 'دهان داخلي مطفي 25 كغ', 'دهان مائي قابل للغسل بألوان متعددة.', 6400, 'assets/IMAGES/services/service4.jpg');

INSERT INTO `posts` (`author_type`, `author_id`, `body`, `image`, `created_at`) VALUES
  ('account', 1, 'أنهينا اليوم تركيب مطبخ خشبي كامل لعائلة في حي السلام بوهران. الخشب من الزان الطبيعي.', 'assets/IMAGES/projects/project1.jpg', NOW() - INTERVAL 9 DAY),
  ('account', 2, 'تجديد صالون بالكامل: ورق جدران وطلاء زخرفي بلونين.', 'assets/IMAGES/projects/project2.jpg', NOW() - INTERVAL 7 DAY),
  ('account', 3, 'تركيب حمام كامل مع الكشف عن تسرب قديم تحت البلاط.', 'assets/IMAGES/projects/project3.jpg', NOW() - INTERVAL 5 DAY),
  ('company', 2, 'وصلت تشكيلة جديدة من المناشير الكهربائية، تخفيض 10% للحرفيين المسجلين في حرفي.', NULL, NOW() - INTERVAL 4 DAY),
  ('account', 5, 'ترميم واجهة منزل قديم في وسط مدينة تلمسان مع الحفاظ على الطابع التقليدي.', 'assets/IMAGES/projects/project4.jpg', NOW() - INTERVAL 3 DAY),
  ('account', 4, 'تركيب لوحة كهربائية جديدة ونظام إنارة LED لورشة.', 'assets/IMAGES/post-image-3.png', NOW() - INTERVAL 2 DAY),
  ('account', 6, 'درابزين حديدي مزخرف لدرج فيلا، تصميم وتنفيذ.', 'assets/IMAGES/projects/project6.jpg', NOW() - INTERVAL 1 DAY);

INSERT INTO `sponsorships` (`company_id`, `account_id`) VALUES
  (2, 1),
  (3, 2),
  (1, 5);

SET FOREIGN_KEY_CHECKS = 1;
