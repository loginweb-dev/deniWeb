-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2020 at 02:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `deni`
--

-- --------------------------------------------------------

--
-- Table structure for table `busines`
--

CREATE TABLE `busines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `description_long` longtext COLLATE utf8mb4_unicode_ci,
  `description_app` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `range_id` int(11) DEFAULT NULL,
  `busine_relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sharemap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bussine_ranges`
--

CREATE TABLE `bussine_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bussine_ranges`
--

INSERT INTO `bussine_ranges` (`id`, `value`, `label`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'dark', NULL, 'Suscripción normal', '2019-12-10 21:03:21', '2019-12-10 21:03:21', NULL),
(2, 2, 'info', NULL, 'Suscripción profesional', '2019-12-10 21:03:47', '2019-12-10 21:03:47', NULL),
(3, 3, 'success', NULL, 'Suscripción premiun', '2019-12-10 21:04:30', '2019-12-10 21:04:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `image`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Turismo Rural', '', 'fas fa-globe-americas dark-grey-text mr-3', '2019-10-20 05:36:35', '2019-10-24 07:25:26', NULL),
(2, 'Turismo Urbano', '', 'fas fa-car-side dark-grey-text mr-3', '2019-10-20 05:36:56', '2019-10-25 08:18:43', NULL),
(3, 'Lugares Publicos', '', 'fas fa-archway dark-grey-text mr-3', '2019-10-20 05:37:11', '2019-10-25 08:19:48', NULL),
(4, 'Farmacias', '', 'fas fa-briefcase-medical dark-grey-text mr-3', '2019-10-20 05:37:20', '2019-10-25 08:20:30', NULL),
(5, 'Salud', '', 'fas fa-clinic-medical dark-grey-text mr-3', '2019-10-20 05:37:29', '2019-10-30 03:36:04', '2019-10-30 03:36:04'),
(6, 'Educacion', '', 'fas fa-city dark-grey-text mr-3', '2019-10-20 05:37:38', '2019-10-25 08:23:14', NULL),
(7, 'Restaurantes', '', 'fas fa-hamburger dark-grey-text mr-3', '2019-10-20 05:38:08', '2019-10-25 08:24:40', NULL),
(8, 'Hoteles', '', '', '2019-10-20 05:38:23', '2019-10-20 05:38:23', NULL),
(9, 'Transporte', '', '', '2019-10-20 05:38:37', '2019-10-20 05:38:37', NULL),
(10, 'Religion', '', '', '2019-10-20 05:38:49', '2019-10-20 05:38:49', NULL),
(11, 'Casas Comerciales', '', '', '2019-10-20 05:39:00', '2019-10-20 05:39:15', NULL),
(12, 'Super & shoping', '', '', '2019-10-20 05:39:42', '2019-10-20 05:39:42', NULL),
(13, 'Boutique & Zapatos', '', 'fas fa-shoe-prints dark-grey-text mr-3', '2019-10-20 05:40:01', '2019-10-24 07:22:38', NULL),
(14, 'Belleza & Peliqueria', '', 'fas fa-cut dark-grey-text mr-3', '2019-10-20 05:40:33', '2019-10-24 07:21:25', NULL),
(15, 'Tecnologias', '', 'fas fa-tv dark-grey-text mr-3', '2019-10-20 05:43:20', '2019-10-24 07:15:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(2, NULL, 1, 'Category 2', 'category-2', '2019-10-25 04:33:22', '2019-10-25 04:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 1, 1, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Nombre', 1, 1, 1, 1, 1, 0, '{}', 2),
(3, 1, 'email', 'text', 'Correo Electrónico', 1, 1, 1, 1, 1, 0, '{}', 3),
(4, 1, 'password', 'password', 'Constraseña', 1, 0, 1, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Token de Recuerdo', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Creado', 0, 0, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Actualizado', 0, 1, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 0, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Rol', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Nombre', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Creado', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Actualizado', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 1, 1, 0, 0, 0, '{}', 1),
(17, 3, 'name', 'text', 'Nombre', 1, 1, 1, 1, 1, 0, '{}', 2),
(18, 3, 'created_at', 'timestamp', 'Creado', 0, 0, 1, 0, 0, 0, '{}', 3),
(19, 3, 'updated_at', 'timestamp', 'Actualizado', 0, 1, 1, 0, 0, 0, '{}', 4),
(20, 3, 'display_name', 'text', 'Nombre a Mostrar', 1, 1, 1, 1, 1, 0, '{}', 5),
(21, 1, 'role_id', 'text', 'Rol', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Padre', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Orden', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Nombre', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Creado', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Actualizado', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Autor', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Categoría', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Título', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Extracto', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Cuerpo', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Imagen del Post', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Descripción', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Palabras Clave', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Estatus', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Creado', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Actualizado', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'Título SEO', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Destacado', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Autor', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Título', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Extracto', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Cuerpo', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Descripción', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Palabras Clave', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Estatus', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Creado', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Actualizado', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Imagen de la página', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(57, 7, 'name', 'text', 'Nombre Comercial', 1, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 5),
(58, 7, 'image', 'image', 'Image Default', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 11),
(60, 7, 'addres', 'text_area', 'Direccion del Negocio', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 10),
(61, 7, 'longitude', 'text', 'Longitude', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 28),
(62, 7, 'latitude', 'text', 'Latitude', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 27),
(63, 7, 'description', 'text_area', 'Descripcion Corta del Negocio', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 9),
(64, 7, 'site', 'text', 'Sitio Web del Negocio', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 7),
(65, 7, 'categoria_id', 'text', 'Categoria Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(66, 7, 'description_long', 'rich_text_box', 'Description Long', 0, 0, 1, 1, 1, 0, '{}', 16),
(67, 7, 'user_id', 'text', 'User Id', 1, 0, 1, 1, 1, 1, '{}', 3),
(68, 7, 'slug', 'text', 'Slug', 1, 0, 1, 0, 0, 0, '{}', 19),
(69, 7, 'images', 'multiple_images', 'Images (3-5)', 0, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 12),
(70, 7, 'busine_relation', 'select_multiple', 'Busine Relation', 0, 0, 1, 1, 1, 0, '{\"options\":{\"2\":\"uabjb\",\"3\":\"La salle\",\"4\":\"terminal Jose ballivian\",\"5\":\"hotel jacaranda\",\"6\":\"LoginWeb\"}}', 20),
(71, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 22),
(72, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 23),
(73, 8, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(74, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 0, '{}', 2),
(75, 8, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{}', 3),
(77, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 5),
(78, 8, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 0, 0, 0, '{}', 6),
(79, 7, 'busine_belongsto_categoria_relationship', 'relationship', 'Elija una Categorias', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Categoria\",\"table\":\"categorias\",\"type\":\"belongsTo\",\"column\":\"categoria_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(80, 7, 'busine_belongsto_user_relationship', 'relationship', 'users', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 24),
(90, 7, 'busine_hasmany_horario_relationship', 'relationship', 'Horario del Negocio', 0, 0, 1, 1, 1, 0, '{\"model\":\"App\\\\Horario\",\"table\":\"horarios\",\"type\":\"hasMany\",\"column\":\"busine_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(91, 10, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(92, 10, 'link', 'text', 'Link', 1, 1, 1, 1, 1, 0, '{}', 3),
(93, 10, 'busine_id', 'text', 'Busine Id', 1, 1, 1, 1, 1, 1, '{}', 4),
(94, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 5),
(95, 10, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 0, 0, 0, '{}', 6),
(96, 10, 'social_network_belongsto_busine_relationship', 'relationship', 'Negocio o Comercio', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Busine\",\"table\":\"busines\",\"type\":\"belongsTo\",\"column\":\"busine_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(97, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(98, 11, 'puntuacion', 'text', 'Puntuacion', 1, 1, 1, 1, 1, 1, '{}', 4),
(99, 11, 'busine_id', 'text', 'Busine Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(100, 11, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(101, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(102, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(103, 11, 'start_belongsto_busine_relationship', 'relationship', 'busines', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Busine\",\"table\":\"busines\",\"type\":\"belongsTo\",\"column\":\"busine_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(104, 11, 'start_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(105, 8, 'icon', 'text', 'Icon', 1, 1, 1, 1, 1, 0, '{}', 4),
(106, 8, 'deleted_at', 'timestamp', 'Deleted At', 0, 1, 1, 1, 1, 0, '{}', 7),
(115, 13, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(116, 13, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 0, '{}', 3),
(117, 13, 'dias', 'select_multiple', 'Dias', 0, 1, 1, 1, 1, 0, '{\"options\":{\"1\":\"Lunes\",\"2\":\"Martes\",\"3\":\"Miercoles\",\"4\":\"Jueves\",\"5\":\"Viernes\",\"6\":\"Sabado\",\"7\":\"Domingo\"}}', 4),
(118, 13, 'hora_inicio', 'time', 'Hora Inicio', 0, 1, 1, 1, 1, 0, '{}', 5),
(119, 13, 'hora_final', 'time', 'Hora Final', 0, 1, 1, 1, 1, 0, '{}', 6),
(120, 13, 'busine_id', 'text', 'Busine Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(121, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7),
(122, 13, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 0, 0, 0, '{}', 8),
(123, 13, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 0, 0, 0, '{}', 9),
(124, 13, 'horario_belongsto_busine_relationship', 'relationship', 'busines', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Busine\",\"table\":\"busines\",\"type\":\"belongsTo\",\"column\":\"busine_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(126, 7, 'busine_hasmany_social_network_relationship', 'relationship', 'Redes Sociales', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\SocialNetwork\",\"table\":\"social_networks\",\"type\":\"hasMany\",\"column\":\"busine_id\",\"key\":\"id\",\"label\":\"link\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(127, 7, 'sharemap', 'text', 'Ruta hacia el Negocio', 1, 0, 1, 1, 1, 0, '{\"display\":{\"width\":\"6\"}}', 8),
(128, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 0, '{}', 6),
(129, 10, 'redes', 'select_dropdown', 'Redes', 0, 0, 0, 0, 0, 0, '{\"options\":{\"1\":\"Facebook\",\"2\":\"Twitter\",\"3\":\"Youtube\",\"4\":\"Instagram\"}}', 4),
(130, 10, 'icon', 'select_dropdown', 'Red social', 1, 1, 1, 1, 1, 1, '{\"options\":{\"fab fa-facebook-square fa-lg mr-3\":\"facebook\",\"fab fa-twitter  fa-lg mr-3\":\"twitter\",\"fab fa-youtube fa-fw red-text fa-lg mr-3\":\"youtube\",\"fab fa-instagram fa-fw pink-text fa-lg mr-3\":\"instagram\"}}', 5),
(131, 7, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 18),
(132, 7, 'views', 'text', 'Views', 0, 1, 1, 0, 0, 0, '{}', 21),
(133, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(134, 14, 'value', 'number', 'Value', 0, 1, 1, 1, 1, 1, '{}', 2),
(135, 14, 'label', 'select_dropdown', 'Label', 0, 1, 1, 1, 1, 1, '{\"options\":{\"success\":\"Verde\",\"info\":\"Celeste\",\"primary\":\"Azul\",\"warning\":\"Amarilla\",\"danger\":\"Roja\",\"dark\":\"Oscura\"}}', 3),
(136, 14, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(137, 14, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(138, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(139, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(140, 14, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 8),
(141, 7, 'range_id', 'text', 'Range Id', 0, 1, 1, 1, 1, 1, '{}', 14),
(142, 7, 'busine_belongsto_bussine_range_relationship', 'relationship', 'range', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BussineRange\",\"table\":\"bussine_ranges\",\"type\":\"belongsTo\",\"column\":\"range_id\",\"key\":\"id\",\"label\":\"value\",\"pivot_table\":\"busines\",\"pivot\":\"0\",\"taggable\":\"0\"}', 25),
(143, 7, 'state', 'checkbox', 'State', 0, 1, 1, 1, 1, 1, '{\"on\":\"Activo\",\"off\":\"Incativo\",\"checked\":\"true\"}', 26),
(144, 7, 'phone', 'number', 'Phone', 0, 1, 1, 1, 1, 1, '{\"display\":{\"width\":\"6\"}}', 6),
(145, 7, 'description_app', 'rich_text_box', 'Description App', 0, 0, 0, 1, 1, 1, '{}', 17),
(146, 1, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 5),
(147, 1, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 6),
(148, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(149, 16, 'key', 'text', 'Key', 1, 1, 1, 1, 1, 1, '{}', 2),
(150, 16, 'table_name', 'text', 'Table Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(151, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 4),
(152, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'Usuario', 'Usuarios', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 1, '{\"order_column\":\"updated_at\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2019-10-25 04:33:22', '2020-01-20 21:40:39'),
(2, 'menus', 'menus', 'Menú', 'Menús', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(3, 'roles', 'roles', 'Rol', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"updated_at\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2019-10-25 04:33:22', '2019-10-27 04:18:43'),
(4, 'categories', 'categories', 'Categoría', 'Categorías', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-10-25 04:33:22', '2019-10-29 04:08:29'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(6, 'pages', 'pages', 'Página', 'Páginas', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(7, 'busines', 'busines', 'Negocios', 'Neogicio', 'voyager-shop', 'App\\Busine', NULL, NULL, 'Formulario par crear & editar Negocio o Comercios', 1, 1, '{\"order_column\":\"updated_at\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2019-10-25 04:44:42', '2020-01-23 23:56:48'),
(8, 'categorias', 'categorias', 'Categoria', 'Categorias', 'voyager-list', 'App\\Categoria', NULL, NULL, 'Formulario para gestionar los categorias', 1, 1, '{\"order_column\":\"updated_at\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2019-10-25 05:20:24', '2019-10-30 03:21:17'),
(10, 'social_networks', 'social-networks', 'Red Social', 'Redes Sociales', 'voyager-facebook', 'App\\SocialNetwork', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"updated_at\",\"order_display_column\":\"link\",\"order_direction\":\"desc\",\"default_search_key\":\"link\",\"scope\":null}', '2019-10-25 16:30:19', '2020-01-23 19:12:21'),
(11, 'starts', 'starts', 'Start', 'Starts', NULL, 'App\\Start', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-10-25 16:31:13', '2019-10-25 16:32:05'),
(13, 'horarios', 'horarios', 'Horario', 'Horarios', 'voyager-watch', 'App\\Horario', NULL, NULL, 'Formulario para  gestionar los horarios', 1, 1, '{\"order_column\":\"created_at\",\"order_display_column\":\"title\",\"order_direction\":\"desc\",\"default_search_key\":\"title\",\"scope\":null}', '2019-10-25 21:20:44', '2019-10-29 04:12:16'),
(14, 'bussine_ranges', 'bussine-ranges', 'Bussine Range', 'Bussine Ranges', 'voyager-certificate', 'App\\BussineRange', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-12-10 20:53:58', '2019-12-10 21:04:57'),
(16, 'permissions', 'permissions', 'Permission', 'Permissions', 'voyager-certificate', 'App\\Permission', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-01-24 01:36:43', '2020-01-24 01:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` time DEFAULT '00:00:04',
  `hora_final` time DEFAULT '23:59:04',
  `busine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `busine_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-10-25 04:33:22', '2019-10-25 04:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Panel', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2019-10-25 04:33:22', '2019-10-27 03:42:42', 'voyager.dashboard', 'null'),
(2, 1, 'Multimedia', '', '_self', 'voyager-images', NULL, 5, 3, '2019-10-25 04:33:22', '2019-10-28 18:47:05', 'voyager.media.index', NULL),
(3, 1, 'Usuarios', '', '_self', 'voyager-person', NULL, 22, 1, '2019-10-25 04:33:22', '2019-10-27 03:42:55', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 22, 2, '2019-10-25 04:33:22', '2019-10-27 03:42:55', 'voyager.roles.index', NULL),
(5, 1, 'Herramientas', '', '_self', 'voyager-tools', NULL, NULL, 5, '2019-10-25 04:33:22', '2019-12-10 20:55:21', NULL, NULL),
(6, 1, 'Menús', '', '_self', 'voyager-list', '#000000', 5, 4, '2019-10-25 04:33:22', '2020-01-24 01:38:07', 'voyager.menus.index', 'null'),
(7, 1, 'Base de Datos', '', '_self', 'voyager-data', NULL, 5, 2, '2019-10-25 04:33:22', '2019-10-28 18:47:05', 'voyager.database.index', NULL),
(8, 1, 'Compás', '', '_self', 'voyager-compass', NULL, 5, 5, '2019-10-25 04:33:22', '2020-01-24 01:38:07', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 1, '2019-10-25 04:33:22', '2019-10-28 18:46:56', 'voyager.bread.index', NULL),
(10, 1, 'Parámetros', '', '_self', 'voyager-settings', NULL, NULL, 2, '2019-10-25 04:33:22', '2019-10-27 03:59:23', 'voyager.settings.index', NULL),
(11, 1, 'Categorías', '', '_self', 'voyager-categories', NULL, 5, 6, '2019-10-25 04:33:22', '2020-01-24 01:38:07', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, 5, 7, '2019-10-25 04:33:22', '2020-01-24 01:38:07', 'voyager.posts.index', NULL),
(13, 1, 'Páginas', '', '_self', 'voyager-file-text', NULL, 5, 8, '2019-10-25 04:33:23', '2020-01-24 01:38:07', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 9, '2019-10-25 04:33:23', '2020-01-24 01:38:07', 'voyager.hooks', NULL),
(15, 1, 'Bussines', '', '_self', 'voyager-double-right', '#000000', 23, 1, '2019-10-25 04:44:42', '2019-10-28 18:45:09', 'voyager.busines.index', 'null'),
(16, 1, 'Categorias', '', '_self', 'voyager-double-right', '#000000', 23, 2, '2019-10-25 05:20:24', '2019-10-28 18:45:21', 'voyager.categorias.index', 'null'),
(18, 1, 'Social Networks', '', '_self', 'voyager-double-right', '#000000', 23, 4, '2019-10-25 16:30:19', '2019-12-10 20:55:20', 'voyager.social-networks.index', 'null'),
(19, 1, 'Puntuaciones', '', '_self', 'voyager-double-right', '#000000', 23, 6, '2019-10-25 16:31:13', '2019-12-10 20:55:21', 'voyager.starts.index', 'null'),
(21, 1, 'Horarios', '', '_self', 'voyager-double-right', '#000000', 23, 5, '2019-10-25 21:20:44', '2019-12-10 20:55:21', 'voyager.horarios.index', 'null'),
(22, 1, 'User & Roles', '', '_self', 'voyager-group', '#000000', NULL, 4, '2019-10-27 03:42:24', '2019-12-10 20:55:21', NULL, ''),
(23, 1, 'M. Bussines', '', '_self', 'voyager-shop', '#000000', NULL, 3, '2019-10-27 03:44:36', '2019-10-27 03:59:36', NULL, ''),
(24, 1, 'Bussine Ranges', '', '_self', 'voyager-double-right', '#000000', 23, 3, '2019-12-10 20:53:58', '2019-12-10 20:57:27', 'voyager.bussine-ranges.index', 'null'),
(25, 1, 'Mi negocio', '', '_self', 'voyager-shop', '#000000', NULL, 6, '2020-01-20 19:56:50', '2020-01-20 20:01:19', 'negocios_index', 'null'),
(26, 1, 'Permissions', '', '_self', 'voyager-certificate', '#000000', 22, 3, '2020-01-24 01:36:44', '2020-01-24 01:38:07', 'voyager.permissions.index', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2018_08_08_100000_create_telescope_entries_table', 1),
(28, '2019_10_24_210103_create_categorias_table', 1),
(29, '2019_10_24_213800_create_busines_table', 1),
(30, '2019_10_24_220336_create_horaios_table', 1),
(31, '2019_10_24_221000_create_social_networks_table', 1),
(32, '2019_10_24_221149_create_social_starts_table', 1),
(33, '2018_06_30_113500_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2019-10-25 04:33:23', '2019-10-25 04:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('r.e.t.c.bolivia@gmail.com', '$2y$10$dSjD.ki.AiX7nDZsXFROjeWbgCC03GztwtVd6Ap../hrCWntDGv4m', '2019-10-28 23:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(2, 'browse_bread', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(3, 'browse_database', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(4, 'browse_media', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(5, 'browse_compass', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(6, 'browse_menus', 'menus', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(7, 'read_menus', 'menus', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(8, 'edit_menus', 'menus', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(9, 'add_menus', 'menus', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(10, 'delete_menus', 'menus', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(11, 'browse_roles', 'roles', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(12, 'read_roles', 'roles', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(13, 'edit_roles', 'roles', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(14, 'add_roles', 'roles', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(15, 'delete_roles', 'roles', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(16, 'browse_users', 'users', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(17, 'read_users', 'users', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(18, 'edit_users', 'users', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(19, 'add_users', 'users', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(20, 'delete_users', 'users', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(21, 'browse_settings', 'settings', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(22, 'read_settings', 'settings', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(23, 'edit_settings', 'settings', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(24, 'add_settings', 'settings', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(25, 'delete_settings', 'settings', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(26, 'browse_categories', 'categories', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(27, 'read_categories', 'categories', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(28, 'edit_categories', 'categories', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(29, 'add_categories', 'categories', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(30, 'delete_categories', 'categories', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(31, 'browse_posts', 'posts', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(32, 'read_posts', 'posts', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(33, 'edit_posts', 'posts', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(34, 'add_posts', 'posts', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(35, 'delete_posts', 'posts', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(36, 'browse_pages', 'pages', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(37, 'read_pages', 'pages', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(38, 'edit_pages', 'pages', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(39, 'add_pages', 'pages', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(40, 'delete_pages', 'pages', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(41, 'browse_hooks', NULL, '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(42, 'browse_busines', 'busines', '2019-10-25 04:44:42', '2019-10-25 04:44:42'),
(43, 'read_busines', 'busines', '2019-10-25 04:44:42', '2019-10-25 04:44:42'),
(44, 'edit_busines', 'busines', '2019-10-25 04:44:42', '2019-10-25 04:44:42'),
(45, 'add_busines', 'busines', '2019-10-25 04:44:42', '2019-10-25 04:44:42'),
(46, 'delete_busines', 'busines', '2019-10-25 04:44:42', '2019-10-25 04:44:42'),
(47, 'browse_categorias', 'categorias', '2019-10-25 05:20:24', '2019-10-25 05:20:24'),
(48, 'read_categorias', 'categorias', '2019-10-25 05:20:24', '2019-10-25 05:20:24'),
(49, 'edit_categorias', 'categorias', '2019-10-25 05:20:24', '2019-10-25 05:20:24'),
(50, 'add_categorias', 'categorias', '2019-10-25 05:20:24', '2019-10-25 05:20:24'),
(51, 'delete_categorias', 'categorias', '2019-10-25 05:20:24', '2019-10-25 05:20:24'),
(57, 'browse_social_networks', 'social_networks', '2019-10-25 16:30:19', '2019-10-25 16:30:19'),
(58, 'read_social_networks', 'social_networks', '2019-10-25 16:30:19', '2019-10-25 16:30:19'),
(59, 'edit_social_networks', 'social_networks', '2019-10-25 16:30:19', '2019-10-25 16:30:19'),
(60, 'add_social_networks', 'social_networks', '2019-10-25 16:30:19', '2019-10-25 16:30:19'),
(61, 'delete_social_networks', 'social_networks', '2019-10-25 16:30:19', '2019-10-25 16:30:19'),
(62, 'browse_starts', 'starts', '2019-10-25 16:31:13', '2019-10-25 16:31:13'),
(63, 'read_starts', 'starts', '2019-10-25 16:31:13', '2019-10-25 16:31:13'),
(64, 'edit_starts', 'starts', '2019-10-25 16:31:13', '2019-10-25 16:31:13'),
(65, 'add_starts', 'starts', '2019-10-25 16:31:13', '2019-10-25 16:31:13'),
(66, 'delete_starts', 'starts', '2019-10-25 16:31:13', '2019-10-25 16:31:13'),
(72, 'browse_horarios', 'horarios', '2019-10-25 21:20:44', '2019-10-25 21:20:44'),
(73, 'read_horarios', 'horarios', '2019-10-25 21:20:44', '2019-10-25 21:20:44'),
(74, 'edit_horarios', 'horarios', '2019-10-25 21:20:44', '2019-10-25 21:20:44'),
(75, 'add_horarios', 'horarios', '2019-10-25 21:20:44', '2019-10-25 21:20:44'),
(76, 'delete_horarios', 'horarios', '2019-10-25 21:20:44', '2019-10-25 21:20:44'),
(77, 'browse_bussine_ranges', 'bussine_ranges', '2019-12-10 20:53:58', '2019-12-10 20:53:58'),
(78, 'read_bussine_ranges', 'bussine_ranges', '2019-12-10 20:53:58', '2019-12-10 20:53:58'),
(79, 'edit_bussine_ranges', 'bussine_ranges', '2019-12-10 20:53:58', '2019-12-10 20:53:58'),
(80, 'add_bussine_ranges', 'bussine_ranges', '2019-12-10 20:53:58', '2019-12-10 20:53:58'),
(81, 'delete_bussine_ranges', 'bussine_ranges', '2019-12-10 20:53:58', '2019-12-10 20:53:58'),
(82, 'browse_permissions', 'permissions', '2020-01-24 01:36:44', '2020-01-24 01:36:44'),
(83, 'read_permissions', 'permissions', '2020-01-24 01:36:44', '2020-01-24 01:36:44'),
(84, 'edit_permissions', 'permissions', '2020-01-24 01:36:44', '2020-01-24 01:36:44'),
(85, 'add_permissions', 'permissions', '2020-01-24 01:36:44', '2020-01-24 01:36:44'),
(86, 'delete_permissions', 'permissions', '2020-01-24 01:36:44', '2020-01-24 01:36:44'),
(87, 'browse_negocios', 'negocios', '2020-01-24 01:39:30', '2020-01-24 01:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3),
(66, 1),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(87, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-10-25 04:33:22', '2019-10-25 04:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(2, 'user', 'Usuario Normal', '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(3, 'Editor', 'Editor de Bussines', '2019-10-27 04:20:26', '2019-10-27 04:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Título del sitio', 'DENI', '', 'text', 1, 'Site'),
(2, 'site.description', 'Descripción del sitio', 'DIRECTORIOS PARA EMPRESA Y NEGOCIOS EN INTERNET', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Logo del sitio', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'ID de rastreo de Google Analytics', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Imagen de fondo del administrador', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Título del administrador', 'Deni', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Descripción del administrador', 'Bienvenido a Voyager. El administrador que le faltaba a Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Imagen de carga del administrador', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Ícono del administrador', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'ID de Cliente para Google Analytics (usado para el tablero de administrador)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.banner', 'banner', 'settings\\October2019\\EWkPbz4eWe5m1MJAdUOL.png', NULL, 'image', 6, 'Site'),
(12, 'image-carousel.banner_1', 'banner 1', '', NULL, 'image', 7, 'Image_carousel'),
(13, 'image-carousel.banner_2', 'banner 2', '', NULL, 'image', 8, 'Image_carousel'),
(14, 'image-carousel.banner_3', 'banner 3', '', NULL, 'image', 9, 'Image_carousel'),
(15, 'site.paginador_lp', 'Paginador de LandingPage', '12', NULL, 'text', 10, 'Site'),
(16, 'aboutus.direccion', 'Dirección', 'Av. David Shriqui Urbanización Santa Inés', NULL, 'text_area', 11, 'AboutUs'),
(17, 'aboutus.telefono', 'Teléfono', '+591 71130523', NULL, 'text', 12, 'AboutUs'),
(18, 'aboutus.email', 'E-mail', 'empresa.loginweb@gmail.com', NULL, 'text', 13, 'AboutUs'),
(20, 'social.link_facebook', 'Facebook', NULL, NULL, 'text', 14, 'Social'),
(22, 'social.link_instagram', 'Instagram', NULL, NULL, 'text', 15, 'Social'),
(23, 'social.link_twitter', 'Twitter', NULL, NULL, 'text', 16, 'Social'),
(24, 'social.link_linkedIn', 'LinkedIn', NULL, NULL, 'text', 17, 'Social'),
(25, 'aboutus.name', 'Nombre', 'LoginWeb', NULL, 'text', 10, 'AboutUs'),
(26, 'aboutus.description', 'Descripción', 'Somos una empresa de tecnología especializada en desarrollo de Software y Hardware.', NULL, 'text', 10, 'AboutUs'),
(27, 'social.link_github', 'GitHub', NULL, NULL, 'text', 18, 'Social');

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `starts`
--

CREATE TABLE `starts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `busine_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-10-25 04:33:23', '2019-10-25 04:33:23'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-10-25 04:33:23', '2019-10-25 04:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, NULL, 'users/default.png', NULL, '$2y$10$AqAZWeSmoJz5shYLqdA6luXMM.CiHmUH1OPqDdmrh1WnWq/Ys0hTW', 's6DK9So5R4jI84vSMXSiCF8Z8bKY1p5LteayJdCcAcUkydQdr06aWQcYzd7H', NULL, '2019-10-25 04:33:22', '2019-10-25 04:33:22'),
(2, 3, 'percy alvarez', 'percy.alvarez.2017@gmail.com', NULL, NULL, 'users/default.png', NULL, '$2y$10$7WwPHdodDEqPEz2kiaSxBeFxKTw4t5I9FARUK0TSeq/t7kaBcJgKO', NULL, '{\"locale\":\"es\"}', '2019-10-27 03:05:49', '2019-10-27 04:21:34'),
(3, 3, 'paul', 'paulbrayan2011@gmail.com', NULL, NULL, 'users/default.png', NULL, '$2y$10$AqAZWeSmoJz5shYLqdA6luXMM.CiHmUH1OPqDdmrh1WnWq/Ys0hTW', NULL, '{\"locale\":\"es\"}', '2019-10-27 03:25:01', '2019-10-27 04:28:24'),
(4, 3, 'richard eddy', 'r.e.t.c.bolivia@gmail.com', NULL, NULL, 'users/default.png', NULL, '$2y$10$KiBHIhJIbMIY097KUltYfOH4QtaJ85l1m/Du4ytXbYiBUrrv.wibO', NULL, '{\"locale\":\"es\"}', '2019-10-27 03:27:50', '2019-10-29 00:26:29'),
(9, 2, 'Empresa Loginweb', '126369682179959@deni.com', '78786756', 'calle 1', 'http://graph.facebook.com/126369682179959/picture?type=large', NULL, '$2y$10$2J/TZ6r0hbE5uzBfv7eLDOYmbZkrLpgEc4OFhZ0Z7N4lfyySl667S', NULL, NULL, '2020-01-08 02:54:16', '2020-01-10 02:51:54'),
(10, 2, 'Agustin Mejia', '172278994011973@deni.com', NULL, NULL, 'http://graph.facebook.com/172278994011973/picture?type=large', NULL, '$2y$10$yqiLpj/XAMQdXn3DgwIkwON80kuWYZKdsqgrzT93cOaW.jM2fxg/2', NULL, NULL, '2020-01-15 06:12:49', '2020-01-15 06:12:49'),
(11, 2, 'Rodrigo Raul Montero Acosta', '2809897112407593@deni.com', '76880951', 'Zona pantanal', 'http://graph.facebook.com/2809897112407593/picture?type=large', NULL, '$2y$10$ENGg1cjt7mR.n4XKp7fLCe.yarPTLrA0YGPgJc5J7PakBxAJHN2n.', NULL, NULL, '2020-01-16 01:59:31', '2020-01-16 02:05:55'),
(12, 2, 'Miguel Angel Perez', 'miguelangel@gmail.com', NULL, NULL, 'users/default.png', NULL, '$2y$10$RPs8CSofMDLZSLmLPfEVC.5E2JmiAayAL7JzTadEkCqisAXN5.d56', NULL, NULL, '2020-01-18 01:52:37', '2020-01-18 01:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peak_connection_count` int(11) DEFAULT NULL,
  `websocket_message_count` int(11) DEFAULT NULL,
  `api_message_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busines`
--
ALTER TABLE `busines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busines_categoria_id_foreign` (`categoria_id`),
  ADD KEY `busines_user_id_foreign` (`user_id`);

--
-- Indexes for table `bussine_ranges`
--
ALTER TABLE `bussine_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_busine_id_foreign` (`busine_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_networks_busine_id_foreign` (`busine_id`);

--
-- Indexes for table `starts`
--
ALTER TABLE `starts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `starts_user_id_foreign` (`user_id`),
  ADD KEY `starts_busine_id_foreign` (`busine_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busines`
--
ALTER TABLE `busines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bussine_ranges`
--
ALTER TABLE `bussine_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `starts`
--
ALTER TABLE `starts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `busines`
--
ALTER TABLE `busines`
  ADD CONSTRAINT `busines_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `busines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_busine_id_foreign` FOREIGN KEY (`busine_id`) REFERENCES `busines` (`id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD CONSTRAINT `social_networks_busine_id_foreign` FOREIGN KEY (`busine_id`) REFERENCES `busines` (`id`);

--
-- Constraints for table `starts`
--
ALTER TABLE `starts`
  ADD CONSTRAINT `starts_busine_id_foreign` FOREIGN KEY (`busine_id`) REFERENCES `busines` (`id`),
  ADD CONSTRAINT `starts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
