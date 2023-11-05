DROP TABLE IF EXISTS `admin`;

CREATE TABLE
    `admin` (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
        `username` varchar(30) DEFAULT NULL,
        `password` text,
        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

INSERT INTO `admin`
VALUES (
        1,
        'admin',
        '$2y$10$IpYK5hsxTKQzEjqcDJF7VuYaUNnmgVc3dW7K7KHuCI2lRCTMpdlB2',
        '2023-11-04 19:32:30',
        '2023-11-04 19:32:33'
    );

DROP TABLE IF EXISTS `after_therapy`;

CREATE TABLE
    `after_therapy` (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
        `name` varchar(100) DEFAULT NULL,
        `address` text,
        `village` varchar(50) DEFAULT NULL,
        `subdistrict` varchar(50) DEFAULT NULL,
        `city` varchar(50) DEFAULT NULL,
        `whatsapp` varchar(30) DEFAULT NULL,
        `day` varchar(10) DEFAULT NULL,
        `date` datetime DEFAULT NULL,
        `type_therapy` varchar(30) DEFAULT NULL,
        `therapyst` varchar(30) DEFAULT NULL,
        `price` double DEFAULT NULL,
        `type_payment` enum('CASH', 'TRANSFER') DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

INSERT INTO `after_therapy`
VALUES (
        1,
        'Ahmad Zaini Nijar',
        'jalan medan padang\r\njalan kotanopan setia',
        'Lubuk Begalung',
        'Lubeg ll',
        'Kabupaten Pasaman',
        '082286947001',
        'Rabu',
        '2023-11-04 00:00:00',
        'bekam',
        'Hakam',
        150000,
        NULL,
        '2023-11-04 18:44:24',
        '2023-11-04 18:44:24'
    ), (
        2,
        'Ahmad Zaini Nijar',
        'jalan medan padang\r\njalan kotanopan setia',
        'Lubuk Begalung',
        'Lubeg ll',
        'pasaman',
        '082286947001',
        'Kamis',
        '2023-11-22 00:00:00',
        'bekam',
        'Hakam',
        150000,
        'TRANSFER',
        '2023-11-04 18:46:00',
        '2023-11-04 18:46:00'
    ), (
        3,
        'Ahmad Zaini Nijar',
        'jalan medan padang\r\njalan kotanopan setia',
        'Lubuk Begalung',
        'Lubeg ll',
        'Kabupaten Pasaman',
        '082286947001',
        'Selasa',
        '2023-11-04 00:00:00',
        'pijat',
        'Hakam',
        120000,
        'CASH',
        '2023-11-04 19:17:56',
        '2023-11-04 19:17:56'
    );

DROP TABLE IF EXISTS `therapy_register`;

CREATE TABLE
    `therapy_register` (
        `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
        `name` varchar(100) DEFAULT NULL,
        `address` text,
        `village` varchar(50) DEFAULT NULL,
        `subdistrict` varchar(50) DEFAULT NULL,
        `city` varchar(50) DEFAULT NULL,
        `whatsapp` varchar(30) DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

INSERT INTO `therapy_register`
VALUES (
        1,
        'Ahmad Zaini Nijar',
        'jalan medan padang\r\njalan kotanopan setia',
        'sdf',
        'sdfd',
        'Kabupaten Pasaman',
        '082286947001',
        '2023-11-04 15:25:52',
        '2023-11-04 15:25:52'
    ), (
        2,
        'bh ',
        'hjbjhb',
        'jh',
        'bjh',
        'bj',
        'hb',
        '2023-11-04 20:08:15',
        '2023-11-04 20:08:15'
    );