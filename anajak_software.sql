-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2025 at 09:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anajak_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_pages`
--

CREATE TABLE `about_us_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_title` varchar(255) NOT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_image1` varchar(255) DEFAULT NULL,
  `hero_image2` varchar(255) DEFAULT NULL,
  `stat1_number` varchar(255) DEFAULT NULL,
  `stat1_label` varchar(255) DEFAULT NULL,
  `stat2_number` varchar(255) DEFAULT NULL,
  `stat2_label` varchar(255) DEFAULT NULL,
  `journey_title` varchar(255) DEFAULT NULL,
  `journey_description` text DEFAULT NULL,
  `team_title` varchar(255) DEFAULT NULL,
  `team_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_pages`
--

INSERT INTO `about_us_pages` (`id`, `hero_title`, `hero_description`, `hero_image1`, `hero_image2`, `stat1_number`, `stat1_label`, `stat2_number`, `stat2_label`, `journey_title`, `journey_description`, `team_title`, `team_description`, `created_at`, `updated_at`) VALUES
(1, 'Get to Know Anajak Software', 'We create reliable, high-quality software that helps businesses grow, work smarter, and achieve results that matter.', 'upload/about-us/1840492954913180.jpg', 'upload/about-us/1840440457083277.jpg', '250+', 'Projects Delivered Successfully', '99%', 'Happy Client Rate', 'Our Journey', 'From our first project to hundreds delivered, our focus has always been the same — building software that solves problems, saves time, and creates opportunities for our clients.', 'Our Team', 'Experienced professionals who understand your needs and deliver solutions that work from day one.', '2025-08-14 07:13:14', '2025-08-15 01:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `placement` enum('below_title','in_content','sticky_footer','end_of_article','popup') DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image_url`, `link_url`, `placement`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Middle Ad', 'ads/1755764609.png', 'https://poipetinsider.com/', 'in_content', 1, '2025-08-21 01:23:29', '2025-08-21 01:23:29'),
(3, 'CCV', 'ads/1755773296.png', 'https://poipetinsider.com/', 'sticky_footer', 0, '2025-08-21 01:24:13', '2025-08-23 02:22:17'),
(4, 'ccv', 'ads/1755764861.jpg', 'https://poipetinsider.com/', 'end_of_article', 1, '2025-08-21 01:27:41', '2025-08-21 01:27:41'),
(5, 'pop up', 'ads/1755771774.jpg', 'https://poipetinsider.com/', 'popup', 0, '2025-08-21 01:28:22', '2025-08-21 04:48:21'),
(9, NULL, 'ads/1755771558.png', NULL, 'sticky_footer', 1, '2025-08-21 03:19:18', '2025-08-21 03:19:18'),
(10, NULL, 'ads/1755771609.jpg', NULL, 'below_title', 1, '2025-08-21 03:20:09', '2025-08-21 03:20:09'),
(11, NULL, 'ads/1755774856.png', NULL, 'sticky_footer', 0, '2025-08-21 04:14:16', '2025-08-23 02:22:07'),
(12, NULL, 'ads/1755776251.png', NULL, 'below_title', 1, '2025-08-21 04:37:31', '2025-08-21 04:37:31'),
(13, NULL, 'ads/1755776262.png', NULL, 'below_title', 1, '2025-08-21 04:37:42', '2025-08-21 04:37:42'),
(14, NULL, 'ads/1755776292.png', NULL, 'in_content', 1, '2025-08-21 04:38:12', '2025-08-21 04:38:12'),
(15, NULL, 'ads/1755776304.png', NULL, 'in_content', 1, '2025-08-21 04:38:24', '2025-08-21 04:38:24'),
(16, NULL, 'ads/1755776313.png', NULL, 'in_content', 0, '2025-08-21 04:38:33', '2025-08-23 02:21:48'),
(17, NULL, 'ads/1755776452.png', NULL, 'end_of_article', 1, '2025-08-21 04:40:52', '2025-08-21 04:40:52'),
(18, NULL, 'ads/1755776459.png', NULL, 'end_of_article', 0, '2025-08-21 04:40:59', '2025-08-23 02:20:24'),
(19, NULL, 'ads/1755776873.gif', NULL, 'popup', 0, '2025-08-21 04:47:53', '2025-08-23 02:20:17'),
(20, NULL, 'ads/1755778531.png', NULL, 'popup', 0, '2025-08-21 05:15:31', '2025-08-23 02:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `author_name` varchar(255) NOT NULL DEFAULT 'Admin',
  `author_avatar` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `view_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `category`, `tags`, `image`, `excerpt`, `content`, `author_name`, `author_avatar`, `published_at`, `view_count`, `created_at`, `updated_at`) VALUES
(3, 'Enim deserunt incidu', 'enim-deserunt-incidu', 'Rerum magnam velit', 'Sint cillum facilis', 'upload/blogs/1840261518893725.jpg', 'Incidunt qui tempor', '<p><s>Learning a little each day adds up.</s> Research shows that students who make learning a habit are more likely to reach their goals. Set time aside to learn and get reminders using <span style=\"text-decoration: underline;\">your learning scheduler.</span>&nbsp;</p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\">Learning a little each day adds up. Research shows that students who make learning a habit are more likely to reach their goals. Set time aside to learn and get reminders using your learning scheduler.&nbsp;</span></p>\r\n<p><span style=\"color: #2dc26b;\">Learning a little each day adds up. Research shows that students who make learning a habit are more likely to reach their goals. Set time aside to learn and get reminders using your learning scheduler.&nbsp;</span></p>\r\n<p><strong>Learning a little each day adds up. Research shows that students who make learning a habit are more likely to reach their goals. Set time aside to learn and get reminders using your learning scheduler.</strong></p>', 'Daquan Mathis', 'upload/blogs/avatars/1840261518930894.png', '2010-11-03 04:17:00', 0, '2025-08-12 07:49:06', '2025-08-12 20:25:03'),
(10, 'វៀតណាមដណ្ដើមបានតំណែងជាប្រទេសនាំចេញអង្ករធំជាងគេលំដាប់លេខ២លើពិភពលោកពីប្រទេសថៃ គិតត្រឹមរយៈពេល៦ខែដំបូងឆ្នាំ២០២៥នេះ', '-wfynWc', 'App Development', NULL, 'upload/blogs/1840320441711573.jpg', NULL, '<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert;\">គិតត្រឹមលទ្ធផលរយៈពេល៦ខែដំបូងនៃឆ្នាំ២០២៥នេះ តំណែងជាប្រទេសនាំចេញអង្ករធំបំផុតទី២លើពិភពលោករបស់ប្រទេសថៃ ត្រូវបានវៀតណាមដណ្ដើមបានហើយ ខណៈគម្លាត វៀតណាមបានវ៉ាដាច់ថៃដល់ទៅ ១លានតោន។ នេះបើតាមទិន្នន័យរបស់សមាគមន៍អ្នកនាំចេញអង្កររបស់ថៃ ផ្សាយដោយបណ្ដាញសារព័ត៌មានរបស់ប្រទេសនេះ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert;\">លោក Charoen Laothamathat ប្រធានសមាគមន៍អ្នកនាំចេញអង្កររបស់ថៃ ទើបបានបញ្ចេញរបាយការណ៍ឲ្យដឹងថា ក្នុងរយៈពេល៦ខែដំបូងឆ្នាំនេះ ពោលរាប់ពីខែមករាដល់ខែមិថុនា ប្រទេសថៃនាំចេញអង្ករទៅទីផ្សារអន្តរជាតិបានតែ ៣,៧៣លានតោនប៉ុណ្ណោះ ស្មើនឹងទឹកប្រាក់ចំនួន ២.២៥៩លានដុល្លារ ថយចុះ ២៧% និង៣៦% រៀងគ្នា ទាំងចំនួនអង្ករ និងតម្លៃលក់បានគិតជាប្រាក់ ធៀបនឹងរយៈពេលដូចគ្នាកាលពីឆ្នាំ២០២៤។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert;\">ប្រភពដដែលបានឲ្យដឹងថា ការធ្លាក់ចុះយ៉ាងច្រើនសម្រាប់ទីផ្សារនាំចេញអង្កររបស់ថៃក្នុងឆ្នាំនេះ គឺបណ្ដាលមកពីការផ្គត់ផ្គង់លើសតម្រូវការទីផ្សារ ដោយសារប្រទេសនាំចេញអង្ករសម្រុកប្រមូលផលស្រូវច្រើនជាងឆ្នាំមុនៗ ជាពិសេសប្រទេសឥណ្ឌា និងបណ្ដាលមកពីការប្រកួតប្រជែងតម្លៃ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert;\">លទ្ធផលនាំចេញអង្កររបស់ប្រទេសនាំចេញធំៗទាំង៥ ត្រឹមរយៈពេល៦ខែដំបូងឆ្នាំនេះ លេខ១ នៅតែគ្រប់គ្រងដោយអង្ករឥណ្ឌាដដែល ដោយម្នាក់ឯងនាំចេញបានចំនួន ១១,៦៨លានតោន។ លេខពីរបានទៅវៀតណាម នាំចេញបាន ៤,៧២លានតោន ស្របពេលថៃ ប៉ាគីស្ថាន និងអង្កររបស់អាមេរិកនៅលេខរៀងបន្តបន្ទាប់។&nbsp;</span></p>', 'Admin', NULL, '2025-08-13 06:28:00', 0, '2025-08-12 23:25:39', '2025-08-12 23:29:23'),
(11, 'វៀតណាមដណ្ដើមបានតំណែងជាប្រទេសនាំចេញអង្ករធំជាងគេលំដាប់លេខ២លើពិភពលោកពីប្រទេសថៃ គិតត្រឹមរយៈពេល៦ខែដំបូងឆ្នាំ២០២៥នេះ', '-yjlQdm', 'App Development', NULL, 'upload/blogs/1840320506604542.jpg', NULL, '<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-size: 14pt; font-family: battambang, sans-serif;\">គិតត្រឹមលទ្ធផលរយៈពេល៦ខែដំបូងនៃឆ្នាំ២០២៥នេះ តំណែងជាប្រទេសនាំចេញអង្ករធំបំផុតទី២លើពិភពលោករបស់ប្រទេសថៃ ត្រូវបានវៀតណាមដណ្ដើមបានហើយ ខណៈគម្លាត វៀតណាមបានវ៉ាដាច់ថៃដល់ទៅ ១លានតោន។ នេះបើតាមទិន្នន័យរបស់សមាគមន៍អ្នកនាំចេញអង្កររបស់ថៃ ផ្សាយដោយបណ្ដាញសារព័ត៌មានរបស់ប្រទេសនេះ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-size: 14pt; font-family: battambang, sans-serif;\">លោក Charoen Laothamathat ប្រធានសមាគមន៍អ្នកនាំចេញអង្កររបស់ថៃ ទើបបានបញ្ចេញរបាយការណ៍ឲ្យដឹងថា ក្នុងរយៈពេល៦ខែដំបូងឆ្នាំនេះ ពោលរាប់ពីខែមករាដល់ខែមិថុនា ប្រទេសថៃនាំចេញអង្ករទៅទីផ្សារអន្តរជាតិបានតែ ៣,៧៣លានតោនប៉ុណ្ណោះ ស្មើនឹងទឹកប្រាក់ចំនួន ២.២៥៩លានដុល្លារ ថយចុះ ២៧% និង៣៦% រៀងគ្នា ទាំងចំនួនអង្ករ និងតម្លៃលក់បានគិតជាប្រាក់ ធៀបនឹងរយៈពេលដូចគ្នាកាលពីឆ្នាំ២០២៤។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-size: 14pt; font-family: battambang, sans-serif;\">ប្រភពដដែលបានឲ្យដឹងថា ការធ្លាក់ចុះយ៉ាងច្រើនសម្រាប់ទីផ្សារនាំចេញអង្កររបស់ថៃក្នុងឆ្នាំនេះ គឺបណ្ដាលមកពីការផ្គត់ផ្គង់លើសតម្រូវការទីផ្សារ ដោយសារប្រទេសនាំចេញអង្ករសម្រុកប្រមូលផលស្រូវច្រើនជាងឆ្នាំមុនៗ ជាពិសេសប្រទេសឥណ្ឌា និងបណ្ដាលមកពីការប្រកួតប្រជែងតម្លៃ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-size: 14pt; font-family: battambang, sans-serif;\">លទ្ធផលនាំចេញអង្កររបស់ប្រទេសនាំចេញធំៗទាំង៥ ត្រឹមរយៈពេល៦ខែដំបូងឆ្នាំនេះ លេខ១ នៅតែគ្រប់គ្រងដោយអង្ករឥណ្ឌាដដែល ដោយម្នាក់ឯងនាំចេញបានចំនួន ១១,៦៨លានតោន។ លេខពីរបានទៅវៀតណាម នាំចេញបាន ៤,៧២លានតោន ស្របពេលថៃ ប៉ាគីស្ថាន និងអង្កររបស់អាមេរិកនៅលេខរៀងបន្តបន្ទាប់។</span></p>', 'Admin', NULL, '2025-08-12 06:28:00', 0, '2025-08-12 23:26:41', '2025-08-12 23:29:09'),
(15, 'ម្ចាស់សហគ្រាសខ្មែរកំពុងមានឱកាសពង្រឹងម៉ាកយីហោក្នុងទីផ្សារឲ្យកាន់តែរឹងមាំតាមរយៈ Storytelling ចំពេលមានស្ទុះគាំទ្រទំនិញក្នុងស្រុក', '-8Umc6J', 'App Development', 'Tech', 'upload/blogs/1840340881667824.jpg', NULL, '<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 10pt;\">ស្របពេលកំពុងប្រឈមភាពតានតឹងជាមួយប្រទេសថៃទាំងផ្នែកការពារជាតិ និងពាណិជ្ជកម្ម ត្រឹមខែសីហាឆ្នាំ២០២៥នេះ សន្ទុះគាំទ្រផលិតផលខ្មែរផលិតក្នុងស្រុកបាន និងកំពុងហុចឱកាសទីផ្សារ ងាយលក់បានច្រើនជាងមុនសម្រាប់សហគ្រាសក្នុងស្រុក។ យ៉ាងណាមិញ ម៉ាកយីហោផលិតផលមានគុណភាពរបស់ខ្មែរជាច្រើនមិនទាន់ត្រូវបានផ្សព្វផ្សាយទូលំទូលាយនៅឡើយ បណ្ដាលឲ្យអ្នកប្រើប្រាស់ពិបាកទុកចិត្ត និងពិបាកប្រជែងជាមួយទីផ្សារក្រៅផ្លូវការដែលឆ្លៀតឱកាសផលិតទំនិញខ្សោយគុណភាព និងមិនគោរពច្បាប់ទម្លាប់ត្រឹមត្រូវ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 10pt;\">មានវិធីសាស្ត្រមួយដែលអាចពង្រឹង និងជំរុញម៉ាកយីហោរបស់អ្នកឲ្យឆាប់ត្រូវបានគេជឿជាក់នៅលើទីផ្សារ នាំមុខផលិតផលដទៃ និងប្រជែងជាមួយទំនិញនាំចូល នោះគឺការផ្សព្វផ្សាយសាច់រឿងកកើតនៃម៉ាកយីហោអាជីវកម្មរបស់អ្នក ឬ Storytelling។ ការតំណាលរឿងកសាងអាជីវកម្ម អាចបំផុសរូបភាពម៉ាកយីហោរបស់អ្នកជ្រាលជ្រៅនៅក្នុងផ្នត់គំនិតរបស់អ្នកប្រើប្រាស់យ៉ាងមានប្រសិទ្ធភាព និងផ្ដល់ឲ្យអ្នកប្រើប្រាស់មានមូលដ្ឋានកាន់តែរឹងមាំក្នុងការវាយតម្លៃស្តង់ដារគុណភាព និងគុណតម្លៃពាក់ព័ន្ធនៃផលិតផលនៅលើទីផ្សារ ដោយផ្អែកលើបទពិសោធន៍ ការប្ដេជ្ញាចិត្ត និងសមិទ្ធផលដែលសម្រេចបានក្នុងសាច់រឿងចាប់ផ្ដើមរបស់អ្នកពីចំណុចដំបូងរហូតដល់បច្ចុប្បន្ន ព្រមទាំងចក្ខុវិស័យអនាគត។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 10pt;\">ដំណើរការរៀបរៀងសាច់រឿងនេះ ទាមទារជំនាញសរសេរតាក់តែង យល់ដឹងអំពីទីផ្សារតាមវិស័យរបស់ខ្លួន និងការចង់ដឹងចង់ស្ដាប់របស់សាធារណជន បន្ទាប់មកត្រូវការសម្លេងរបស់អ្នកនិទានសម្រាប់ផលិតមាតិកាផ្សព្វផ្សាយនៅលើឆាណែលមានការទទួលស្គាល់។ ផ្អែកលើបទពិសោធន៍របស់យើង ម្ចាស់អាជីវកម្មតែងប្រឈមបញ្ហាស្មុគស្មាញក្នុងការរៀបចំវា ត្បិតក្រុមការងារមានស្រាប់របស់ខ្លួនមិនសូវមានទំនុកចិត្តក្នុងការធ្វើ និងអាចចំណាយពេលវេលាយូរ។ តួយ៉ាងពួកគាត់អាចមិនសូវចេះសរសេរ ខ្វះអ្នកថតសម្លេងដែលចេះនិទានសាច់រឿង ឬប្រឈមឧបសគ្គមួយចំនួនទៀត។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 10pt;\">ឆ្លើយតបនឹងបញ្ហានេះ Poipet Insider មានផ្ដល់ជូនសេវាកម្មជាកញ្ចប់ Storytelling សម្រាប់ម្ចាស់សហគ្រាសខ្មែរក្នុងតម្លៃសមរម្យ គ្របដណ្ដប់ចាប់ពីការងារសរសេរចងក្រងសាច់រឿងឲ្យមានភាពទាក់ទាញ ថតសម្លេង កាត់តវីដេអូ និងផ្សព្វផ្សាយលើឆាណែលបណ្ដាញសង្គម និងវេបសាយរបស់យើង។ ពួកយើងមានក្រុមការងារមានបទពិសោធន៍ និងបានផ្ដល់សេវាកម្មដល់ម្ចាស់អាជីវកម្មខ្នាតតូចដល់សាជីវកម្មលំដាប់កំពូលក្នុងប្រទេសកម្ពុជារួចមកហើយ ខណៈមាតិកា Storytelling ជាច្រើនត្រូវបានផ្សាយលើឆាណែលបណ្ដាញសង្គមរបស់យើង បានបង្ហាញប្រសិទ្ធភាពយ៉ាងខ្ពស់។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 10pt;\">ប្រសិនបើម្ចាស់សហគ្រាសខ្មែរចង់ពង្រឹងម៉ាកយីហោរបស់ខ្លួនតាមមធ្យោបាយ Storytelling តាមរយៈ Poipet Insider សូមទាក់ទងមកលេខទូរស័ព្ទ ឬ Telegram នេះ 099 551 652 ៕</span></p>', 'Bunthong', NULL, '2025-08-12 11:48:00', 16, '2025-08-13 04:50:32', '2025-08-24 00:05:32'),
(16, 'ការនាំចូលទំនិញពីចិនមកកម្ពុជា កើនដល់លើស ១០ពាន់លានដុល្លារត្រឹមរយៈពេល ៧ខែដំបូងឆ្នាំនេះ ខណៈពាណិជ្ជកម្មជាមួយសរដ្ឋអាមេរិកក៏សម្រេចបានកំណើនខ្ពស់', '-1ZfxoM', 'App Development', 'Tech', 'upload/blogs/1840342008372522.jpg', 'ត្រឹមរយៈពេល៧ខែដំបូងឆ្នាំ២០២៥ នេះ ការធ្វើពាណិជ្ជកម្មទ្វេភាគីរវាងកម្ពុជា និងប្រទេសចិន សម្រេចបានទំហំ ១១ពាន់លានដុល្លារអាមេរិក ដែលជាកំណើនខ្ពស់ធៀបនឹងរយៈពេលដូចគ្នាកាលពីឆ្នាំ២០២៤ ដែលមានត្រឹម ៨៧២៤លានដុល្លារ។', '<p><span style=\"font-family: battambang, sans-serif;\">ស្របពេលទីផ្សារអន្តរជាតិបាន និងកំពុងវឹកវរដោយសារការគិតពន្ធគយថ្មីរបស់សហរដ្ឋអាមេរិក ទំនិញរបស់ចិនបានហូរទៅកាន់ទីផ្សារប្រទេសនានាដែលមិនគិតពន្ធ ឬគិតពន្ធទាបជាងទីផ្សារអាមេរិក ក្នុងនោះក៏មានកម្ពុជាដែរ បណ្ដាលឲ្យការនាំចូលពីចិនកើនដល់លើស ១ម៉ឺនលានដុល្លារត្រឹមរយៈពេល ៧ខែដំបូងដូច្នេះ។ កាលពីឆ្នាំ២០២៤ រយៈពេល១២ខែពេញ កម្ពុជានាំចូលទំនិញពីចិនមានចំនួនសរុប ១៣.៤៤០លានដុល្លារ ខណៈការនាំចេញមានចំនួន ១.៧៥០លានដុល្លារ។ រយៈពេល៥ខែនៅសេសសល់សម្រាប់ឆ្នាំ២០២៥នេះ ទំហំពាណិជ្ជកម្មទ្វេភាគីកម្ពុជា-ចិន នឹងអាចឈានដល់ ២ម៉ឺនលានដុល្លារជាលើកដំបូង ខណៈគិតតែខែកក្កដាមួយដែលទើបកន្លងផុតថ្មី ទំហំពាណិជ្ជកម្មរវាងប្រទេសទាំងពីរសម្រេចបានដល់ទៅ ១.៧២៥លានដុល្លារក្នុងមួយខែ។</span></p>', 'Bunthong', NULL, '2025-08-12 10:08:00', 4, '2025-08-13 05:08:26', '2025-08-23 02:18:08'),
(17, 'Mobile App Development: The Complete Guide for 2025', 'mobile-app-development-the-complete-guide-for-202-HBvUpF', 'App Development', 'Tech', 'upload/blogs/1840353179605367.jpg', 'In today’s digital age, mobile apps have become an essential part of our daily lives—helping us communicate, shop, work, entertain ourselves, and even stay fit. For businesses and individuals, mobile app development isn’t just a trend; it’s a necessity. But what exactly is mobile app development, and how can you get started? Let’s dive in.', '<h3 data-start=\"498\" data-end=\"537\"><strong data-start=\"502\" data-end=\"537\">What is Mobile App Development?</strong></h3>\r\n<p data-start=\"538\" data-end=\"901\">Mobile app development is the process of creating software applications that run on mobile devices such as smartphones and tablets. These apps can be <strong data-start=\"688\" data-end=\"698\">native</strong> (built for a specific operating system like iOS or Android), <strong data-start=\"760\" data-end=\"770\">hybrid</strong> (using web technologies packaged into an app), or <strong data-start=\"821\" data-end=\"852\">progressive web apps (PWAs)</strong> that run in a browser but feel like native apps.</p>\r\n<hr data-start=\"903\" data-end=\"906\">\r\n<h3 data-start=\"908\" data-end=\"950\"><strong data-start=\"912\" data-end=\"950\">Why Mobile App Development Matters</strong></h3>\r\n<ul data-start=\"951\" data-end=\"1443\">\r\n<li data-start=\"951\" data-end=\"1095\">\r\n<p data-start=\"953\" data-end=\"1095\"><strong data-start=\"953\" data-end=\"969\">Market Reach</strong> &ndash; Over 6.9 billion people use smartphones worldwide in 2025. Having a mobile app allows you to tap into a massive audience.</p>\r\n</li>\r\n<li data-start=\"1096\" data-end=\"1234\">\r\n<p data-start=\"1098\" data-end=\"1234\"><strong data-start=\"1098\" data-end=\"1117\">User Engagement</strong> &ndash; Apps provide a direct communication channel with push notifications, personalized content, and loyalty programs.</p>\r\n</li>\r\n<li data-start=\"1235\" data-end=\"1336\">\r\n<p data-start=\"1237\" data-end=\"1336\"><strong data-start=\"1237\" data-end=\"1255\">Brand Presence</strong> &ndash; Being visible on a user&rsquo;s phone screen helps maintain top-of-mind awareness.</p>\r\n</li>\r\n<li data-start=\"1337\" data-end=\"1443\">\r\n<p data-start=\"1339\" data-end=\"1443\"><strong data-start=\"1339\" data-end=\"1360\">Revenue Potential</strong> &ndash; Mobile apps can generate income through in-app purchases, subscriptions, or ads.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1445\" data-end=\"1448\">\r\n<h3 data-start=\"1450\" data-end=\"1478\"><strong data-start=\"1454\" data-end=\"1478\">Types of Mobile Apps</strong></h3>\r\n<ol data-start=\"1479\" data-end=\"1914\">\r\n<li data-start=\"1479\" data-end=\"1569\">\r\n<p data-start=\"1482\" data-end=\"1569\"><strong data-start=\"1482\" data-end=\"1497\">Native Apps</strong> &ndash; Built specifically for iOS or Android using Swift, Kotlin, or Java.</p>\r\n</li>\r\n<li data-start=\"1570\" data-end=\"1687\">\r\n<p data-start=\"1573\" data-end=\"1687\"><strong data-start=\"1573\" data-end=\"1588\">Hybrid Apps</strong> &ndash; Developed with HTML, CSS, and JavaScript, then wrapped in a native container (Ionic, Cordova).</p>\r\n</li>\r\n<li data-start=\"1688\" data-end=\"1823\">\r\n<p data-start=\"1691\" data-end=\"1823\"><strong data-start=\"1691\" data-end=\"1714\">Cross-Platform Apps</strong> &ndash; Created using frameworks like React Native or Flutter to work on both iOS and Android from one codebase.</p>\r\n</li>\r\n<li data-start=\"1824\" data-end=\"1914\">\r\n<p data-start=\"1827\" data-end=\"1914\"><strong data-start=\"1827\" data-end=\"1858\">Progressive Web Apps (PWAs)</strong> &ndash; Web applications that look and feel like native apps.</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"1916\" data-end=\"1919\">\r\n<h3 data-start=\"1921\" data-end=\"1963\"><strong data-start=\"1925\" data-end=\"1963\">The Mobile App Development Process</strong></h3>\r\n<ol data-start=\"1964\" data-end=\"2521\">\r\n<li data-start=\"1964\" data-end=\"2056\">\r\n<p data-start=\"1967\" data-end=\"2056\"><strong data-start=\"1967\" data-end=\"1986\">Idea &amp; Research</strong><br data-start=\"1986\" data-end=\"1989\">Define your app&rsquo;s purpose, audience, and competitive advantages.</p>\r\n</li>\r\n<li data-start=\"2057\" data-end=\"2163\">\r\n<p data-start=\"2060\" data-end=\"2163\"><strong data-start=\"2060\" data-end=\"2090\">Wireframing &amp; UI/UX Design</strong><br data-start=\"2090\" data-end=\"2093\">Create the visual layout and user flow for an intuitive experience.</p>\r\n</li>\r\n<li data-start=\"2164\" data-end=\"2252\">\r\n<p data-start=\"2167\" data-end=\"2252\"><strong data-start=\"2167\" data-end=\"2182\">Development</strong><br data-start=\"2182\" data-end=\"2185\">Write the code, integrate APIs, and ensure smooth functionality.</p>\r\n</li>\r\n<li data-start=\"2253\" data-end=\"2338\">\r\n<p data-start=\"2256\" data-end=\"2338\"><strong data-start=\"2256\" data-end=\"2267\">Testing</strong><br data-start=\"2267\" data-end=\"2270\">Conduct functional, usability, and performance tests to fix bugs.</p>\r\n</li>\r\n<li data-start=\"2339\" data-end=\"2424\">\r\n<p data-start=\"2342\" data-end=\"2424\"><strong data-start=\"2342\" data-end=\"2356\">Deployment</strong><br data-start=\"2356\" data-end=\"2359\">Launch the app on Google Play Store, Apple App Store, or both.</p>\r\n</li>\r\n<li data-start=\"2425\" data-end=\"2521\">\r\n<p data-start=\"2428\" data-end=\"2521\"><strong data-start=\"2428\" data-end=\"2453\">Maintenance &amp; Updates</strong><br data-start=\"2453\" data-end=\"2456\">Improve features, fix issues, and keep up with new OS updates.</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"2523\" data-end=\"2526\">\r\n<h3 data-start=\"2528\" data-end=\"2577\"><strong data-start=\"2532\" data-end=\"2577\">Trends in Mobile App Development for 2025</strong></h3>\r\n<ul data-start=\"2578\" data-end=\"3033\">\r\n<li data-start=\"2578\" data-end=\"2671\">\r\n<p data-start=\"2580\" data-end=\"2671\"><strong data-start=\"2580\" data-end=\"2599\">AI-Powered Apps</strong> &ndash; Personalized recommendations, chatbots, and intelligent automation.</p>\r\n</li>\r\n<li data-start=\"2672\" data-end=\"2753\">\r\n<p data-start=\"2674\" data-end=\"2753\"><strong data-start=\"2674\" data-end=\"2691\">5G Technology</strong> &ndash; Faster speeds enabling AR, VR, and real-time experiences.</p>\r\n</li>\r\n<li data-start=\"2754\" data-end=\"2837\">\r\n<p data-start=\"2756\" data-end=\"2837\"><strong data-start=\"2756\" data-end=\"2780\">Wearable Integration</strong> &ndash; Apps designed for smartwatches and fitness trackers.</p>\r\n</li>\r\n<li data-start=\"2838\" data-end=\"2926\">\r\n<p data-start=\"2840\" data-end=\"2926\"><strong data-start=\"2840\" data-end=\"2872\">Low-Code/No-Code Development</strong> &ndash; Faster, easier app creation without heavy coding.</p>\r\n</li>\r\n<li data-start=\"2927\" data-end=\"3033\">\r\n<p data-start=\"2929\" data-end=\"3033\"><strong data-start=\"2929\" data-end=\"2943\">Super Apps</strong> &ndash; All-in-one platforms combining multiple services (e.g., payments, shopping, messaging).</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"3035\" data-end=\"3038\">\r\n<h3 data-start=\"3040\" data-end=\"3090\"><strong data-start=\"3044\" data-end=\"3090\">Essential Skills for Mobile App Developers</strong></h3>\r\n<ul data-start=\"3091\" data-end=\"3342\">\r\n<li data-start=\"3091\" data-end=\"3166\">\r\n<p data-start=\"3093\" data-end=\"3166\">Proficiency in programming languages (Swift, Kotlin, JavaScript, Dart).</p>\r\n</li>\r\n<li data-start=\"3167\" data-end=\"3212\">\r\n<p data-start=\"3169\" data-end=\"3212\">Understanding of UI/UX design principles.</p>\r\n</li>\r\n<li data-start=\"3213\" data-end=\"3259\">\r\n<p data-start=\"3215\" data-end=\"3259\">Knowledge of APIs and backend integration.</p>\r\n</li>\r\n<li data-start=\"3260\" data-end=\"3302\">\r\n<p data-start=\"3262\" data-end=\"3302\">Familiarity with app store guidelines.</p>\r\n</li>\r\n<li data-start=\"3303\" data-end=\"3342\">\r\n<p data-start=\"3305\" data-end=\"3342\">Problem-solving and debugging skills.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"3344\" data-end=\"3347\">\r\n<h3 data-start=\"3349\" data-end=\"3367\"><strong data-start=\"3353\" data-end=\"3367\">Conclusion</strong></h3>\r\n<p data-start=\"3368\" data-end=\"3651\">Mobile app development is a rapidly evolving field with endless opportunities. Whether you&rsquo;re a business aiming to engage customers or a developer looking to showcase your skills, building a mobile app in 2025 requires creativity, technical know-how, and an eye on emerging trends.</p>\r\n<p data-start=\"3653\" data-end=\"3796\">If you want to stand out, focus on <strong data-start=\"3688\" data-end=\"3713\">solving real problems</strong>, delivering <strong data-start=\"3726\" data-end=\"3753\">smooth user experiences</strong>, and <strong data-start=\"3759\" data-end=\"3795\">keeping up with new technologies</strong>.</p>\r\n<hr data-start=\"3798\" data-end=\"3801\">\r\n<p data-start=\"3803\" data-end=\"3984\" data-is-last-node=\"\" data-is-only-node=\"\">If you want, I can also make this <strong data-start=\"3837\" data-end=\"3854\">SEO-optimized</strong> with targeted keywords and meta descriptions so it ranks better in Google search results. Would you like me to prepare that next?</p>', 'Bunthong', NULL, '2025-08-11 12:05:00', 0, '2025-08-13 08:06:00', '2025-08-13 08:06:12'),
(18, 'ថៃឈ្លានពានកម្ពុជាដោយបើកការវាយប្រហារមុននៅព្រំដែនខេត្តឧត្ដរមានជ័យ ខណៈការផ្ទុះអាវុធកំពុងរាលដាលតាមព្រំដែនខេត្តផ្សេងទៀត', 'ti-tiCCP5NvekdTbupf', 'International', NULL, 'upload/blogs/1840355267732298.jpg', 'នៅព្រឹកម៉ោងប្រហែល ៨:២០នាទី ថ្ងៃទី ២៤ ខែកក្កដា ឆ្នាំ២០២៥ នេះ យោធាថៃបានបើកការចាញ់ប្រហារមុន មកលើកម្ពុជានៅតំបន់ព្រំដែនភូមិសាស្ត្រខេត្តឧត្តរមានជ័យ ខណៈកងទ័ពកម្ពុជាបានបាញ់តបការពារទឹកដីរបស់ខ្លួន។', '<div>\r\n<div>\r\n<p style=\"list-style-type: revert; line-height: 2;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">គិតត្រឹមម៉ោង១១ ថ្ងៃដដែល ការផ្ទុះអាវុធវាយប្រហារគ្នា ត្រូវបានគេរាយការណ៍ថាកំពុងរីករាលដាលដល់ខេត្តព្រះវិហារ និងស្ថិតក្នុងហានិភ័យរាលដាលទូទាំងព្រំដែននៃប្រទេសទាំងពីរ។ ប្រជាជននៅតាមបន្ទាត់ព្រំដែននៃប្រទេសទាំងពីរកំពុងប្រឈមគ្រោះថ្នាក់ ស្របពេលដែលពួកគាត់ជួបប្រទះបញ្ហាសេដ្ឋកិច្ចបណ្ដាលមកពីការបិទច្រកព្រំដែនស្រាប់ទៅហើយ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert; line-height: 2;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">ដោយឡែកបណ្ដាញផ្សព្វផ្សាយនៅស្រុកថៃ បាន និងកំពុងព្យាយាម ផ្សាយបង្ខូចកម្ពុជា ថាជាអ្នកបើកការបាញ់ប្រហារមុន ដោយយោងទៅលើសម្ដីអ្នកនាំពាក្យក្រសួងការពារថៃ លោក Winthai Suwaree ដែលកំពុងដើរតួជាអ្នកនាំភ្លើង ជាជាងតំណែងជាអ្នកនាំពាក្យ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert; line-height: 2;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">គួរជ្រាបថា ក្រុមយោថៃបានព្យាយាមរករឿងបង្កើតបញ្ហាជាមួយប្រទេសកម្ពុជាអស់រយៈពេលជាច្រើនខែមកហើយ ចាប់ពីការបិទច្រកព្រំដែនដោយឯកតោភាគី រហូតដល់ចុងក្រោយនេះបានប្រើប្រាស់ឧបត្តិហេតុផ្ទុះគ្រាប់មីន ដើម្បីបង្កើតសេណារីយ៉ូឲ្យមហាជនថៃផ្ទុះកំហឹងលើប្រទេសកម្ពុជា រួចប្រើប្រាស់វាដើម្បីផ្ទុះអាវុធ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert; line-height: 2;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">ជម្រើសបើកសង្គ្រាមជាមួយប្រទេសជិតខាងរបស់ខ្លួន អាចជាយុទ្ធសាស្ត្រមួយរបស់ថៃ ក្នុងបំណងរំលត់ជម្លោះរវាងអ្នកនយោបាយផ្ទៃក្នុង និងបើកផ្លូវឲ្យក្រុមយោធាថៃឡើងដឹកនាំប្រទេសជំនួសគ្រួសារលោក ថាក់ស៊ីន។ វិបត្តិនយោបាយនៅប្រទេសថៃ កំពុងវឹកវរដោយសារបញ្ហាសេដ្ឋកិច្ច បញ្ហាធ្លាក់ចុះចំនួនភ្ញៀវទេចរណ៍អន្តរជាតិ ពន្ធគយរបស់សហរដ្ឋអាមេរិក និងរឿងអាម៉ាសដែលគ្រួសារនាយករដ្ឋមន្ត្រីថៃបង្កឡើង ទាំងការបោកបន្លំមហាជនជាអ្នកជម្ងឺដើម្បីគេចពីការឃុំខ្លួន និងការសន្ទនារឿងផ្ទៃក្នុងប្រទេសជាតិជាមួយមេដឹកនាំប្រទេសជិតខាង។ ប្រទេសថៃកំពុងរួមរឹតដោយបញ្ហាជាច្រើនដោយខ្លួនឯង ប៉ុន្តែពួកគេបែរជាបន្ទោស និងរករឿងប្រទេសជិតខាង ដើម្បីយកល្អនៅចំពោះមុខប្រជាជនរបស់ខ្លួនទៅវិញ៕&nbsp;</span></p>\r\n<p style=\"list-style-type: revert; line-height: 2;\">&nbsp;</p>\r\n</div>\r\n<div style=\"line-height: 2;\">\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div style=\"line-height: 2;\">&nbsp;</div>\r\n<div>\r\n<div>\r\n<div style=\"line-height: 2;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>', 'Bunthong', NULL, '2025-08-13 01:40:00', 0, '2025-08-13 08:39:11', '2025-08-13 09:17:23'),
(19, 'ក្រោយជំនួបចរចានៅស្វីស ចិន និងអាមេរិក យល់ព្រមបន្ថយពន្ធលើគ្នាទៅវិញទៅមក មកនៅត្រឹម 30% និង 10% រយៈពេល 90ថ្ងៃ', 'ti-tib4uj0e0vBFadBg', 'International', NULL, 'upload/blogs/1840355682698060.jpg', NULL, '<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">យោងតាមសេចក្តីថ្លែងការណ៍រួមមួយចេញផ្សាយថ្ងៃទី១២ឧសភានេះ បានឱ្យដឹងថា សហរដ្ឋអាមេរិក និងចិនបានយល់ព្រមគ្នាកាត់បន្ថយពន្ធជាបណ្តោះអាសន្នរយៈពេល៩០ថ្ងៃ លើផលិតផលរបស់គ្នាទៅវិញទៅមក ដើម្បីបន្ធូរភាពតានតឹងពាណិជ្ជកម្ម និងទុកពេលឱ្យប្រទេសមានសេដ្ឋកិច្ចធំជាងគេទាំងពីរនេះ សម្រាប់ដោះស្រាយគំនិតខ្វែងគ្នារបស់ភាគីទាំងពីរ។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">យោងតាមសេចក្តីថ្លែងការណ៍ និងមន្ត្រីខាងអាមេរិកនៅក្នុងសន្និសីទសារព័ត៌មាននាថ្ងៃចន្ទនេះនៅទីក្រុងហ្សឺណែវ ប្រទេសស្វីស បានឱ្យដឹងថា ពន្ធសរុបចំនួន 145% របស់សហរដ្ឋអាមេរិកលើប្រទេសចិន នឹងត្រូវកាត់បន្ថយមកត្រឹម 30% ខណៈពន្ធចំនួន 125% របស់ចិនលើទំនិញអាមេរិក ក៏នឹងធ្លាក់ចុះមកត្រឹម 10% វិញដែរ ។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">លទ្ធផលនៃកិច្ចចរចារវាងចិន និងអាមេរិក លើជម្លោះពន្ធគយត្រូវបានរៀបចំឡើងនៅប្រទេសស្វីសនេះ គឺជាព័ត៌មានល្អសម្រាប់ទីផ្សារទូទៅ ជាពិសេសផ្សារហ៊ុនអាមេរិក និងចិន ហើយប្រាក់យន់ចិន និងដុល្លារអាមេរិកក៏កំពុងមានសន្ទុះផងដែរ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">ដោយឡែកភាគីចិនវិញ តាមរយៈទីភ្នាក់ងារព័ត៌មានចិនស៊ិនហួ បានរាយការណ៍ថា ប្រទេសចិនតែងតែដោះស្រាយទំនាក់ទំនងជាមួយសហរដ្ឋអាមេរិក ដោយផ្អែកលើគោលការណ៍នៃការគោរពគ្នាទៅវិញទៅមក។ ប្រទេសចិនបានប្តេជ្ញាចិត្តចំពោះការអភិវឌ្ឍន៍ប្រកបដោយស្ថិរភាព ក្នុងទំនាក់ទំនងជាមួយសហរដ្ឋអាមេរិក។ យ៉ាងណាមិញ ទីក្រុងប៉េកាំងមិនភ្លេចផ្ដាំរំលឹកជាថ្មីទៀតឡើយ ថាការដាក់សម្ពាធ និងការគំរាមកំហែង មិនមែនជាវិធីត្រឹមត្រូវទេ ក្នុងការដោះស្រាយជាមួយប្រទេសចិន៕</span></p>', 'Ti Ti', NULL, '2025-08-13 07:45:00', 0, '2025-08-13 08:45:47', '2025-08-13 08:45:47'),
(20, 'លោក Trump បង្ហាញសញ្ញាចង់បញ្ចុះពន្ធលើចិនពី ១៤៥% មកនៅត្រឹម ៨០% វិញ ចំពេលមន្ត្រីរបស់ខ្លួនធ្វើដំណើរទៅស្វីសដើម្បីចរចាជាមួយចិននាចុងសប្ដាហ៍នេះ', 'trump-ti-ti-dLvoNpqDNB7c6e', 'International', NULL, 'upload/blogs/1840356211786600.jpg', NULL, '<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">តាមរយៈសារមួយដែលត្រូវបានបង្ហោះលើប្រព័ន្ធផ្សព្វផ្សាយ Truth Social របស់ខ្លួននៅថ្ងៃសុក្រ ខែឧសភានេះ លោកប្រធានាធិបតី Donald Trump បាននិយាយថា&nbsp;<em style=\"list-style-type: revert;\"><strong style=\"list-style-type: revert;\">\"ពន្ធ ៨០% លើប្រទេសចិនហាក់ដូចជាអត្រាត្រឹមត្រូវ!&rdquo;</strong></em>។ លោក Trump បានបង្ហើបទំនងដូចជាចង់ស្ទង់ជំហរ ឬចង់ឲ្យចិនដឹងទៀតថា លោក Scott Bessent នឹងមានសិទ្ធិសម្រេចនៅពេលជួបចរចាជាមួយភាគីចិន។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif;\">កត់សម្គាល់ថា សារនេះត្រូវបានបង្ហោះចំពេលដែលលោក Scott Bessent រដ្ឋលេខាធិការរតនាគារអាមេរិក កំពុងធ្វើដំណើរទៅកាន់ប្រទេសស្វីសនៅចុងសប្តាហ៍នេះ ដើម្បីចរចាបញ្ហាពាណិជ្ជកម្មដោយផ្ទាល់ និងជាលើកដំបូងជាមួយប្រទេសចិន ចាប់ពីពេលរដ្ឋបាលលោក Trump បើកសង្គ្រាមពាណិជ្ជកម្មជាមួយទីក្រុងប៉េកាំងក្នុងអាណត្តិទីពីររបស់លោក។ អត្រា ៨០% ដែល Trump បានស្នើលើបណ្ដាញសង្គមនេះ គឺជាការបញ្ចុះអត្រាពន្ធយ៉ាងច្រើន ធៀបនឹងអត្រាដែលគាត់ទើបបានតម្លើងលើចិនដល់ ១៤៥%។ a</span></p>', 'Bunthong', NULL, '2025-08-12 11:53:00', 2, '2025-08-13 08:53:25', '2025-08-23 00:58:06'),
(21, 'ក្រុមហ៊ុន OCIC របស់លោកអ្នកឧកញ៉ា ពុង ឃាវសែ កំពុងអភិវឌ្ឍន៍គម្រោងលំនៅឋានថ្មីបន្ថែមលើដី 70ហិកតា នៅខេត្តសៀមរាប មានបញ្ចុះតម្លៃរហូត 13%', 'ocic-ti-ti-cuhjZcCxbR2Qaf', 'App Development', NULL, 'upload/blogs/1840684133892107.jpg', NULL, '<p><span style=\"font-family: battambang, sans-serif; font-size: 14pt;\">សៀមរាប៖ បុរីទេសចរណ៍បើកលក់គម្រោងថ្មីជាផ្លូវការ ជាមួយតម្លៃ និងលក្ខខណ្ឌពិសេស (Pre Sales) បញ្ចុះតម្លៃរហូត 13% បង់មុនត្រឹមតែ 5% ក្លាយជាម្ចាស់ផ្ទះភ្លាមៗ រំលស់រយ:ពេលវែង 25ឆ្នាំ។</span><br><br><span style=\"font-family: battambang, sans-serif; font-size: 14pt;\"><span style=\"list-style-type: revert;\">បុរីទេសចរណ៍ គឺជាបុរីដែលធំជាងគេនៅក្នុងខេត្តសៀមរាប ស្ថិតនៅលើផ្លូវជាតិលេខ 6A&nbsp;</span><span style=\"list-style-type: revert;\">ត្រឹមតែ 2នាទីពីផ្សារទំនើបម៉ាក្រូខេត្តសៀមរាប ក្នុងតំបន់មានសក្ដានុពលនិងអភិវឌ្ឍន៍ខ្លាំង នៅភាគខាងកើតនៃក្រុងសៀមរាប ចំងាយប្រហែល 40នាទី ពីព្រលានយន្តហោះអន្តរជាតិសៀមរាប​ ព្រមទាំងនៅជិតកន្លែងកំសាន្តល្បីៗផ្សេងទៀត។​​</span></span><br><br></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">សូមជម្រាបថា គម្រោងបុរីទេសចរណ៍ ត្រូវបានអភិវឌ្ឍន៍ផ្ដោតលើការសាងសង់លំនៅដ្ឋានសម្រាប់រស់នៅ និងផ្ទះអាជីវកម្ម។ បុរីទេសចរណ៍ អភិវឌ្ឍន៍ដោយក្រុមហ៊ុនវិនិយោគទុនអាណិកជនកម្ពុជា ហៅកាត់ថា OCIC និងហិរញ្ញប្បទានផ្ទាល់ពីធនាគារកាណាឌីយ៉ា លាតសន្ធឹងលើផ្ទៃដីសរុបប្រមាណ 70ហិកតា។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">ដោយឡែក គម្រោងថ្មីទើបបើកលក់នេះក្នុងបុរីទេសចរណ៍នេះ មានផ្ដល់ជូនប្រភេទផ្ទះដូចជា វីឡាទោល ដែលផ្ដល់ជូនឯកជនភាព 100% និងល្វែងកូនកាត់កំពស់ 3ជាន់ ស័ក្ដិសមបំផុតសម្រាប់អ្នកមានសមាជិកគ្រួសារច្រើន។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"font-family: battambang, sans-serif; font-size: 14pt;\"><span style=\"list-style-type: revert;\"><br style=\"list-style-type: revert;\"></span><span style=\"list-style-type: revert;\">បើកលក់ក្នុងតម្លៃពិសេសចាប់ពី 10ម៉ឺនដុល្លារ ជាងតែប៉ុណ្ណោះ ហើយរឹតតែពិសេសសម្រាប់អតិថិជនដែលបានកក់ 10នាក់ដំបូង​ នឹងទទួលបានការបញ្ចុះតម្លៃរហូត 13%​ ព្រមទាំងទទួលបានប្រូម៉ូសិនបន្ថែមជូនជាច្រើនផ្សេងទៀតដូចជា</span></span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">&bull; ទូតាំងផ្ទះបាយលើក្រោម 1ឈុត និង ទូតាំងទូរទស្សន៍ 1ឈុត</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">&bull; ហ្វ្រីតភ្ជាប់ប្រពន្ធ័កំចាត់សត្វកណ្ដៀ រ</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">&bull; ហ្វ្រីតភ្ជាប់ទឹក និងភ្លើងរដ្ឋជូនដោយឥតគិតថ្លៃ<br><br></span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">ក្នុងគម្រោងក៏មានផ្ទះសាងសង់រួចរាល់ 100% សម្រាប់លក់ជូនអតិថិជនផងដែរ​ ដែលមានទីតាំងល្អ បានទាំងប្រកបអាជីវកម្ម បានទាំងរស់នៅ ​និងមានតម្លៃចាប់ពី 7ម៉ឺនដុល្លារជាងឡើងទៅ ហើយអាចបង់មុន ត្រឹមតែ 5% នៃតម្លៃផ្ទះ ក៏លោកអ្នកអាច​កាន់សោរចូលស្នាក់នៅភ្លាម។ អតិថិជនអាចស្នើកម្ចីបានរហូតដល់ 95% នៃតម្លៃផ្ទះ តាមរយៈការបង់រំលស់រយៈពេលវែង 25​ឆ្នាំ ជាមួយធនាគារ កាណាឌីយ៉ា​ ដោយមានអត្រាការប្រាក់ត្រឹមតែ 0.67% តែប៉ុណ្ណោះ។&nbsp;</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">Pre-Sales! ព័ត៌មានលម្អិតបន្ថែមទាក់ទងទៅកាន់សហការីផ្នែកលក់៖&nbsp;077 266 209 ឬ 092 354 347</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert; font-family: battambang, sans-serif; font-size: 14pt;\">ទីតាំងការរិយាល័យលក់ ស្ថិតនៅជាប់ច្រកខាងមុខ បុរីទេសចរណ៍ តាមបណ្ដោយផ្លូវជាតិលេខ 6A&nbsp;&nbsp;ភូមិគោកត្នោត ឃុំកណ្ដែក ស្រុកប្រាសាទបាគង ខេត្តសៀមរាប។</span></p>\r\n<p style=\"list-style-type: revert;\"><span style=\"list-style-type: revert;\">&nbsp;</span></p>', 'Bunthong', NULL, '2025-08-16 23:45:00', 18, '2025-08-16 23:46:23', '2025-08-24 00:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_studies`
--

CREATE TABLE `case_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_studies`
--

INSERT INTO `case_studies` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(14, 'upload/casestudies/1841158647215203.jpg', 'Streamlining Operations and Boosting Sales for a Retail Store in Battambang with Our POS System', 'This client faced significant challenges managing their sales, inventory, and customer data. We implemented our POS system, which automated their processes, reduced inventory errors, and sped up the checkout experience.', '2025-08-22 05:28:34', '2025-08-22 05:28:34'),
(15, 'upload/casestudies/1841158746798273.jpg', 'Enhancing Customer Service and Efficiency for a Restaurant with Our Management System', 'A restaurant struggled with order management and long wait times. Our solution provided a system for efficient table management and order processing, improving customer satisfaction and speeding up service.', '2025-08-22 05:30:09', '2025-08-22 05:30:09'),
(16, 'upload/casestudies/1841159272975560.jpg', 'Improving Productivity for a Small Business with Our ERP Software', 'This business was bogged down by manual workflows across departments. We provided an ERP solution that integrated their financial, inventory, and HR functions, leading to improved productivity and better decision-making.', '2025-08-22 05:38:31', '2025-08-22 05:38:31'),
(17, 'upload/casestudies/1841159352293477.jpg', 'Boosting Online Sales for an E-commerce Business with Our CRM Software', 'An online store needed a better way to manage customer inquiries and track sales leads. Our CRM system centralized their customer data and automated communications, resulting in higher sales conversions.', '2025-08-22 05:39:46', '2025-08-22 05:39:46'),
(18, 'upload/casestudies/1841159426895789.jpg', 'Optimizing Patient Management for a Clinic in Battambang with Our Software', 'A clinic struggled with patient scheduling and records management. Our software automated appointments, digitalized patient files, and streamlined billing, enhancing their overall patient care.', '2025-08-22 05:40:57', '2025-08-22 05:40:57'),
(19, 'upload/casestudies/1841159550473062.jpg', 'Revolutionizing Learning and Administration for a School with Our LMS at Poipet city', 'A school needed a modern way to manage students and deliver course materials. We implemented our LMS, which provided a platform for online classes, grade tracking, and communication between teachers and students.', '2025-08-22 05:42:55', '2025-08-22 05:42:55'),
(20, 'upload/casestudies/1841159730685924.jpg', 'Installing Warehouse & Inventory Management at Phnom Penh, Khan Prek Phnov', 'This warehouse faced constant inventory discrepancies due to manual tracking. Our system provided real-time inventory updates and automated stock alerts, significantly reducing errors and improving efficiency.', '2025-08-22 05:45:47', '2025-08-22 05:45:47'),
(21, 'upload/casestudies/1841159885883709.jpg', 'Real Estate & CRM at Siem Reap', 'A real estate agency was losing track of potential clients and properties. Our CRM helped them manage leads, track client communications, and organize property listings, leading to more successful sales.', '2025-08-22 05:48:15', '2025-08-22 05:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `website_url`, `created_at`, `updated_at`) VALUES
(1, 'Khmer', 'upload/clients/1840234572288281.png', 'https://www.youtube.com/', '2025-08-12 00:40:47', '2025-08-12 00:41:18'),
(2, 'France', 'upload/clients/1840234623091980.png', 'https://www.youtube.com/', '2025-08-12 00:41:36', '2025-08-12 00:41:36'),
(3, 'Swiss', 'upload/clients/1840234648170479.png', 'https://www.youtube.com/', '2025-08-12 00:42:00', '2025-08-12 00:42:00'),
(4, 'PhnomPenh', 'upload/clients/1840234698320841.png', 'https://poipetinsider.com/', '2025-08-12 00:42:48', '2025-08-12 00:42:48'),
(5, 'Bayon Temple', 'upload/clients/1840234733638350.png', 'https://poipetinsider.com/', '2025-08-12 00:43:21', '2025-08-12 01:13:40'),
(10, 'Poipet Inisder', 'upload/clients/1840240881371417.png', 'https://poipetinsider.com/', '2025-08-12 02:20:35', '2025-08-12 02:24:10'),
(11, 'OCIC', 'upload/clients/1840240975200043.png', 'https://www.ocic.com.kh/', '2025-08-12 02:22:34', '2025-08-12 02:24:01'),
(12, 'Anajak Hamuman', 'upload/clients/1840242064025089.png', 'https://www.hanumanestate.com.kh/', '2025-08-12 02:23:43', '2025-08-12 02:39:52'),
(13, 'Future Design X Build', 'upload/clients/1840810465184717.png', 'https://www.facebook.com/futurefurniturezz/', '2025-08-12 02:25:47', '2025-08-18 09:14:22'),
(14, 'TIA City ធី អាយ អេ ស៊ីធី', 'upload/clients/1840810487611455.png', 'https://www.facebook.com/profile.php?id=61555283248818', '2025-08-12 02:29:00', '2025-08-18 09:14:43'),
(15, 'Tourism City បុរី ទេសចរណ៍', 'upload/clients/1840241809102583.png', 'https://www.facebook.com/profile.php?id=100069751121832', '2025-08-12 02:33:44', '2025-08-12 02:35:49'),
(16, 'Chroy Changvar Satellite City', 'upload/clients/1840697987181419.png', 'https://www.facebook.com/chroychangvarcity', '2025-08-12 02:38:12', '2025-08-17 03:26:35'),
(17, 'WingBook', 'upload/clients/1840810224769901.png', 'https://www.facebook.com/WingBookGroup', '2025-08-12 02:41:15', '2025-08-18 09:10:32'),
(18, 'PPI Podcast', 'upload/clients/1840242613919899.png', 'https://www.youtube.com/@PoipetInsiderPodcast', '2025-08-12 02:44:46', '2025-08-12 02:48:36'),
(19, 'Khmer Noble Life', 'upload/clients/1840242741910616.png', NULL, '2025-08-12 02:49:27', '2025-08-12 02:50:38'),
(20, 'Anajak Software', 'upload/clients/1840698278445848.png', NULL, '2025-08-17 03:28:05', '2025-08-17 03:31:12'),
(21, 'Spru', 'upload/clients/1840812061196753.png', NULL, '2025-08-18 09:02:56', '2025-08-18 09:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_links`
--

CREATE TABLE `contact_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL COMMENT 'e.g., Envelope, TelegramLogo',
  `hover_color` varchar(255) DEFAULT NULL COMMENT 'e.g., hover:bg-red-500',
  `order` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_links`
--

INSERT INTO `contact_links` (`id`, `title`, `detail`, `href`, `icon_class`, `hover_color`, `order`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'Telegram', NULL, 'https://poipetinsider.com/', 'TelegramLogoIcon', 'hover:bg-sky-500', 1, 1, '2025-08-19 03:06:46', '2025-08-19 21:32:03'),
(2, 'Email', NULL, 'https://poipetinsider.com/', 'EnvelopeIcon', 'hover:bg-red-600', 2, 1, '2025-08-19 03:06:46', '2025-08-19 21:32:03'),
(3, 'Facebook Page', NULL, 'https://poipetinsider.com/', 'FacebookLogoIcon', 'hover:bg-blue-600', 3, 1, '2025-08-19 03:06:46', '2025-08-19 21:32:03'),
(4, 'LinkedIn', NULL, 'https://poipetinsider.com/', 'LinkedinLogoIcon', 'hover:bg-blue-700', 4, 0, '2025-08-19 03:06:46', '2025-08-19 21:32:03'),
(5, 'Tiktok', NULL, 'https://poipetinsider.com/', 'TiktokLogoIcon', 'hover:bg-black', 5, 1, '2025-08-19 03:06:46', '2025-08-19 21:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_pages`
--

CREATE TABLE `contact_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `map_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_pages`
--

INSERT INTO `contact_pages` (`id`, `title`, `description`, `map_url`, `created_at`, `updated_at`) VALUES
(1, 'Get in touch', 'We\'d love to hear from you. Whether you have a question about our services, pricing, or anything else, our team is ready to answer all your questions.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1159.6006923515458!2d104.819402457436!3d11.586128404512854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094f408204b59b%3A0x5ea3a0d5caab9667!2sBorey%20Golden%20Avenue%20by%20Mekong%20Land!5e1!3m2!1sen!2skh!4v1755599972980!5m2!1sen!2skh\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-08-19 03:06:46', '2025-08-19 03:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `slogan` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `telegram_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `cta_title` varchar(255) DEFAULT NULL,
  `cta_description` text DEFAULT NULL,
  `cta_button_link` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) NOT NULL DEFAULT '#0f1e33',
  `font_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `logo`, `slogan`, `facebook_url`, `linkedin_url`, `telegram_url`, `instagram_url`, `youtube_url`, `cta_title`, `cta_description`, `cta_button_link`, `copyright_text`, `background_color`, `font_color`, `created_at`, `updated_at`) VALUES
(1, 'upload/footer/1840696889271937.png', 'Value your time by using great software products.', 'https://www.facebook.com/poipetinsider/', 'https://www.youtube.com/@PoipetInsider', 'https://www.youtube.com/@PoipetInsider', 'https://www.instagram.com/poipetinsider/', 'https://www.youtube.com/@PoipetInsider', 'Join Our Telegram Group', 'Stay updated with the latest tech trends, product launches, and exclusive insights from our team.', 'https://poipetinsider.com/', '© 2025 | AnajakSoftware. All Rights Reserved.', '#101e33', '#ffffff', '2025-08-15 00:01:18', '2025-08-17 03:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_sections`
--

CREATE TABLE `homepage_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'The display name of the section, e.g., "Hero Slider"',
  `component_key` varchar(255) NOT NULL COMMENT 'A unique key for the frontend component, e.g., "slider"',
  `order` int(11) NOT NULL DEFAULT 0 COMMENT 'The display order of the section on the homepage',
  `is_visible` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Toggle to show or hide the section',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_sections`
--

INSERT INTO `homepage_sections` (`id`, `name`, `component_key`, `order`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'Hero Slider', 'slider', 1, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(2, 'Services', 'services', 2, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(3, 'Case Studies', 'case-studies', 3, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(4, 'Testimonials', 'testimonials', 4, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(5, 'Our Clients', 'our-clients', 5, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(6, 'Latest News (Blog)', 'blog', 6, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(7, 'Partners', 'partners', 7, 1, '2025-08-19 23:30:16', '2025-08-20 01:24:17'),
(8, 'Top Navbar', 'topnav', 0, 1, '2025-08-20 00:06:00', '2025-08-20 01:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `label`, `link`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 0, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(2, 'About Us', '/about-us', 1, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(3, 'Our Services', '/#service', 2, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(4, 'Case Studies', '/case-studies', 4, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(5, 'Blog', '/blog', 5, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(6, 'Contact Us', '/contact-us', 6, 1, '2025-08-08 07:49:16', '2025-08-23 00:58:43'),
(7, 'Our Clients', '/#ourclient', 3, 1, '2025-08-12 03:03:02', '2025-08-23 00:58:43'),
(8, 'Store', '#store', 7, 0, '2025-08-15 21:34:01', '2025-08-23 00:58:43'),
(9, 'Book', '#book', 8, 0, '2025-08-15 21:35:36', '2025-08-23 00:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `menu_settings`
--

CREATE TABLE `menu_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `consultancy_text` varchar(255) DEFAULT 'Free Consultancy',
  `phone_number` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT '#FFFFFF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_settings`
--

INSERT INTO `menu_settings` (`id`, `logo_path`, `consultancy_text`, `phone_number`, `background_color`, `created_at`, `updated_at`) VALUES
(1, 'upload/menu/1840862608825360.png', 'Free Consultancy ☺️', '0888 999 734', '#ffffff', '2025-08-08 07:05:18', '2025-08-18 23:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '0001_01_01_000000_create_users_table', 1),
(14, '0001_01_01_000001_create_cache_table', 1),
(15, '0001_01_01_000002_create_jobs_table', 1),
(16, '2025_07_29_065527_create_sliders_table', 1),
(17, '2025_08_02_124417_create_personal_access_tokens_table', 1),
(18, '2025_08_04_075612_add_image_column_to_users_table', 1),
(19, '2025_08_04_090749_create_services_table', 1),
(20, '2025_08_07_041810_create_case_studies_table', 2),
(21, '2025_08_08_044233_create_top_navbars_table', 3),
(22, '2025_08_08_110457_create_menus_table', 4),
(23, '2025_08_08_132825_create_menu_settings_table', 4),
(24, '2025_08_11_090010_create_testimonials_table', 5),
(25, '2025_08_12_065041_create_clients_table', 6),
(26, '2025_08_12_130947_create_blogs_table', 7),
(27, '2025_08_14_124842_create_about_us_pages_table', 8),
(28, '2025_08_14_124936_create_team_members_table', 8),
(29, '2025_08_14_124958_create_timeline_events_table', 8),
(30, '2025_08_15_063046_create_footers_table', 9),
(31, '2025_08_19_091703_create_contact_pages_table', 10),
(32, '2025_08_19_091758_create_contact_links_table', 10),
(33, '2025_08_19_114356_create_settings_table', 11),
(34, '2025_08_20_061319_create_homepage_sections_table', 12),
(35, '2025_08_21_074320_create_ads_table', 13),
(36, '2025_08_23_055737_add_view_count_to_blogs_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('titicode1010@gmail.com', '$2y$12$6JqCZQp.0czFGLTjKqJ17OaVBLd6Jj2JwUjElmPpgfJGgg/kvya2C', '2025-08-22 01:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `order`, `created_at`, `updated_at`) VALUES
(21, 'App Development', 'We design and develop high-performance mobile apps for iOS and Android with a seamless user experience.', 'ph-duotone ph-device-mobile', 1, '2025-08-19 22:10:42', '2025-08-19 22:10:42'),
(22, 'Web Development', 'Build responsive, secure, and scalable websites tailored to your business goals.', 'ph-duotone ph-globe', 2, '2025-08-19 22:11:44', '2025-08-19 22:11:44'),
(23, 'Game Development', 'Create engaging 2D and 3D games with stunning visuals and smooth performance across all platforms.', 'ph-duotone ph-game-controller', 3, '2025-08-19 22:15:33', '2025-08-19 22:15:33'),
(24, 'Software System Developmen', 'We develop custom software systems to automate workflows and improve business efficiency.', 'ph-duotone ph-cpu', 4, '2025-08-19 22:17:03', '2025-08-19 22:17:03'),
(25, 'UX/UI Design', 'Craft user-centered interfaces and experiences that are modern, attractive, and highly intuitive.', 'ph-duotone ph-palette', 5, '2025-08-19 22:18:28', '2025-08-19 22:18:28'),
(26, 'Data Analytics', 'Transform your data into actionable insights with our advanced analytics and visualization tools.', 'ph-duotone ph-chart-bar', 6, '2025-08-19 22:19:25', '2025-08-19 22:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qO4FLF8JTPBimUGGjpaciC4x6PpsSHPdmOVMblm', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUFJjSDNsY01ZRGJXaXAyaWNCdjEwSTVONUcyeGFJRU50ZDBZOFZvMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755611877),
('GLX783vnuDweAuy9vlIKvDeqDKzQrpqnjIwlsSCd', 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY1ZsWWZXczNxRlNRNFJkczI3SVg4bldDTGVMSURuREpRTk9aYW5oUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RvcC1uYXZiYXIvc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FsbC9zbGlkZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1755861679),
('IaNQKTMnfmaOiO5m82DuCB4aXIhfp5CWmN2IgXMK', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiblJCQjZYelZ1aEtCd2Yyb1hjblNGVkFSbHROYzFZNkhqZ1dmVnptUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkZC9zZXJ2aWNlIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXR0aW5nL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1756019036),
('j51S5Nz6vRCbxMXoF2d2m0Rpk6q7Aevinz98MOQF', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTENsMjdyOXVsTHhYaUxpYWc3aFc2VmplU3NDU2VSRkFMVXdqdnBWVyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755852241);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_tagline` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_tagline`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Anajak Software', 'System, POS System, Mobile App, Web Development, Game Development', 'upload/setting/logo.png', 'upload/setting/favicon.png', '2025-08-19 05:49:22', '2025-08-19 06:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `description`, `link`, `image`, `created_at`, `updated_at`) VALUES
(6, NULL, NULL, 'https://t.me/BunthongRan', 'upload/slider/1841153498504726.jpg', '2025-08-22 03:57:48', '2025-08-22 04:06:44'),
(7, NULL, NULL, 'https://t.me/BunthongRan', 'upload/slider/1841153631284789.jpg', '2025-08-22 03:57:59', '2025-08-22 04:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `role`, `avatar`, `linkedin_url`, `twitter_url`, `facebook_url`, `order`, `created_at`, `updated_at`) VALUES
(3, 'Rorn Bunthong', 'Founder, and CTO', 'upload/team/1840493170951325.jpeg', 'https://poipetinsider.com/', 'https://poipetinsider.com/', 'https://poipetinsider.com/', 1, '2025-08-14 21:10:40', '2025-08-14 21:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role`, `quote`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Rorn Bunthong', 'Developer', 'Value your time by using great SOFTWARE !!', 'upload/testimonials/1840222856945855.jpeg', '2025-08-11 03:05:53', '2025-08-11 21:34:35'),
(3, 'Hak Virak', 'Head of Loan at Acelida Bank', 'Use great software, save you time !', 'upload/testimonials/1840153401939436.jpeg', '2025-08-11 03:10:37', '2025-08-11 03:10:37'),
(6, 'Sopha Visa', 'Founder of Tonsaey Chat', 'Best system with cool interface !', 'upload/testimonials/1840154855488211.jpeg', '2025-08-11 03:33:43', '2025-08-11 03:33:43'),
(7, 'SoloDev', 'Content Creator', 'From concept to launch, Anajak Software delivered a stunning game that not only met but exceeded our expectations. They truly understand creativity and technology.', 'upload/testimonials/1840160537364758.png', '2025-08-11 05:04:02', '2025-08-11 21:44:04'),
(12, 'Glenna Calderon', 'Harum similique veli', 'Suscipit sit archite', 'upload/testimonials/1840220469840845.png', '2025-08-11 20:56:38', '2025-08-11 20:56:38'),
(13, 'Luke Finch', 'Id id provident au', '© 2025 | SoftwareFactory. All Rights Reserved. © 2025 | SoftwareFactory. All Rights Reserved. © 2025 | SoftwareFactory. All Rights Reserved.', 'upload/testimonials/1840221550315480.png', '2025-08-11 21:13:49', '2025-08-11 21:14:35'),
(14, 'Toch Sothak', 'Founder of SmartExpand Tracker App', 'Anajak Software transformed our idea into a sleek, user-friendly mobile app. Their attention to detail and technical expertise made the entire process seamless.', 'upload/testimonials/1840222825521408.jpeg', '2025-08-11 21:34:05', '2025-08-11 21:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `timeline_events`
--

CREATE TABLE `timeline_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeline_events`
--

INSERT INTO `timeline_events` (`id`, `year`, `event`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, '2020', 'The Beginning', 'We started as a small but passionate team with a simple mission: to use technology to solve real problems for businesses and communities.', 1, '2025-08-14 07:13:14', '2025-08-15 02:10:48'),
(2, '2021', 'Building Trust', 'Delivered our first major projects and formed long-term partnerships with clients who believed in our vision and dedication.', 2, '2025-08-14 07:13:46', '2025-08-15 02:10:48'),
(3, '2022', 'Growing Stronger', 'Expanded our team with talented developers, designers, and strategists, allowing us to serve more industries with diverse solutions.', 3, '2025-08-14 21:04:12', '2025-08-15 02:10:48'),
(4, '2023', 'Innovation in Action', 'Launched innovative software products that helped clients streamline operations, save time, and boost productivity.', 4, '2025-08-14 21:04:12', '2025-08-15 02:10:48'),
(5, '2024', 'A Trusted Partner', 'Recognized for our 99% client satisfaction rate, we became a go-to technology partner for companies seeking dependable, future-ready solutions.', 5, '2025-08-15 02:10:48', '2025-08-15 02:10:48'),
(6, 'Present', 'Present & Beyond', 'Continuing our journey with a focus on innovation, customer success, and creating software that truly makes a difference.', 6, '2025-08-15 02:10:48', '2025-08-15 02:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `top_navbars`
--

CREATE TABLE `top_navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `facebook_status` tinyint(1) NOT NULL DEFAULT 0,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `linkedin_status` tinyint(1) NOT NULL DEFAULT 0,
  `twitter_url` varchar(255) DEFAULT NULL,
  `twitter_status` tinyint(1) NOT NULL DEFAULT 0,
  `instagram_url` varchar(255) DEFAULT NULL,
  `instagram_status` tinyint(1) NOT NULL DEFAULT 0,
  `youtube_url` varchar(255) DEFAULT NULL,
  `youtube_status` tinyint(1) NOT NULL DEFAULT 0,
  `telegram_url` varchar(255) DEFAULT NULL,
  `telegram_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_navbars`
--

INSERT INTO `top_navbars` (`id`, `address`, `email`, `facebook_url`, `facebook_status`, `linkedin_url`, `linkedin_status`, `twitter_url`, `twitter_status`, `instagram_url`, `instagram_status`, `youtube_url`, `youtube_status`, `telegram_url`, `telegram_status`, `created_at`, `updated_at`) VALUES
(1, 'St 2011, Phnom Penh , Cambodia ,', 'titicode1010@gmail.com', 'https://www.facebook.com/poipetinsider/', 1, 'https://www.youtube.com/@PoipetInsider', 0, 'https://www.youtube.com/@PoipetInsider', 0, 'https://www.youtube.com/@PoipetInsider', 0, 'https://www.youtube.com/@PoipetInsider', 1, 'https://www.youtube.com/@PoipetInsider', 1, '2025-08-07 22:55:00', '2025-08-08 03:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Super Me', 'titicode1010@gmail.com', NULL, '$2y$12$PnV3wfvuCXQBXJr2m.5k9.fFN0lPs3F5OwwruOWh1PhNjQHxBP.mK', NULL, '2025-08-04 22:28:14', '2025-08-11 01:36:43', '1754468202.png'),
(2, 'Rorn Bunthong | CEO', 'bunthongran579@gmail.com', NULL, '$2y$12$lzqviFJyO7VNZkEwbZRPDuDsJDucc5oCRQXIJj01mzYBdF.haFPL.', NULL, '2025-08-22 02:45:12', '2025-08-22 02:47:24', '1755856044.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_pages`
--
ALTER TABLE `about_us_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_links`
--
ALTER TABLE `contact_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_pages`
--
ALTER TABLE `contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_sections`
--
ALTER TABLE `homepage_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `homepage_sections_component_key_unique` (`component_key`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_settings`
--
ALTER TABLE `menu_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline_events`
--
ALTER TABLE `timeline_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_navbars`
--
ALTER TABLE `top_navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_pages`
--
ALTER TABLE `about_us_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `case_studies`
--
ALTER TABLE `case_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_links`
--
ALTER TABLE `contact_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_pages`
--
ALTER TABLE `contact_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_sections`
--
ALTER TABLE `homepage_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_settings`
--
ALTER TABLE `menu_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timeline_events`
--
ALTER TABLE `timeline_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top_navbars`
--
ALTER TABLE `top_navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
