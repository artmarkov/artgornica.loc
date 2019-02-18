-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 19 2019 г., 00:29
-- Версия сервера: 5.7.23
-- Версия PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `artgornica_loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', 1, 1545848548),
('author', 1, 1545848548),
('author', 2, 1545848518),
('moderator', 1, 1545848548),
('moderator', 2, 1545848518),
('user', 1, 1545848548),
('user', 2, 1545848518);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `group_code`, `data`, `created_at`, `updated_at`) VALUES
('/admin', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/#mediafile', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/bulk-activate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/bulk-deactivate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/bulk-spam', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/bulk-trash', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/comment/default/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/eav/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/bulk-delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/create', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/grid-page-size', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/grid-sort', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/index', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-option/update', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/bulk-delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/create', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/grid-page-size', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/grid-sort', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/index', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute-type/update', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/bulk-delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/create', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/grid-page-size', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/grid-sort', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/index', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/attribute/update', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/default/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/default/get-attributes', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/default/get-categories', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/default/index', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/default/set-attributes', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/*', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/bulk-delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/create', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/delete', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/grid-page-size', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/grid-sort', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/index', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/eav/entity-model/update', 3, NULL, NULL, NULL, NULL, 1440180000, 1440180000),
('/admin/media/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/album/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/category/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/default/settings', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/info', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/resize', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/upload', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/media/manage/uploader', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/default/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/menu/link/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/bulk-activate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/bulk-deactivate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/page/default/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/category/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/bulk-activate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/bulk-deactivate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/default/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/post/tag/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/settings/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/settings/cache/flush', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/settings/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/settings/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/settings/reading/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/site/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/source/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/source/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/source/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/translation/source/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/bulk-activate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/bulk-deactivate', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/change-password', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/toggle-attribute', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/default/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission-groups/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/refresh-routes', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/set-child-permissions', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/set-child-routes', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/permission/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/bulk-delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/create', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/delete', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/set-child-permissions', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/set-child-roles', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/update', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/role/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/user-permission/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/user-permission/set', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/user-permission/set-roles', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/visit-log/*', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/visit-log/grid-page-size', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/visit-log/grid-sort', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/visit-log/index', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('/admin/user/visit-log/view', 3, NULL, NULL, NULL, NULL, 1538934054, 1538934054),
('administrator', 1, 'Administrator', NULL, NULL, NULL, 1538934054, 1538934054),
('assignRolesToUsers', 2, 'Assign Roles To Users', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('author', 1, 'Author', NULL, NULL, NULL, 1538934054, 1538934054),
('bindUserToIp', 2, 'Bind User To IP', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('changeGeneralSettings', 2, 'Change General Settings', NULL, 'settings', NULL, 1538934054, 1538934054),
('changeOwnPassword', 2, 'Change Own Password', NULL, 'userCommonPermissions', NULL, 1538934054, 1538934054),
('changeReadingSettings', 2, 'Change Reading Settings', NULL, 'settings', NULL, 1538934054, 1538934054),
('changeUserPassword', 2, 'Change User Password', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('commonPermission', 2, 'Common Permission', NULL, 'userCommonPermissions', NULL, 1538934054, 1538934054),
('createComments', 2, 'Create Comments', NULL, 'commentManagement', NULL, 1538934054, 1538934054),
('createEavRecords', 2, 'Create EAV records', NULL, 'eavManagement', NULL, 1440180000, 1440180000),
('createMediaAlbums', 2, 'Create Media Albums', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('createMediaCategories', 2, 'Create Media Categories', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('createMenuLinks', 2, 'Create Menu Links', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('createMenus', 2, 'Create Menus', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('createPages', 2, 'Create Pages', NULL, 'pageManagement', NULL, 1538934054, 1538934054),
('createPostCategories', 2, 'Create Post Categories', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('createPosts', 2, 'Create Posts', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('createPostTags', 2, 'Create Post Tags', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('createSourceMessages', 2, 'Create Source Messages', NULL, 'translations', NULL, 1538934054, 1538934054),
('createUsers', 2, 'Create Users', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('deleteComments', 2, 'Delete Comments', NULL, 'commentManagement', NULL, 1538934054, 1538934054),
('deleteEavRecords', 2, 'Delete EAV records', NULL, 'eavManagement', NULL, 1440180000, 1440180000),
('deleteMedia', 2, 'Delete Media', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('deleteMediaAlbums', 2, 'Delete Media Albums', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('deleteMediaCategories', 2, 'Delete Media Categories', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('deleteMenuLinks', 2, 'Delete Menu Links', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('deleteMenus', 2, 'Delete Menus', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('deletePages', 2, 'Delete Pages', NULL, 'pageManagement', NULL, 1538934054, 1538934054),
('deletePostCategories', 2, 'Delete Post Categories', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('deletePosts', 2, 'Delete Posts', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('deletePostTags', 2, 'Delete Post Tags', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('deleteSourceMessages', 2, 'Delete Source Messages', NULL, 'translations', NULL, 1538934054, 1538934054),
('deleteUsers', 2, 'Delete Users', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('editComments', 2, 'Edit Comments', NULL, 'commentManagement', NULL, 1538934054, 1538934054),
('editEavRecords', 2, 'Edit EAV records', NULL, 'eavManagement', NULL, 1440180000, 1440180000),
('editMedia', 2, 'Edit Media', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('editMediaAlbums', 2, 'Edit Media Albums', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('editMediaCategories', 2, 'Edit Media Categories', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('editMediaSettings', 2, 'Edit Media Settings', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('editMenuLinks', 2, 'Edit Menu Links', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('editMenus', 2, 'Edit Menus', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('editPages', 2, 'Edit Pages', NULL, 'pageManagement', NULL, 1538934054, 1538934054),
('editPostCategories', 2, 'Edit Post Categories', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('editPosts', 2, 'Edit Posts', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('editPostTags', 2, 'Edit Post Tags', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('editUserEmail', 2, 'Edit User Email', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('editUsers', 2, 'Edit Users', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('flushCache', 2, 'Flush Cache', NULL, 'settings', NULL, 1538934054, 1538934054),
('fullMediaAccess', 2, 'Full Media Access', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('fullMediaAlbumAccess', 2, 'Full Media Albums Access', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('fullMediaCategoryAccess', 2, 'Full Media Categories Access', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('fullMenuAccess', 2, 'Full Menu Access', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('fullMenuLinkAccess', 2, 'Full Menu Links Access', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('fullPageAccess', 2, 'Full Page Access', NULL, 'pageManagement', NULL, 1538934054, 1538934054),
('fullPostAccess', 2, 'Full Post Access', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('fullPostCategoryAccess', 2, 'Full Post Categories Access', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('fullPostTagAccess', 2, 'Full Post Tags Access', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('manageRolesAndPermissions', 2, 'Manage Roles And Permissions', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('moderator', 1, 'Moderator', NULL, NULL, NULL, 1538934054, 1538934054),
('updateImmutableSourceMessages', 2, 'Update Immutable Source Messages', NULL, 'translations', NULL, 1538934054, 1538934054),
('updateSourceMessages', 2, 'Update Source Messages', NULL, 'translations', NULL, 1538934054, 1538934054),
('updateTranslations', 2, 'Update Message Translations', NULL, 'translations', NULL, 1538934054, 1538934054),
('uploadMedia', 2, 'Upload Media', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('user', 1, 'User', NULL, NULL, NULL, 1538934054, 1538934054),
('viewComments', 2, 'View Comments', NULL, 'commentManagement', NULL, 1538934054, 1538934054),
('viewDashboard', 2, 'View Dashboard', NULL, 'dashboard', NULL, 1538934054, 1538934054),
('viewEavRecords', 2, 'View EAV records', NULL, 'eavManagement', NULL, 1440180000, 1440180000),
('viewMedia', 2, 'View Media', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('viewMediaAlbums', 2, 'View Media Albums', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('viewMediaCategories', 2, 'View Media Categories', NULL, 'mediaManagement', NULL, 1538934054, 1538934054),
('viewMenuLinks', 2, 'View Menu Links', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('viewMenus', 2, 'View Menus', NULL, 'menuManagement', NULL, 1538934054, 1538934054),
('viewPages', 2, 'View Pages', NULL, 'pageManagement', NULL, 1538934054, 1538934054),
('viewPostCategories', 2, 'View Posts', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('viewPosts', 2, 'View Posts', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('viewPostTags', 2, 'View Tags', NULL, 'postManagement', NULL, 1538934054, 1538934054),
('viewRegistrationIp', 2, 'View Registration IP', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('viewRolesAndPermissions', 2, 'View Roles And Permissions', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('viewTranslations', 2, 'View Message Translations', NULL, 'translations', NULL, 1538934054, 1538934054),
('viewUserEmail', 2, 'View User Email', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('viewUserRoles', 2, 'View User Roles', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('viewUsers', 2, 'View Users', NULL, 'userManagement', NULL, 1538934054, 1538934054),
('viewVisitLog', 2, 'View Visit Logs', NULL, 'userManagement', NULL, 1538934054, 1538934054);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('viewDashboard', '/admin'),
('viewMedia', '/admin/#mediafile'),
('editComments', '/admin/comment/default/bulk-activate'),
('editComments', '/admin/comment/default/bulk-deactivate'),
('deleteComments', '/admin/comment/default/bulk-delete'),
('editComments', '/admin/comment/default/bulk-spam'),
('editComments', '/admin/comment/default/bulk-trash'),
('createComments', '/admin/comment/default/create'),
('deleteComments', '/admin/comment/default/delete'),
('viewComments', '/admin/comment/default/grid-page-size'),
('viewComments', '/admin/comment/default/grid-sort'),
('viewComments', '/admin/comment/default/index'),
('editComments', '/admin/comment/default/toggle-attribute'),
('editComments', '/admin/comment/default/update'),
('viewComments', '/admin/comment/default/view'),
('deleteEavRecords', '/admin/eav/attribute-option/bulk-delete'),
('createEavRecords', '/admin/eav/attribute-option/create'),
('deleteEavRecords', '/admin/eav/attribute-option/delete'),
('viewEavRecords', '/admin/eav/attribute-option/grid-page-size'),
('viewEavRecords', '/admin/eav/attribute-option/grid-sort'),
('viewEavRecords', '/admin/eav/attribute-option/index'),
('editEavRecords', '/admin/eav/attribute-option/toggle-attribute'),
('editEavRecords', '/admin/eav/attribute-option/update'),
('deleteEavRecords', '/admin/eav/attribute-type/bulk-delete'),
('createEavRecords', '/admin/eav/attribute-type/create'),
('deleteEavRecords', '/admin/eav/attribute-type/delete'),
('viewEavRecords', '/admin/eav/attribute-type/grid-page-size'),
('viewEavRecords', '/admin/eav/attribute-type/grid-sort'),
('viewEavRecords', '/admin/eav/attribute-type/index'),
('editEavRecords', '/admin/eav/attribute-type/toggle-attribute'),
('editEavRecords', '/admin/eav/attribute-type/update'),
('deleteEavRecords', '/admin/eav/attribute/bulk-delete'),
('createEavRecords', '/admin/eav/attribute/create'),
('deleteEavRecords', '/admin/eav/attribute/delete'),
('viewEavRecords', '/admin/eav/attribute/grid-page-size'),
('viewEavRecords', '/admin/eav/attribute/grid-sort'),
('viewEavRecords', '/admin/eav/attribute/index'),
('editEavRecords', '/admin/eav/attribute/toggle-attribute'),
('editEavRecords', '/admin/eav/attribute/update'),
('viewEavRecords', '/admin/eav/default/get-attributes'),
('viewEavRecords', '/admin/eav/default/get-categories'),
('viewEavRecords', '/admin/eav/default/index'),
('editEavRecords', '/admin/eav/default/set-attributes'),
('deleteEavRecords', '/admin/eav/entity-model/bulk-delete'),
('createEavRecords', '/admin/eav/entity-model/create'),
('deleteEavRecords', '/admin/eav/entity-model/delete'),
('viewEavRecords', '/admin/eav/entity-model/grid-page-size'),
('viewEavRecords', '/admin/eav/entity-model/grid-sort'),
('viewEavRecords', '/admin/eav/entity-model/index'),
('editEavRecords', '/admin/eav/entity-model/toggle-attribute'),
('editEavRecords', '/admin/eav/entity-model/update'),
('deleteMediaAlbums', '/admin/media/album/bulk-delete'),
('createMediaAlbums', '/admin/media/album/create'),
('deleteMediaAlbums', '/admin/media/album/delete'),
('viewMediaAlbums', '/admin/media/album/grid-page-size'),
('viewMediaAlbums', '/admin/media/album/grid-sort'),
('viewMediaAlbums', '/admin/media/album/index'),
('editMediaAlbums', '/admin/media/album/toggle-attribute'),
('editMediaAlbums', '/admin/media/album/update'),
('deleteMediaCategories', '/admin/media/category/bulk-delete'),
('createMediaCategories', '/admin/media/category/create'),
('deleteMediaCategories', '/admin/media/category/delete'),
('viewMediaCategories', '/admin/media/category/grid-page-size'),
('viewMediaCategories', '/admin/media/category/grid-sort'),
('viewMediaCategories', '/admin/media/category/index'),
('editMediaCategories', '/admin/media/category/toggle-attribute'),
('editMediaCategories', '/admin/media/category/update'),
('viewMedia', '/admin/media/default/index'),
('editMediaSettings', '/admin/media/default/settings'),
('deleteMedia', '/admin/media/manage/delete'),
('viewMedia', '/admin/media/manage/index'),
('viewMedia', '/admin/media/manage/info'),
('editMediaSettings', '/admin/media/manage/resize'),
('editMedia', '/admin/media/manage/update'),
('uploadMedia', '/admin/media/manage/upload'),
('uploadMedia', '/admin/media/manage/uploader'),
('deleteMenus', '/admin/menu/default/bulk-delete'),
('createMenus', '/admin/menu/default/create'),
('deleteMenus', '/admin/menu/default/delete'),
('viewMenus', '/admin/menu/default/grid-page-size'),
('viewMenus', '/admin/menu/default/grid-sort'),
('viewMenus', '/admin/menu/default/index'),
('editMenus', '/admin/menu/default/update'),
('viewMenus', '/admin/menu/default/view'),
('deleteMenuLinks', '/admin/menu/link/bulk-delete'),
('createMenuLinks', '/admin/menu/link/create'),
('deleteMenuLinks', '/admin/menu/link/delete'),
('viewMenuLinks', '/admin/menu/link/grid-page-size'),
('viewMenuLinks', '/admin/menu/link/grid-sort'),
('viewMenuLinks', '/admin/menu/link/index'),
('editMenuLinks', '/admin/menu/link/update'),
('viewMenuLinks', '/admin/menu/link/view'),
('editPages', '/admin/page/default/bulk-activate'),
('editPages', '/admin/page/default/bulk-deactivate'),
('deletePages', '/admin/page/default/bulk-delete'),
('createPages', '/admin/page/default/create'),
('deletePages', '/admin/page/default/delete'),
('viewPages', '/admin/page/default/grid-page-size'),
('viewPages', '/admin/page/default/grid-sort'),
('viewPages', '/admin/page/default/index'),
('editPages', '/admin/page/default/toggle-attribute'),
('editPages', '/admin/page/default/update'),
('viewPages', '/admin/page/default/view'),
('deletePostCategories', '/admin/post/category/bulk-delete'),
('createPostCategories', '/admin/post/category/create'),
('deletePostCategories', '/admin/post/category/delete'),
('viewPostCategories', '/admin/post/category/grid-page-size'),
('viewPostCategories', '/admin/post/category/grid-sort'),
('viewPostCategories', '/admin/post/category/index'),
('editPostCategories', '/admin/post/category/toggle-attribute'),
('editPostCategories', '/admin/post/category/update'),
('editPosts', '/admin/post/default/bulk-activate'),
('editPosts', '/admin/post/default/bulk-deactivate'),
('deletePosts', '/admin/post/default/bulk-delete'),
('createPosts', '/admin/post/default/create'),
('deletePosts', '/admin/post/default/delete'),
('viewPosts', '/admin/post/default/grid-page-size'),
('viewPosts', '/admin/post/default/grid-sort'),
('viewPosts', '/admin/post/default/index'),
('editPosts', '/admin/post/default/toggle-attribute'),
('editPosts', '/admin/post/default/update'),
('viewPosts', '/admin/post/default/view'),
('deletePostTags', '/admin/post/tag/bulk-delete'),
('createPostTags', '/admin/post/tag/create'),
('deletePostTags', '/admin/post/tag/delete'),
('viewPostTags', '/admin/post/tag/grid-page-size'),
('viewPostTags', '/admin/post/tag/grid-sort'),
('viewPostTags', '/admin/post/tag/index'),
('editPostTags', '/admin/post/tag/toggle-attribute'),
('editPostTags', '/admin/post/tag/update'),
('flushCache', '/admin/settings/cache/flush'),
('changeGeneralSettings', '/admin/settings/default/index'),
('changeReadingSettings', '/admin/settings/reading/index'),
('viewDashboard', '/admin/site/index'),
('viewTranslations', '/admin/translation/default/index'),
('createSourceMessages', '/admin/translation/source/create'),
('deleteSourceMessages', '/admin/translation/source/delete'),
('updateSourceMessages', '/admin/translation/source/update'),
('editUsers', '/admin/user/default/bulk-activate'),
('editUsers', '/admin/user/default/bulk-deactivate'),
('deleteUsers', '/admin/user/default/bulk-delete'),
('changeUserPassword', '/admin/user/default/change-password'),
('createUsers', '/admin/user/default/create'),
('deleteUsers', '/admin/user/default/delete'),
('viewUsers', '/admin/user/default/grid-page-size'),
('viewUsers', '/admin/user/default/grid-sort'),
('viewUsers', '/admin/user/default/index'),
('editUsers', '/admin/user/default/toggle-attribute'),
('editUsers', '/admin/user/default/update'),
('manageRolesAndPermissions', '/admin/user/permission-groups/bulk-delete'),
('manageRolesAndPermissions', '/admin/user/permission-groups/create'),
('manageRolesAndPermissions', '/admin/user/permission-groups/delete'),
('viewRolesAndPermissions', '/admin/user/permission-groups/grid-page-size'),
('viewRolesAndPermissions', '/admin/user/permission-groups/grid-sort'),
('viewRolesAndPermissions', '/admin/user/permission-groups/index'),
('manageRolesAndPermissions', '/admin/user/permission-groups/update'),
('manageRolesAndPermissions', '/admin/user/permission/bulk-delete'),
('manageRolesAndPermissions', '/admin/user/permission/create'),
('manageRolesAndPermissions', '/admin/user/permission/delete'),
('viewRolesAndPermissions', '/admin/user/permission/grid-page-size'),
('viewRolesAndPermissions', '/admin/user/permission/grid-sort'),
('viewRolesAndPermissions', '/admin/user/permission/index'),
('manageRolesAndPermissions', '/admin/user/permission/refresh-routes'),
('manageRolesAndPermissions', '/admin/user/permission/set-child-permissions'),
('manageRolesAndPermissions', '/admin/user/permission/set-child-routes'),
('manageRolesAndPermissions', '/admin/user/permission/update'),
('manageRolesAndPermissions', '/admin/user/permission/view'),
('manageRolesAndPermissions', '/admin/user/role/bulk-delete'),
('manageRolesAndPermissions', '/admin/user/role/create'),
('manageRolesAndPermissions', '/admin/user/role/delete'),
('viewRolesAndPermissions', '/admin/user/role/grid-page-size'),
('viewRolesAndPermissions', '/admin/user/role/grid-sort'),
('viewRolesAndPermissions', '/admin/user/role/index'),
('manageRolesAndPermissions', '/admin/user/role/set-child-permissions'),
('manageRolesAndPermissions', '/admin/user/role/set-child-roles'),
('manageRolesAndPermissions', '/admin/user/role/update'),
('manageRolesAndPermissions', '/admin/user/role/view'),
('assignRolesToUsers', '/admin/user/user-permission/set'),
('assignRolesToUsers', '/admin/user/user-permission/set-roles'),
('viewVisitLog', '/admin/user/visit-log/grid-page-size'),
('viewVisitLog', '/admin/user/visit-log/grid-sort'),
('viewVisitLog', '/admin/user/visit-log/index'),
('viewVisitLog', '/admin/user/visit-log/view'),
('administrator', 'assignRolesToUsers'),
('administrator', 'author'),
('moderator', 'author'),
('administrator', 'bindUserToIp'),
('administrator', 'changeGeneralSettings'),
('user', 'changeOwnPassword'),
('administrator', 'changeReadingSettings'),
('administrator', 'changeUserPassword'),
('user', 'commonPermission'),
('moderator', 'createComments'),
('administrator', 'createEavRecords'),
('author', 'createMediaAlbums'),
('moderator', 'createMediaCategories'),
('administrator', 'createMenuLinks'),
('administrator', 'createMenus'),
('administrator', 'createPages'),
('moderator', 'createPostCategories'),
('author', 'createPosts'),
('moderator', 'createPostTags'),
('administrator', 'createSourceMessages'),
('administrator', 'createUsers'),
('moderator', 'deleteComments'),
('administrator', 'deleteEavRecords'),
('administrator', 'deleteMedia'),
('administrator', 'deleteMediaAlbums'),
('administrator', 'deleteMediaCategories'),
('administrator', 'deleteMenuLinks'),
('administrator', 'deleteMenus'),
('administrator', 'deletePages'),
('administrator', 'deletePostCategories'),
('moderator', 'deletePosts'),
('administrator', 'deletePostTags'),
('administrator', 'deleteSourceMessages'),
('administrator', 'deleteUsers'),
('moderator', 'editComments'),
('administrator', 'editEavRecords'),
('uploadMedia', 'editMedia'),
('moderator', 'editMediaAlbums'),
('moderator', 'editMediaCategories'),
('administrator', 'editMenuLinks'),
('administrator', 'editMenus'),
('administrator', 'editPages'),
('moderator', 'editPostCategories'),
('author', 'editPosts'),
('moderator', 'editPostTags'),
('administrator', 'editUserEmail'),
('administrator', 'editUsers'),
('manageRolesAndPermissions', 'editUsers'),
('administrator', 'flushCache'),
('moderator', 'fullMediaAccess'),
('moderator', 'fullMediaAlbumAccess'),
('moderator', 'fullMediaCategoryAccess'),
('administrator', 'fullMenuAccess'),
('administrator', 'fullMenuLinkAccess'),
('administrator', 'fullPageAccess'),
('moderator', 'fullPostAccess'),
('moderator', 'fullPostCategoryAccess'),
('moderator', 'fullPostTagAccess'),
('administrator', 'manageRolesAndPermissions'),
('administrator', 'moderator'),
('administrator', 'updateSourceMessages'),
('createSourceMessages', 'updateSourceMessages'),
('deleteSourceMessages', 'updateSourceMessages'),
('updateImmutableSourceMessages', 'updateSourceMessages'),
('administrator', 'updateTranslations'),
('updateSourceMessages', 'updateTranslations'),
('author', 'uploadMedia'),
('administrator', 'user'),
('author', 'user'),
('moderator', 'user'),
('createComments', 'viewComments'),
('deleteComments', 'viewComments'),
('editComments', 'viewComments'),
('moderator', 'viewComments'),
('author', 'viewDashboard'),
('administrator', 'viewEavRecords'),
('createEavRecords', 'viewEavRecords'),
('deleteEavRecords', 'viewEavRecords'),
('editEavRecords', 'viewEavRecords'),
('deleteMedia', 'viewMedia'),
('editMedia', 'viewMedia'),
('editMediaSettings', 'viewMedia'),
('fullMediaAccess', 'viewMedia'),
('uploadMedia', 'viewMedia'),
('createMediaAlbums', 'viewMediaAlbums'),
('deleteMediaAlbums', 'viewMediaAlbums'),
('editMediaAlbums', 'viewMediaAlbums'),
('createMediaCategories', 'viewMediaCategories'),
('deleteMediaCategories', 'viewMediaCategories'),
('editMediaCategories', 'viewMediaCategories'),
('administrator', 'viewMenuLinks'),
('createMenuLinks', 'viewMenuLinks'),
('deleteMenuLinks', 'viewMenuLinks'),
('editMenuLinks', 'viewMenuLinks'),
('fullMenuLinkAccess', 'viewMenuLinks'),
('administrator', 'viewMenus'),
('createMenus', 'viewMenus'),
('deleteMenus', 'viewMenus'),
('editMenus', 'viewMenus'),
('fullMenuAccess', 'viewMenus'),
('viewMenuLinks', 'viewMenus'),
('administrator', 'viewPages'),
('createPages', 'viewPages'),
('deletePages', 'viewPages'),
('editPages', 'viewPages'),
('author', 'viewPostCategories'),
('author', 'viewPosts'),
('createPostCategories', 'viewPosts'),
('createPosts', 'viewPosts'),
('deletePostCategories', 'viewPosts'),
('deletePosts', 'viewPosts'),
('editPostCategories', 'viewPosts'),
('editPosts', 'viewPosts'),
('viewPostCategories', 'viewPosts'),
('viewPostTags', 'viewPosts'),
('author', 'viewPostTags'),
('createPostTags', 'viewPostTags'),
('deletePostTags', 'viewPostTags'),
('editPostTags', 'viewPostTags'),
('administrator', 'viewRegistrationIp'),
('administrator', 'viewRolesAndPermissions'),
('manageRolesAndPermissions', 'viewRolesAndPermissions'),
('administrator', 'viewTranslations'),
('createSourceMessages', 'viewTranslations'),
('deleteSourceMessages', 'viewTranslations'),
('updateImmutableSourceMessages', 'viewTranslations'),
('updateSourceMessages', 'viewTranslations'),
('updateTranslations', 'viewTranslations'),
('editUserEmail', 'viewUserEmail'),
('moderator', 'viewUserEmail'),
('administrator', 'viewUserRoles'),
('assignRolesToUsers', 'viewUserRoles'),
('viewRolesAndPermissions', 'viewUserRoles'),
('assignRolesToUsers', 'viewUsers'),
('changeUserPassword', 'viewUsers'),
('createUsers', 'viewUsers'),
('deleteUsers', 'viewUsers'),
('editUsers', 'viewUsers'),
('manageRolesAndPermissions', 'viewUsers'),
('moderator', 'viewUsers'),
('viewRolesAndPermissions', 'viewUsers'),
('viewVisitLog', 'viewUsers'),
('administrator', 'viewVisitLog');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_group`
--

CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item_group`
--

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`) VALUES
('commentManagement', 'Comment Management', 1538934054, 1538934054),
('dashboard', 'Dashboard', 1538934054, 1538934054),
('eavManagement', 'EAV Management', 1440180000, 1440180000),
('mediaManagement', 'Media Management', 1538934054, 1538934054),
('menuManagement', 'Menu Management', 1538934054, 1538934054),
('pageManagement', 'Page Management', 1538934054, 1538934054),
('postManagement', 'Post Management', 1538934054, 1538934054),
('settings', 'Settings', 1538934054, 1538934054),
('translations', 'Translations', 1538934054, 1538934054),
('userCommonPermissions', 'Common Permissions', 1538934054, 1538934054),
('userManagement', 'User Management', 1538934054, 1538934054);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `model` varchar(64) NOT NULL DEFAULT '',
  `model_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'null-is not a reply, int-replied comment id',
  `content` text,
  `status` int(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0-pending,1-published,2-spam,3-deleted',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `user_ip` varchar(15) DEFAULT NULL,
  `super_parent_id` int(11) DEFAULT NULL COMMENT 'null-has no parent, int-1st level parent id',
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `model`, `model_id`, `user_id`, `username`, `email`, `parent_id`, `content`, `status`, `created_at`, `updated_at`, `updated_by`, `user_ip`, `super_parent_id`, `url`) VALUES
(8, 'backend\\modules\\post\\models\\Post', 15, 1, NULL, NULL, NULL, '«Быть счастливой каждый день»\r\n\r\nНачинаю серию интервью с теми людьми, которые мне кажутся очень особенными в плане личной силы. Выбираю тех, кто много лет очень нравится,\r\n\r\nс кем я ощущаю себя «в унисон».\r\n\r\nЗдесь будет моя личная коллекция людей, которые вызывают только тепло\r\n\r\nи восхищение.\r\n\r\nИ в первую очередь, — тех, кто достиг того, к чему все стремятся (то самое «приближаясь» в названии моего блога) — стабильной удовлетворенности\r\n\r\nот своей жизни, перманентного счастья и радости от всего, какие бы ситуации\r\n\r\nни происходили.\r\n\r\nМне интересно докопаться — откуда это в них, что они делали, как к этому пришли, что им помогло, что кажется важнейшим.', 1, 1545423065, 1545423065, 1, '::1', NULL, '/post_15'),
(10, 'backend\\modules\\post\\models\\Post', 15, NULL, 'Артур', 'artmarkov@mail.ru', NULL, 'Я уже пожилой человек, добившийся в жизни всего, о чем только можно мечтать. Моих денег мне не прожить до конца моих дней, а, учитывая скромность моих потребностей - и за много жизней не прожить.Я больше не заинтересован в зарабатывании денег. Будучи евреем, я, за исключением последних лет, жил и работал в России, хорошо узнал страну и ее народ, изучил силу и слабости русских. Начав, как беспощадный эксплуататор и иудей, я постепенно проникся сочувствием к великому и сверхтерпеливому русскому народу, и сейчас уже вполне искренне желаю ему блага.\r\n', 0, 1545424900, 1545661012, 1, '::1', 8, '/post_15'),
(11, 'backend\\modules\\post\\models\\Post', 14, 1, NULL, NULL, NULL, '123123123', 1, 1546110672, 1546110672, 1, '::1', NULL, '/post_14'),
(12, 'backend\\modules\\post\\models\\Post', 15, 1, NULL, NULL, 8, 'sdfsdfsdfsdfsf', 1, 1546112546, 1546112546, 1, '::1', 8, '/post_15');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `subject` varchar(127) NOT NULL,
  `body` text NOT NULL,
  `subscribe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `subscribe`, `created_at`) VALUES
(1, 'Артур', 'artmarkov@mail.ru', 'Запись на консультацию', 'Я хочу у Вас заниматься. Когда можно подъехать?', 1, 1545901921),
(2, '1111111111', 'artmarkov@mail.ru', '111111111111111', '11111111111111111111111111111111111111111111111111111111 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 1, 1550524762),
(3, '1111111111', 'artmarkov@mail.ru', '111111111111111', ' \'js/scripts.js\', \'js/scripts.js\', \'js/scripts.js\', \'js/scripts.js\',1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111\n11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 0, 1550524987),
(4, '1111111111', 'artmarkov@mail.ru', '111111111111111', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 0, 1550525054);

-- --------------------------------------------------------

--
-- Структура таблицы `event_item`
--

CREATE TABLE `event_item` (
  `id` int(8) NOT NULL,
  `vid_id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Состав программы';

--
-- Дамп данных таблицы `event_item`
--

INSERT INTO `event_item` (`id`, `vid_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'ОБЩЕСТВО В МИНИАТЮРЕ или \"Как выстраивать доверительные отношения!\"', 'Курс  направлен на раскрытие себя через рисунок, за счет познания своего внутреннего мира и внутреннего мира других участников встреч, с помощью методов арт-терапии.', 1546696357, 1546895768),
(2, 2, 'МИР ДЕТСКИХ ВОСПОМИНАНИЙ', '111', 1546898212, 1547556565),
(3, 1, 'КРЕАТИВНОСТЬ или \"Мой творческий потенциал!\"', 'Занятие', 1546898549, 1548228841),
(4, 2, 'УНИКАЛЬНЫЙ ВНУТРЕННИЙ МИР', '333', 1546898785, 1547670430);

-- --------------------------------------------------------

--
-- Структура таблицы `event_item_practice`
--

CREATE TABLE `event_item_practice` (
  `id` int(8) NOT NULL,
  `item_id` int(8) NOT NULL,
  `practice_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='связь n:n событий и практик';

--
-- Дамп данных таблицы `event_item_practice`
--

INSERT INTO `event_item_practice` (`id`, `item_id`, `practice_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 2),
(4, 2, 6),
(13, 4, 2),
(15, 4, 3),
(16, 4, 1),
(17, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `event_item_programm`
--

CREATE TABLE `event_item_programm` (
  `id` int(11) NOT NULL,
  `programm_id` int(8) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty_items` mediumint(5) NOT NULL DEFAULT '1',
  `price` mediumint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь n:n программы с занятиями';

--
-- Дамп данных таблицы `event_item_programm`
--

INSERT INTO `event_item_programm` (`id`, `programm_id`, `item_id`, `qty_items`, `price`) VALUES
(1, 1, 1, 3, 3047),
(2, 1, 2, 2, 1000),
(3, 1, 3, 1, 500),
(17, 2, 3, 5, 5555),
(18, 1, 2, 2, 1250);

-- --------------------------------------------------------

--
-- Структура таблицы `event_methods`
--

CREATE TABLE `event_methods` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Методы арттерапии';

--
-- Дамп данных таблицы `event_methods`
--

INSERT INTO `event_methods` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Песочная терапия', '', 1234567890),
(2, 'Изотерапия', '', 1546862227),
(3, 'Глинотерапия', '', 1546862775),
(4, 'Сказкотерапия', '', 1546862816),
(5, 'Драматерапия', '', 1546862850),
(6, 'Библиотерапия', '', 1546862862),
(7, 'Куклотерапия', '', 1546862872),
(8, 'Цветотерапия', '', 1546862883),
(9, 'Маскотерапия', '', 1546862896),
(10, 'Фототерапия', '', 1546862908),
(11, 'Креативная терапия', '', 1546862918),
(12, 'Семейная терапия', '', 1546862942),
(13, 'Имиджтерапия', '', 1546862977);

-- --------------------------------------------------------

--
-- Структура таблицы `event_place`
--

CREATE TABLE `event_place` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_optional` varchar(24) NOT NULL,
  `email` varchar(255) NOT NULL,
  `сontact_person` varchar(127) NOT NULL,
  `coords` varchar(64) DEFAULT NULL,
  `map_zoom` smallint(2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `event_color` varchar(32) DEFAULT NULL,
  `event_text_color` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Место проведения';

--
-- Дамп данных таблицы `event_place`
--

INSERT INTO `event_place` (`id`, `name`, `address`, `phone`, `phone_optional`, `email`, `сontact_person`, `coords`, `map_zoom`, `description`, `event_color`, `event_text_color`, `created_at`, `updated_at`) VALUES
(1, 'Красный Кит', 'Россия, Московская область, Красногорск, улица Ленина, 2, 3 этаж', '+7 (911) 123 45 67', '', 'artmarkov@mail.ru', 'Елена', '55.81963507238688,37.320560147307866', 17, '', 'rgba(106, 168, 79, 0.84)', 'rgb(255, 255, 255)', 1546901535, 1547488170),
(2, 'Сокол', 'Россия, Москва, Ленинградский проспект, 78к4', '+7 (111) 111 11 11', '', 'artmarkov@mail.ru', 'Артур', '55.806927240893025,37.51445068176123', 15, '', 'rgba(60, 120, 216, 0.82)', 'rgb(255, 255, 255)', 1547476901, 1548260112),
(3, 'Start Hub', 'Россия, Москва, Большая Новодмитровская улица, дом 36 стр 12 вход 6', '+7 (499) 653 50 37', '', 'artmarkov@mail.ru', 'Елена', '55.804438632779274,37.586017233310734', 17, '', 'rgba(255, 153, 0, 0.93)', 'rgb(255, 255, 255)', 1547488423, 1547662796);

-- --------------------------------------------------------

--
-- Структура таблицы `event_practice`
--

CREATE TABLE `event_practice` (
  `id` int(8) NOT NULL,
  `methods_id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` mediumtext NOT NULL,
  `time_volume` int(3) NOT NULL COMMENT 'время проведения в мин',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Практики арттерапии';

--
-- Дамп данных таблицы `event_practice`
--

INSERT INTO `event_practice` (`id`, `methods_id`, `name`, `description`, `time_volume`, `created_at`) VALUES
(1, 1, 'Рисуем песком', 'Инструменты: цветной картон, кинетический песок (10-15 оттенков), музыкальное сопровождение - звуки природы.\n\nАлгоритм работы: Каждому учащемуся предлагается выбрать сосуд с одним цветом кинетического песка и лист картона другого, непохожего цвета. Предлагается создать рисунок того, что захотят. Можно либо сыпать песок из руки на лист, либо рисовать пальцем по песку. Ведущий просит поделиться своими впечатлениями.', 15, 1234578987),
(2, 2, 'Спонтанный рисунок', 'Инструменты: масляная пастель, белые листы бумаги А-4.\n\nАлгоритм работы: Учащиеся рисуют то, что захочется, какие образы приходят, то и рисуют. Прикрепляют получившиеся картины-рисунки к стене. Ведущий просит участников рассказать несколько слов о себе: Кто Я? Участники группы делятся своими ощущениями, чувствами, которые они испытывают.', 20, 1546862271),
(3, 2, 'Каракули', 'Инструменты: фломастеры или цветные карандаши, белые листы бумаги А-4.\n\nАлгоритм работы: «Каракули» Выполнение техники рисования каракулей подразумевает, что участники закрывает глаза. Лист 1: Двумя руками одновременно на одном листе водят по листу, так как руки захотят, карандаш - продолжение руки. Лист 2: Карандаши поменять в руках, и водить по листу. В результате получается «клубок линий». Ведущий предлагает выбрать один лист с рисунком, далее предлагается прорисовать то, что более напоминает. Группа делится свои ощущения. На основе созданных каракулей сочинить рассказ.', 40, 1546862441),
(4, 2, 'Рисуем деревья', 'Инструменты: масляная пастель, большой лист (соединить 2-3 листа А-0).\n\nАлгоритм работы: Каждому учащемуся предлагается закрыть глаза и постараться увидеть лес. Представь себя в образе дерева. Открыть глаза и на большом листе бумаги нарисовать дерево. Придумать рисунку название и историю, от первого лица. Чтобы прояснить детали рисунка или рассказа, ведущий и другие учащиеся задают вопросы.', 30, 1546862493),
(5, 2, 'Рисунок по кругу', 'Инструменты: фломастеры или цветные карандаши, белые листы бумаги А-4.\n\nАлгоритм работы: «Рисунок по кругу» Ведущий предлагает сесть в круг и создать свой небольшой рисунок, который в какой-то мере отражал бы состояние учащегося, настроение в данный момент. По окончании работы учащиеся передают свои рисунки по кругу, начиная с соседа слева, который что-то дорисовывает на свое усмотрение и передает рисунок дальше. Завершающий этап обсуждение.', 20, 1546862590),
(6, 2, 'Собери круг', 'Инструменты: белый лист А-1. масляная пастель, ножницы, бумажный скотч, клей. \n\nАлгоритм работы: «Собери круг» Ведущий предлагает нарисовать на листе большой круг. Каждый участник вырезает себе кусочек листа от круга, круг разделяется между учащимися на части. Каждый раскрашивает свой кусочек. Далее ведущий предлагает объединить рисунки в круг, создавая общую картину. Участники делятся своими ощущениями.', 50, 1546863063),
(7, 11, 'Нарисуй иероглиф', 'Инструменты: тушь, перо плакатное № 6 с держателем, листы картона А-4.\n\nАлгоритм работы: Учащимся предлагается попрактиковаться в придумывание иероглифов. Ведущий напоминает о существование «иероглифического письма», и дает задание придумать иероглифы на простые слова. Работы выставляются на обзор. Учащиеся угадывают слово или фразу. Общение с группой.', 30, 1546863129);

-- --------------------------------------------------------

--
-- Структура таблицы `event_programm`
--

CREATE TABLE `event_programm` (
  `id` int(8) NOT NULL,
  `vid_id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Программа занятий';

--
-- Дамп данных таблицы `event_programm`
--

INSERT INTO `event_programm` (`id`, `vid_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Программа 30 встреч', '111', 1547040720, 1547979181),
(2, 1, 'Инд Программа', 'Программа', 1547153697, 1548228832);

-- --------------------------------------------------------

--
-- Структура таблицы `event_schedule`
--

CREATE TABLE `event_schedule` (
  `id` int(8) NOT NULL,
  `programm_id` int(8) NOT NULL,
  `item_id` int(8) NOT NULL,
  `place_id` int(8) NOT NULL,
  `start_timestamp` int(11) NOT NULL,
  `end_timestamp` int(11) DEFAULT NULL,
  `description` mediumtext,
  `price` mediumint(5) NOT NULL DEFAULT '0' COMMENT 'стоимость занятия',
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Расписание занятий';

--
-- Дамп данных таблицы `event_schedule`
--

INSERT INTO `event_schedule` (`id`, `programm_id`, `item_id`, `place_id`, `start_timestamp`, `end_timestamp`, `description`, `price`, `all_day`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 2, 1550477700, 1550489400, '', 5, 0, 1547313715, 1550431007),
(5, 1, 1, 3, 1550553300, 1550564100, '111', 1000, 0, 1547488584, 1550431008),
(6, 1, 3, 1, 1550467800, 1550479500, 'Расписание', 0, 0, 1547488714, 1550431005),
(7, 1, 2, 2, 1550556900, 1550568600, NULL, 0, 0, 1548251754, 1550501380);

-- --------------------------------------------------------

--
-- Структура таблицы `event_schedule_practice`
--

CREATE TABLE `event_schedule_practice` (
  `id` int(8) NOT NULL,
  `schedule_id` int(8) NOT NULL,
  `practice_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='связь n:n событий в расписании и практик';

--
-- Дамп данных таблицы `event_schedule_practice`
--

INSERT INTO `event_schedule_practice` (`id`, `schedule_id`, `practice_id`) VALUES
(8, 5, 1),
(11, 5, 2),
(12, 3, 6),
(13, 6, 2),
(14, 7, 2),
(15, 7, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `event_schedule_users`
--

CREATE TABLE `event_schedule_users` (
  `id` int(8) NOT NULL,
  `schedule_id` int(8) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_schedule_users`
--

INSERT INTO `event_schedule_users` (`id`, `schedule_id`, `user_id`) VALUES
(6, 3, 2),
(25, 6, 2),
(31, 5, 2),
(32, 6, 1),
(33, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `event_vid`
--

CREATE TABLE `event_vid` (
  `id` int(8) NOT NULL,
  `status_vid` tinyint(1) NOT NULL,
  `name` varchar(127) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Вид занятий';

--
-- Дамп данных таблицы `event_vid`
--

INSERT INTO `event_vid` (`id`, `status_vid`, `name`, `description`, `created_at`) VALUES
(1, 0, 'Индивидуальное консультирование', '\n		', 1546708700),
(2, 1, 'Психологическая работа в группе', '', 1546708966);

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(127) DEFAULT NULL,
  `url` text,
  `size` varchar(127) DEFAULT NULL,
  `thumbs` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `album_id`, `filename`, `type`, `url`, `size`, `thumbs`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, NULL, 'solar-eclipse.jpg', 'image/jpeg', '/uploads/2019/02/solar-eclipse.jpg', '531187', 'a:4:{s:5:\"small\";s:41:\"/uploads/2019/02/solar-eclipse-128x72.jpg\";s:6:\"medium\";s:42:\"/uploads/2019/02/solar-eclipse-832x468.jpg\";s:5:\"large\";s:43:\"/uploads/2019/02/solar-eclipse-1280x720.jpg\";s:5:\"great\";s:44:\"/uploads/2019/02/solar-eclipse-1920x1080.jpg\";}', 1550492620, 1550492621, 1, 1),
(2, NULL, 'forest.jpg', 'image/jpeg', '/uploads/2019/02/forest.jpg', '730310', 'a:4:{s:5:\"small\";s:34:\"/uploads/2019/02/forest-128x72.jpg\";s:6:\"medium\";s:35:\"/uploads/2019/02/forest-832x468.jpg\";s:5:\"large\";s:36:\"/uploads/2019/02/forest-1280x720.jpg\";s:5:\"great\";s:37:\"/uploads/2019/02/forest-1920x1080.jpg\";}', 1550492621, 1550492622, 1, 1),
(3, NULL, 'sunset-silhouette.jpg', 'image/jpeg', '/uploads/2019/02/sunset-silhouette.jpg', '235595', 'a:4:{s:5:\"small\";s:45:\"/uploads/2019/02/sunset-silhouette-128x72.jpg\";s:6:\"medium\";s:46:\"/uploads/2019/02/sunset-silhouette-832x468.jpg\";s:5:\"large\";s:47:\"/uploads/2019/02/sunset-silhouette-1280x720.jpg\";s:5:\"great\";s:48:\"/uploads/2019/02/sunset-silhouette-1920x1080.jpg\";}', 1550492622, 1550492623, 1, 1),
(4, NULL, 'textslider.jpg', 'image/jpeg', '/uploads/2019/02/textslider.jpg', '33269', 'a:4:{s:5:\"small\";s:38:\"/uploads/2019/02/textslider-128x72.jpg\";s:6:\"medium\";s:39:\"/uploads/2019/02/textslider-832x468.jpg\";s:5:\"large\";s:40:\"/uploads/2019/02/textslider-1280x720.jpg\";s:5:\"great\";s:41:\"/uploads/2019/02/textslider-1920x1080.jpg\";}', 1550492623, 1550515788, 1, 1),
(5, NULL, 'tree-cat.jpg', 'image/jpeg', '/uploads/2019/02/tree-cat.jpg', '67693', 'a:4:{s:5:\"small\";s:36:\"/uploads/2019/02/tree-cat-128x72.jpg\";s:6:\"medium\";s:37:\"/uploads/2019/02/tree-cat-832x468.jpg\";s:5:\"large\";s:38:\"/uploads/2019/02/tree-cat-1280x720.jpg\";s:5:\"great\";s:39:\"/uploads/2019/02/tree-cat-1920x1080.jpg\";}', 1550492624, 1550492624, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `media_album`
--

CREATE TABLE `media_album` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_album`
--

INSERT INTO `media_album` (`id`, `category_id`, `title`, `slug`, `description`, `visible`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, 'Личное фото', 'licnoe-foto', '', 1, 1549102723, 1549102723, 1, 1),
(2, 2, 'Фото на главной', 'foto-na-glavnoj', 'Карусель на главной', 1, 1549102772, 1549102772, 1, 1),
(3, 1, 'Фоны для УТП', 'fony-dla-utp', 'Для параллакса на главной', 1, 1549102845, 1549102845, 1, 1),
(4, 1, 'Фоны для Revolution Slider', 'fony-dla-revolution-slider', 'На главной слайдер', 1, 1549102911, 1549102911, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `media_album_lang`
--

CREATE TABLE `media_album_lang` (
  `id` int(11) NOT NULL,
  `media_album_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_album_lang`
--

INSERT INTO `media_album_lang` (`id`, `media_album_id`, `language`, `title`, `description`) VALUES
(1, 1, 'ru', 'Личное фото', ''),
(2, 2, 'ru', 'Фото на главной', 'Карусель на главной'),
(3, 3, 'ru', 'Фоны для УТП', 'Для параллакса на главной'),
(4, 4, 'ru', 'Фоны для Revolution Slider', 'На главной слайдер');

-- --------------------------------------------------------

--
-- Структура таблицы `media_category`
--

CREATE TABLE `media_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_category`
--

INSERT INTO `media_category` (`id`, `slug`, `title`, `description`, `visible`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'fony-dla-sajta', 'Фоны для сайта', '', 1, 1549102647, 1549102647, 1, 1),
(2, 'kartinki-dla-sajta', 'Картинки для сайта', '', 1, 1549102677, 1549102677, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `media_category_lang`
--

CREATE TABLE `media_category_lang` (
  `id` int(11) NOT NULL,
  `media_category_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_category_lang`
--

INSERT INTO `media_category_lang` (`id`, `media_category_id`, `language`, `title`, `description`) VALUES
(1, 1, 'ru', 'Фоны для сайта', ''),
(2, 2, 'ru', 'Картинки для сайта', '');

-- --------------------------------------------------------

--
-- Структура таблицы `media_lang`
--

CREATE TABLE `media_lang` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_lang`
--

INSERT INTO `media_lang` (`id`, `media_id`, `language`, `title`, `alt`, `description`) VALUES
(1, 1, 'ru', 'solar-eclipse.jpg', 'solar-eclipse.jpg', NULL),
(2, 2, 'ru', 'forest.jpg', 'forest.jpg', NULL),
(3, 3, 'ru', 'sunset-silhouette.jpg', 'sunset-silhouette.jpg', NULL),
(4, 4, 'ru', 'textslider.jpg', 'textslider.jpg', ''),
(5, 5, 'ru', 'tree-cat.jpg', 'tree-cat.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `media_manager`
--

CREATE TABLE `media_manager` (
  `id` mediumint(8) NOT NULL,
  `class` varchar(256) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `sort` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `media_upload`
--

CREATE TABLE `media_upload` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `owner_class` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('admin-menu', NULL, NULL, 1, NULL),
('main-menu', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_lang`
--

CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(64) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_lang`
--

INSERT INTO `menu_lang` (`id`, `menu_id`, `language`, `title`) VALUES
(1, 'admin-menu', 'en-US', 'Control Panel Menu'),
(2, 'main-menu', 'en-US', 'Main Menu'),
(3, 'main-menu', 'ru', 'Главное Меню'),
(4, 'admin-menu', 'ru', 'Меню Панели Управления');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_link`
--

CREATE TABLE `menu_link` (
  `id` varchar(64) NOT NULL,
  `menu_id` varchar(64) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` varchar(64) DEFAULT '',
  `image` varchar(24) DEFAULT NULL,
  `alwaysVisible` int(1) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_link`
--

INSERT INTO `menu_link` (`id`, `menu_id`, `link`, `parent_id`, `image`, `alwaysVisible`, `order`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('about', 'main-menu', '/site/about', '', '', 1, 1, NULL, 1544698568, 1, 1),
('active_pages', 'admin-menu', '/section/default/index', 'landing-page', '', 0, 21, 1550236114, 1550236114, 1, 1),
('bd', 'admin-menu', '/db', 'settings', '', 0, 44, 1544790630, 1544790676, 1, 1),
('blog', 'main-menu', '/site/blog', '', '', 0, 4, 1544699051, 1544699051, 1, 1),
('calendar', 'admin-menu', '/event/schedule/fullcalendar', 'event', '', 0, 32, 1547119882, 1547328215, 1, 1),
('carousel', 'admin-menu', '/section/carousel/index', 'landing-page', '', 0, 24, 1548703398, 1548703398, 1, 1),
('comment', 'admin-menu', '/comment/default/index', '', 'comment', 0, 10, NULL, NULL, 1, NULL),
('consult', 'main-menu', '/consult', '', '', 0, 3, 1545151400, 1545151452, 1, 1),
('contact', 'main-menu', '/site/contact', '', NULL, 1, 6, NULL, NULL, 1, NULL),
('contact-users', 'admin-menu', '/contact/default/index', '', 'users', 0, 19, 1545854511, 1545854531, 1, 1),
('dashboard', 'admin-menu', '/', '', 'th', 0, 0, NULL, NULL, 1, NULL),
('eav-attribute', 'admin-menu', '/eav/attribute/index', 'eav', NULL, 0, 18, NULL, NULL, 1, NULL),
('eav-eav', 'admin-menu', '/eav/default/index', 'eav', NULL, 0, 17, NULL, NULL, 1, NULL),
('eav-model', 'admin-menu', '/eav/entity-model/index', 'eav', NULL, 0, 20, NULL, NULL, 1, NULL),
('eav-option', 'admin-menu', '/eav/attribute-option/index', 'eav', NULL, 0, 19, NULL, NULL, 1, NULL),
('eav-type', 'admin-menu', '/eav/attribute-type/index', 'eav', NULL, 0, 21, NULL, NULL, 1, NULL),
('event', 'admin-menu', '', '', 'calendar', 0, 30, 1546691552, 1546807186, 1, 1),
('event-item', 'admin-menu', '/event/default/index', 'event', '', 0, 34, 1546691606, 1547547597, 1, 1),
('event-methods', 'admin-menu', '/event/methods/index', 'event', '', 0, 38, 1546691818, 1546806941, 1, 1),
('event-place', 'admin-menu', '/event/place/index', 'event', '', 0, 35, 1546691945, 1546807290, 1, 1),
('event-practice', 'admin-menu', '/event/practice/index', 'event', '', 0, 37, 1546691867, 1546806955, 1, 1),
('event-programm', 'admin-menu', '/event/programm/index', 'event', '', 0, 33, 1546691999, 1546691999, 1, 1),
('event-schedule', 'admin-menu', '/event/schedule/index', 'event', '', 0, 31, 1546692074, 1546807163, 1, 1),
('event-vid', 'admin-menu', '/event/vid/index', 'event', '', 0, 36, 1546691902, 1546691902, 1, 1),
('feedback', 'admin-menu', '/section/feedback/index', 'landing-page', '', 0, 29, 1549635790, 1549635790, 1, 1),
('image-settings', 'admin-menu', '/media/default/settings', 'settings', NULL, 0, 42, NULL, NULL, 1, NULL),
('landing-page', 'admin-menu', '', '', 'sun-o', 0, 20, 1548271267, 1548365112, 1, 1),
('media', 'admin-menu', NULL, '', 'image', 0, 6, NULL, NULL, 1, NULL),
('media-album', 'admin-menu', '/media/album/index', 'media', NULL, 0, 8, NULL, NULL, 1, NULL),
('media-category', 'admin-menu', '/media/category/index', 'media', NULL, 0, 9, NULL, NULL, 1, NULL),
('media-media', 'admin-menu', '/media/default/index', 'media', NULL, 0, 7, NULL, NULL, 1, NULL),
('menu', 'admin-menu', '/menu/default/index', '', 'align-justify', 0, 11, NULL, NULL, 1, NULL),
('menu_portfolio', 'admin-menu', '/portfolio/menu/index', 'portfolio_main', '', 0, 27, 1548922544, 1548922544, 1, 1),
('page', 'admin-menu', '/page/default/index', '', 'file', 0, 1, NULL, NULL, 1, NULL),
('paralax', 'admin-menu', '/section/parallax/index', 'landing-page', '', 0, 23, 1548333227, 1548340198, 1, 1),
('portfolio', 'admin-menu', '/portfolio/default/index', 'portfolio_main', '', 0, 26, 1548880921, 1548923248, 1, 1),
('portfolio_category', 'admin-menu', '/portfolio/category/index', 'portfolio_main', '', 0, 28, 1548880996, 1549574144, 1, 1),
('portfolio_main', 'admin-menu', '/portfolio/default/index', 'landing-page', '', 0, 25, 1548922592, 1548923360, 1, 1),
('post', 'admin-menu', '', '', 'pencil', 0, 2, NULL, 1545053615, 1, 1),
('post-category', 'admin-menu', '/post/category/index', 'post', NULL, 0, 5, NULL, NULL, 1, NULL),
('post-post', 'admin-menu', '/post/default/index', 'post', '', 0, 3, NULL, 1545053627, 1, 1),
('post-tag', 'admin-menu', '/post/tag/index', 'post', '', 0, 4, NULL, 1544638544, 1, 1),
('revolution-sliders', 'admin-menu', '/section/slides/index', 'landing-page', '', 0, 22, 1548269000, 1549572851, 1, 1),
('seo', 'admin-menu', '/seo/default/index', '', 'line-chart', 0, 18, NULL, NULL, 1, NULL),
('settings', 'admin-menu', NULL, '', 'cog', 0, 39, NULL, NULL, 1, NULL),
('settings-cache', 'admin-menu', '/settings/cache/flush', 'settings', NULL, 0, 45, NULL, NULL, 1, NULL),
('settings-general', 'admin-menu', '/settings/default/index', 'settings', NULL, 0, 40, NULL, NULL, 1, NULL),
('settings-reading', 'admin-menu', '/settings/reading/index', 'settings', NULL, 0, 41, NULL, NULL, 1, NULL),
('settings-translations', 'admin-menu', '/translation/default/index', 'settings', NULL, 0, 43, NULL, NULL, 1, NULL),
('test-page', 'main-menu', '/site/author-course', '', '', 1, 2, NULL, 1545840778, 1, 1),
('user', 'admin-menu', NULL, '', 'user', 0, 12, NULL, NULL, 1, NULL),
('user-groups', 'admin-menu', '/user/permission-groups/index', 'user', NULL, 0, 16, NULL, NULL, 1, NULL),
('user-log', 'admin-menu', '/user/visit-log/index', 'user', NULL, 0, 17, NULL, NULL, 1, NULL),
('user-permission', 'admin-menu', '/user/permission/index', 'user', NULL, 0, 15, NULL, NULL, 1, NULL),
('user-role', 'admin-menu', '/user/role/index', 'user', NULL, 0, 14, NULL, NULL, 1, NULL),
('user-user', 'admin-menu', '/user/default/index', 'user', NULL, 0, 13, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_link_lang`
--

CREATE TABLE `menu_link_lang` (
  `id` int(11) NOT NULL,
  `link_id` varchar(64) NOT NULL,
  `language` varchar(6) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_link_lang`
--

INSERT INTO `menu_link_lang` (`id`, `link_id`, `language`, `label`) VALUES
(1, 'dashboard', 'en-US', 'Dashboard'),
(2, 'settings', 'en-US', 'Settings'),
(3, 'settings-general', 'en-US', 'General Settings'),
(4, 'settings-reading', 'en-US', 'Reading Settings'),
(5, 'settings-cache', 'en-US', 'Flush Cache'),
(6, 'menu', 'en-US', 'Menus'),
(7, 'comment', 'en-US', 'Comments'),
(8, 'user', 'en-US', 'Users'),
(9, 'user-groups', 'en-US', 'Permission groups'),
(10, 'user-log', 'en-US', 'Visit log'),
(11, 'user-permission', 'en-US', 'Permissions'),
(12, 'user-role', 'en-US', 'Roles'),
(13, 'user-user', 'en-US', 'Users'),
(14, 'post', 'en-US', 'Posts'),
(15, 'post-post', 'en-US', 'Posts'),
(16, 'post-category', 'en-US', 'Categories'),
(17, 'media', 'en-US', 'Media'),
(18, 'media-media', 'en-US', 'Media'),
(19, 'media-album', 'en-US', 'Albums'),
(20, 'media-category', 'en-US', 'Categories'),
(21, 'image-settings', 'en-US', 'Image Settings'),
(22, 'page', 'en-US', 'Pages'),
(23, 'settings-translations', 'en-US', 'Message Translation'),
(24, 'seo', 'en-US', 'SEO'),
(25, 'post-tag', 'en-US', 'Tags'),
(27, 'about', 'en-US', 'About'),
(28, 'test-page', 'en-US', 'Test Page'),
(29, 'contact', 'en-US', 'Contact'),
(31, 'eav-eav', 'en-US', 'Fields'),
(32, 'eav-attribute', 'en-US', 'Attributes'),
(33, 'eav-option', 'en-US', 'Options'),
(34, 'eav-model', 'en-US', 'Models'),
(35, 'eav-type', 'en-US', 'Types'),
(37, 'about', 'ru', 'Обо мне'),
(38, 'test-page', 'ru', 'Авторский курс'),
(39, 'contact', 'ru', 'Контакты'),
(40, 'comment', 'ru', 'Комментарии'),
(41, 'dashboard', 'ru', 'Главная'),
(42, 'media', 'ru', 'Медиа'),
(43, 'media-media', 'ru', 'Медиа'),
(44, 'media-album', 'ru', 'Альбомы'),
(45, 'media-category', 'ru', 'Категории'),
(46, 'image-settings', 'ru', 'Настройки Изображений'),
(47, 'menu', 'ru', 'Меню'),
(48, 'page', 'ru', 'Страницы'),
(49, 'post', 'ru', 'Посты'),
(50, 'post-post', 'ru', 'Посты'),
(51, 'post-category', 'ru', 'Категории'),
(52, 'settings', 'ru', 'Настройки'),
(53, 'settings-general', 'ru', 'Общие Настройки'),
(54, 'settings-reading', 'ru', 'Настройки Чтения'),
(55, 'settings-cache', 'ru', 'Очистить Кэш'),
(56, 'settings-translations', 'ru', 'Перевод Сообщений'),
(57, 'user', 'ru', 'Пользователи'),
(58, 'user-groups', 'ru', 'Группы Прав Доступа'),
(59, 'user-log', 'ru', 'Лог Посещений'),
(60, 'user-permission', 'ru', 'Права Доступа'),
(61, 'user-role', 'ru', 'Роли Пользователей'),
(62, 'user-user', 'ru', 'Пользователи'),
(63, 'seo', 'ru', 'SEO'),
(64, 'post-tag', 'ru', 'Тэги'),
(68, 'blog', 'ru', 'Блог'),
(70, 'bd', 'ru', 'База данных'),
(72, 'consult', 'ru', '30 встреч'),
(73, 'contact-users', 'ru', 'Контакты'),
(74, 'event', 'ru', 'Занятия'),
(75, 'event-item', 'ru', 'Занятия'),
(77, 'event-methods', 'ru', 'Методы занятий'),
(78, 'event-practice', 'ru', 'Техники занятий'),
(79, 'event-vid', 'ru', 'Виды занятий'),
(80, 'event-place', 'ru', 'Места проведения'),
(81, 'event-programm', 'ru', 'Программы занятий'),
(82, 'event-schedule', 'ru', 'Расписание занятий'),
(84, 'calendar', 'ru', 'Календарь мероприятий'),
(85, 'revolution-sliders', 'ru', 'Слайды топ'),
(86, 'landing-page', 'ru', 'Управление контентом'),
(87, 'paralax', 'ru', 'УТП Параллакс'),
(88, 'carousel', 'ru', 'Карусель'),
(89, 'portfolio', 'ru', 'Портфолио содержание'),
(90, 'portfolio_category', 'ru', 'Категория портфолио'),
(91, 'menu_portfolio', 'ru', 'Меню портфолио'),
(92, 'portfolio_main', 'ru', 'Портфолио'),
(93, 'feedback', 'ru', 'Отзывы клиентов'),
(94, 'active_pages', 'ru', 'Активные страницы');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `language` varchar(16) NOT NULL,
  `translation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `source_id`, `language`, `translation`) VALUES
(130, 253, 'ru', 'Вы уверены, что желаете удалить изображение Вашего профиля?'),
(131, 254, 'ru', 'Вы уверены, что хотите отключить эту авторизацию?'),
(132, 255, 'ru', 'Ошибка авторизации.'),
(133, 256, 'ru', 'Авторизация'),
(134, 257, 'ru', 'Сервис авторизации.'),
(135, 258, 'ru', 'Captcha'),
(136, 259, 'ru', 'Изменить изображение профиля'),
(137, 260, 'ru', 'Проверьте ваш e-mail для дальнейших инструкций'),
(138, 261, 'ru', 'Проверьте ваш e-mail {email} для получения инструкций по активации аккаунта'),
(139, 262, 'ru', 'Нажмите, чтобы подключиться к службе '),
(140, 263, 'ru', 'Нажмите, чтобы отменить связь с сервисом '),
(141, 264, 'ru', 'Подтвердить E-mail '),
(142, 265, 'ru', 'Подтвердить '),
(143, 266, 'ru', 'Не удалось отправить подтверждение по электронной почте '),
(144, 267, 'ru', 'Текущий пароль'),
(145, 268, 'ru', 'Подтверждение по электронной почте для'),
(146, 269, 'ru', 'E-mail подтвержден'),
(147, 270, 'ru', 'Неверный адрес электронной почты '),
(148, 271, 'ru', 'Письмо со ссылкой активации отправлено на {email}. Срок действия этой ссылки истекает через {минут} мин. '),
(149, 272, 'ru', 'E-mail'),
(150, 273, 'ru', 'Забыли пароль?'),
(151, 274, 'ru', 'Неверное имя пользователя или пароль'),
(152, 275, 'ru', 'Логин занят'),
(153, 276, 'ru', 'Логин'),
(154, 277, 'ru', 'Выход'),
(155, 278, 'ru', 'Авторизация не доступна'),
(156, 279, 'ru', 'Пароль обновлен'),
(157, 280, 'ru', 'Восстановление пароля '),
(158, 281, 'ru', 'Сброс пароля для'),
(159, 282, 'ru', 'Пароль'),
(160, 283, 'ru', 'Регистрация - подтвердите ваш e-mail'),
(161, 284, 'ru', 'Регистрация'),
(162, 285, 'ru', 'Запомнить меня'),
(163, 286, 'ru', 'Удалить изображение профиля '),
(164, 287, 'ru', 'Повторите пароль'),
(165, 288, 'ru', 'Сбросить пароль'),
(166, 289, 'ru', 'Сбросить'),
(167, 290, 'ru', 'Сохранить профиль '),
(168, 291, 'ru', 'Сохранить изображение профиля '),
(169, 292, 'ru', 'Установить пароль '),
(170, 293, 'ru', 'Задать Имя Пользователя'),
(171, 294, 'ru', 'Регистрация'),
(172, 295, 'ru', 'Этот адрес электронной почты уже существует '),
(173, 296, 'ru', 'Токен не найден. Он может быть просрочен '),
(174, 297, 'ru', 'Токен не найден. Он может быть просрочен. Попробуйте сбросить пароль еще раз'),
(175, 298, 'ru', 'Слишком много попыток '),
(176, 299, 'ru', 'Не удается отправить сообщение по электронной почте'),
(177, 300, 'ru', 'Изменить пароль'),
(178, 301, 'ru', 'Профиль'),
(179, 302, 'ru', 'Пользователь с тем же адресом электронной почты, что и в учетной записи {client}, уже существует, но не связан с ним. Войдите, используя электронную почту, чтобы связать его.'),
(180, 303, 'ru', 'Логин должен содержать только латинские буквы, цифры и следующие символы: \"-\" и \"_\". '),
(181, 304, 'ru', 'Логин содержит недопустимые символы или слова.'),
(182, 305, 'ru', 'Неверный пароль '),
(183, 306, 'ru', 'Вы не можете войти с этого IP'),
(201, 1, 'ru', '--- С выбранным ---'),
(202, 2, 'ru', 'Активировать'),
(203, 3, 'ru', 'Активные'),
(204, 4, 'ru', 'Добавить'),
(205, 5, 'ru', 'Все'),
(206, 6, 'ru', 'Всегда Видимый'),
(207, 7, 'ru', 'Произошла неизвестная ошибка.'),
(208, 8, 'ru', 'Подтверждено'),
(209, 9, 'ru', 'Автор'),
(210, 10, 'ru', 'Заблокирован'),
(211, 11, 'ru', 'Привязка к IP'),
(212, 12, 'ru', 'Выбрать'),
(213, 13, 'ru', 'Браузер'),
(214, 14, 'ru', 'Отменить'),
(215, 15, 'ru', 'Категория'),
(216, 16, 'ru', 'Очистить Фильтры'),
(217, 17, 'ru', 'Закрыто'),
(218, 18, 'ru', 'Код'),
(219, 19, 'ru', 'Статус Комментариев'),
(220, 20, 'ru', 'Активность Комментариев'),
(221, 21, 'ru', 'Подтвердить'),
(222, 22, 'ru', 'Код Подтверждения'),
(223, 23, 'ru', 'Содержание'),
(224, 24, 'ru', 'Панель Управления'),
(225, 25, 'ru', 'Создать {item}'),
(226, 26, 'ru', 'Создать'),
(227, 27, 'ru', 'Создал'),
(228, 28, 'ru', 'Создано'),
(229, 29, 'ru', 'Панель Управления'),
(230, 30, 'ru', 'Данные'),
(231, 31, 'ru', 'Деактивировать'),
(232, 32, 'ru', 'Язык по умолчанию'),
(233, 33, 'ru', 'Значение по умолчанию'),
(234, 34, 'ru', 'Удалить'),
(235, 35, 'ru', 'Описание'),
(236, 36, 'ru', 'E-mail подтвержден'),
(237, 37, 'ru', 'E-mail'),
(238, 38, 'ru', 'Редактировать'),
(239, 39, 'ru', 'Ошибка'),
(240, 40, 'ru', 'Например'),
(241, 41, 'ru', 'Группа'),
(242, 42, 'ru', 'ID'),
(243, 43, 'ru', 'IP'),
(244, 44, 'ru', 'Иконка'),
(245, 45, 'ru', 'Неактивные'),
(246, 46, 'ru', 'Вставить'),
(247, 47, 'ru', 'Неверные настройки для виджетов панели управления'),
(248, 48, 'ru', 'Ключ'),
(249, 49, 'ru', 'Надпись'),
(250, 50, 'ru', 'Язык'),
(251, 51, 'ru', 'ID ссылки может содержать только строчные буквы, цифры, подчеркивание и тире.'),
(252, 52, 'ru', 'Ссылка'),
(253, 53, 'ru', 'Логин'),
(254, 54, 'ru', 'Выйти {username}'),
(255, 55, 'ru', 'ID меню может содержать только строчные буквы, цифры, подчеркивание и тире.'),
(256, 56, 'ru', 'Меню'),
(257, 57, 'ru', 'Название'),
(258, 58, 'ru', 'Нет Родительского Элемента'),
(259, 59, 'ru', 'Комментарии не найдены.'),
(260, 60, 'ru', 'Не Выбрано'),
(261, 61, 'ru', 'OK'),
(262, 62, 'ru', 'ОС'),
(263, 63, 'ru', 'Открыто'),
(264, 64, 'ru', 'Порядок'),
(265, 65, 'ru', 'Версия PHP'),
(266, 66, 'ru', 'Родительская Ссылка'),
(267, 67, 'ru', 'Пароль'),
(268, 68, 'ru', 'Не опубликовано'),
(269, 69, 'ru', 'Обработка данных'),
(270, 70, 'ru', 'Опубликовать'),
(271, 71, 'ru', 'Опубликовано'),
(272, 72, 'ru', 'Читать дальше...'),
(273, 73, 'ru', 'Записей на странице'),
(274, 74, 'ru', 'IP Регистрации'),
(275, 75, 'ru', 'Повторите пароль'),
(276, 76, 'ru', 'Обязательный'),
(277, 77, 'ru', 'Ревизия'),
(278, 78, 'ru', 'Роль'),
(279, 79, 'ru', 'Роли'),
(280, 80, 'ru', 'Правило'),
(281, 81, 'ru', 'Сохранить Все'),
(282, 82, 'ru', 'Сохранить'),
(283, 83, 'ru', 'Сохранено'),
(284, 84, 'ru', 'Настройки'),
(285, 85, 'ru', 'Размер'),
(286, 86, 'ru', 'Ссылка'),
(287, 87, 'ru', 'Спам'),
(288, 88, 'ru', 'Старт'),
(289, 89, 'ru', 'Статус'),
(290, 90, 'ru', 'Суперадмин'),
(291, 91, 'ru', 'Подробности Системы'),
(292, 92, 'ru', 'Изменения были успешно сохранены.'),
(293, 93, 'ru', 'Этот e-mail уже занят'),
(294, 94, 'ru', 'Заголовок'),
(295, 95, 'ru', 'Токен'),
(296, 96, 'ru', 'Корзина'),
(297, 97, 'ru', 'Тип'),
(298, 98, 'ru', 'URL'),
(299, 99, 'ru', 'Отменить Публикацию'),
(300, 100, 'ru', 'Обновить \"{item}\"'),
(301, 101, 'ru', 'Обновить'),
(302, 102, 'ru', 'Обновил'),
(303, 103, 'ru', 'Обновлено'),
(304, 104, 'ru', 'Загружено'),
(305, 105, 'ru', 'Данные Устройства'),
(306, 106, 'ru', 'Пользователь'),
(307, 107, 'ru', 'Имя пользователя'),
(308, 108, 'ru', 'Значение'),
(309, 109, 'ru', 'Просмотр'),
(310, 110, 'ru', 'Видимый'),
(311, 111, 'ru', 'Время Посещения'),
(312, 112, 'ru', 'Неправильный формат. Введите действительные IP-адреса через запятую'),
(313, 113, 'ru', 'Версия Yee CMS'),
(314, 114, 'ru', 'Версия Ядра Yee'),
(315, 115, 'ru', 'Версия Yii Framework'),
(316, 116, 'ru', 'Запись успешно обновлена.'),
(317, 117, 'ru', 'Запись успешно создана.'),
(318, 118, 'ru', 'Запись успешно удалена.'),
(319, 119, 'ru', 'Мужчина'),
(320, 120, 'ru', 'Женщина'),
(321, 121, 'ru', 'Имя'),
(322, 122, 'ru', 'Фамилия'),
(323, 123, 'ru', 'Skype'),
(324, 124, 'ru', 'Телефон'),
(325, 125, 'ru', 'Пол'),
(326, 126, 'ru', 'День рождения'),
(327, 127, 'ru', 'Месяц рождения'),
(328, 128, 'ru', 'Год рождения'),
(329, 129, 'ru', 'Краткая информация'),
(330, 130, 'ru', 'Добавить Источник Сообщения'),
(331, 131, 'ru', 'Категория'),
(332, 132, 'ru', 'Создать Сообщение'),
(333, 133, 'ru', 'Создать Новую Категори'),
(334, 134, 'ru', 'Неизменный'),
(335, 135, 'ru', 'Перевод Сообщений'),
(336, 136, 'ru', 'Название Новой Категории'),
(337, 137, 'ru', 'Выберите группу сообщений и язык для отображения переводов...'),
(338, 138, 'ru', 'Сообщение'),
(339, 139, 'ru', 'Обновить Сообщение'),
(340, 140, 'ru', '{n, plural, =1{1 запись} other{# записей}}'),
(341, 141, 'ru', 'Добавить файлы'),
(342, 142, 'ru', 'Альбом'),
(343, 143, 'ru', 'Альбомы'),
(344, 144, 'ru', 'Все Медиа Файлы'),
(345, 145, 'ru', 'Alt Текст'),
(346, 146, 'ru', 'Вернуться к файловому менеджеру'),
(347, 147, 'ru', 'Отменить загрузку'),
(348, 148, 'ru', 'Категории'),
(349, 149, 'ru', 'Категория'),
(350, 150, 'ru', 'Изменения были сохранены.'),
(351, 151, 'ru', 'Изменения не были сохранены.'),
(352, 152, 'ru', 'Создать Категорию'),
(353, 153, 'ru', 'Текущие размеры миниатюр'),
(354, 154, 'ru', 'Размер'),
(355, 155, 'ru', 'Перестроить изображения'),
(356, 156, 'ru', 'Размер файла'),
(357, 157, 'ru', 'Название файла'),
(358, 158, 'ru', 'Если вы измените размеры миниатюр, настоятельно рекомендуется перестроить их.'),
(359, 159, 'ru', 'Настройка изображений'),
(360, 160, 'ru', 'Большой размер'),
(361, 161, 'ru', 'Управление альбомами'),
(362, 162, 'ru', 'Управление Категориями'),
(363, 163, 'ru', 'Активность Медиа'),
(364, 164, 'ru', 'Детали'),
(365, 165, 'ru', 'Медиа'),
(366, 166, 'ru', 'Средний размер'),
(367, 167, 'ru', 'Изображения не найдены.'),
(368, 168, 'ru', 'Оригинал'),
(369, 169, 'ru', 'Пожалуйста, выберите файл для просмотра деталей.'),
(370, 170, 'ru', 'Выберите размер файла'),
(371, 171, 'ru', 'Малый размер'),
(372, 173, 'ru', 'Начать загрузку'),
(373, 174, 'ru', 'Настройка миниатюр'),
(374, 175, 'ru', 'Миниатюры успешно сохранены'),
(375, 176, 'ru', 'Миниатюры'),
(376, 177, 'ru', 'Обновить Категорию'),
(377, 178, 'ru', 'Обновил'),
(378, 179, 'ru', 'Загрузить файл'),
(379, 180, 'ru', 'Загрузил'),
(380, 181, 'ru', 'Меню'),
(381, 182, 'ru', 'Меню'),
(382, 183, 'ru', 'ID ссылки может содержать только строчные буквы, цифры, подчеркивание и тире.'),
(383, 184, 'ru', 'Родительская Ссылка'),
(384, 185, 'ru', 'Всегда Видимый'),
(385, 186, 'ru', 'Нет Родительской Ссылка'),
(386, 187, 'ru', 'Создать Ссылку'),
(387, 188, 'ru', 'Обновить Ссылка'),
(388, 189, 'ru', 'Ссылки'),
(389, 190, 'ru', 'Добавить Меню'),
(390, 191, 'ru', 'Добавить Ссылку'),
(391, 192, 'ru', 'Ошибка при сохранении меню!'),
(392, 193, 'ru', 'Изменения были успешно сохранены.'),
(393, 194, 'ru', 'Пожалуйста, выберите меню для просмотра списка ссылок...'),
(394, 195, 'ru', 'Выбранное меню не содержит ни одной ссылки. Нажмите кнопку \"Добавить Ссылку\", чтобы создать новую ссылку для этого меню.'),
(395, 196, 'ru', 'Страница'),
(396, 197, 'ru', 'Страницы'),
(397, 198, 'ru', 'Cоздать Страницу'),
(398, 202, 'ru', 'Пост'),
(399, 203, 'ru', 'Опубликировано в '),
(400, 204, 'ru', 'Активность Записей'),
(401, 205, 'ru', 'Посты'),
(402, 208, 'ru', 'Эскиз'),
(403, 307, 'ru', 'Создать SEO запись'),
(404, 308, 'ru', 'Следовать ссылке'),
(405, 309, 'ru', 'Индексировать'),
(406, 310, 'ru', 'Ключевые слова'),
(407, 311, 'ru', 'SEO'),
(408, 312, 'ru', 'Поисковая оптимизаци'),
(409, 313, 'ru', 'Обновить SEO запись'),
(410, 209, 'ru', 'Общие Настройки'),
(411, 210, 'ru', 'Настройки Чтения'),
(412, 211, 'ru', 'Название Сайта'),
(413, 212, 'ru', 'Описание Сайта'),
(414, 213, 'ru', 'E-mail Администратора'),
(415, 214, 'ru', 'Часовой Пояс'),
(416, 215, 'ru', 'Формат Даты'),
(417, 216, 'ru', 'Формат Времени'),
(418, 217, 'ru', 'Записей на странице'),
(419, 218, 'ru', 'Включенные права доступа'),
(420, 219, 'ru', 'Включенные роли'),
(421, 220, 'ru', 'Создать Группу Прав Доступа'),
(422, 221, 'ru', 'Создать Право Доступа'),
(423, 222, 'ru', 'Создать Роль'),
(424, 223, 'ru', 'Создать Пользователя'),
(425, 224, 'ru', 'Посещение №{id}'),
(426, 225, 'ru', 'Пользователей не найдено.'),
(427, 226, 'ru', 'Пароль'),
(428, 227, 'ru', 'Группы Прав Доступа'),
(429, 228, 'ru', 'Прав Доступа'),
(430, 229, 'ru', 'Права доступа для роли \"{role}\"'),
(431, 230, 'ru', 'Права доступа'),
(432, 231, 'ru', 'Обновить пути'),
(433, 232, 'ru', 'Дата регистрации'),
(434, 233, 'ru', 'Роль'),
(435, 234, 'ru', 'Роли и Права доступа для \"{user}\"'),
(436, 235, 'ru', 'Роли'),
(437, 236, 'ru', 'Маршруты'),
(438, 237, 'ru', 'Поиск маршрутов'),
(439, 238, 'ru', 'Показать все'),
(440, 239, 'ru', 'Показать только избранные'),
(441, 240, 'ru', 'Обновить Группу прав доступа'),
(442, 241, 'ru', 'Обновить право доступа'),
(443, 242, 'ru', 'Обновить Роль'),
(444, 243, 'ru', 'Обновить Пароль пользователя'),
(445, 244, 'ru', 'Обновить пользователя'),
(446, 245, 'ru', 'Пользователь не найден'),
(447, 246, 'ru', 'Пользователь'),
(448, 247, 'ru', 'Пользователи'),
(449, 248, 'ru', 'Лог Посещения'),
(450, 249, 'ru', 'Вы не можете изменить собственные права доступа'),
(451, 250, 'ru', 'Вы не можете изменить собственные права доступа!'),
(452, 251, 'ru', 'Настройки прав доступа \"{permission}\"'),
(453, 252, 'ru', 'Настройки роли \"{permission}\"'),
(454, 172, 'ru', 'Извините, [{filetype}] тип файла не разрешен!'),
(455, 199, 'ru', 'Создать тэг'),
(456, 200, 'ru', 'Изменить тэг'),
(457, 201, 'ru', 'Постов не найдено'),
(458, 206, 'ru', 'Тэг'),
(459, 207, 'ru', 'Тэги'),
(460, 314, 'ru', 'Пожалуйста подтвердите, что Вы не робот.'),
(462, 316, 'ru', 'Поиск блога'),
(463, 317, 'ru', 'Разделы блога'),
(464, 318, 'ru', 'Ключевые слова'),
(465, 319, 'ru', 'Самое популярное'),
(466, 320, 'ru', 'Последние комментарии'),
(467, 321, 'ru', 'Последние работы'),
(468, 322, 'ru', 'Развернуть Все'),
(469, 323, 'ru', 'Свернуть Все'),
(470, 324, 'ru', 'Благодарим Вас за обращение к нам. Мы ответим вам в кратчайшие сроки.'),
(471, 325, 'ru', 'Произошла ошибка при отправке электронной почты.'),
(472, 326, 'ru', 'Для сброса пароля перейдите по ссылке ниже:'),
(473, 327, 'ru', 'Здравствуйте:'),
(474, 328, 'ru', 'Полное имя'),
(475, 329, 'ru', 'Контакты'),
(476, 330, 'ru', 'Сообщение для'),
(477, 331, 'ru', 'Обо мне'),
(478, 332, 'ru', 'Блог'),
(479, 333, 'ru', 'Подписаться на новости'),
(480, 334, 'ru', 'Подписка'),
(481, 335, 'ru', 'Не подписан'),
(482, 336, 'ru', 'Подписан'),
(483, 337, 'ru', 'Узнать больше...'),
(484, 338, 'ru', 'Оставить отзыв...'),
(485, 339, 'ru', 'Подписаться'),
(486, 340, 'ru', 'Записаться на занятие'),
(487, 341, 'ru', 'Записаться на встречу'),
(488, 342, 'ru', 'Записаться...'),
(489, 343, 'ru', 'Контакты'),
(490, 344, 'ru', 'На главной'),
(491, 345, 'ru', 'На главной'),
(492, 346, 'ru', 'Перейдите по ссылке, чтобы подтвердить свой email:'),
(493, 347, 'ru', 'Для сброса пароля перейдите по ссылке ниже:'),
(494, 348, 'ru', 'Здравствуйте:'),
(495, 349, 'ru', 'Здравствуйте, вы зарегистрированы на'),
(496, 350, 'ru', 'Следуйте этой ссылке, чтобы подтвердить свой email и активировать аккаунт:'),
(497, 351, 'ru', 'E-mail {email} подтвержден'),
(498, 352, 'ru', 'Главная'),
(499, 353, 'ru', 'Вход'),
(502, 356, 'ru', 'Номер группы'),
(503, 357, 'ru', 'ID программы'),
(504, 358, 'ru', 'ID места'),
(505, 359, 'ru', 'Время начала'),
(506, 360, 'ru', 'Время окончания'),
(507, 361, 'ru', 'Стоимость'),
(508, 362, 'ru', 'Добавлено'),
(509, 363, 'ru', 'Обновлено'),
(510, 364, 'ru', 'ID метода'),
(511, 365, 'ru', 'Вид занятия'),
(512, 366, 'ru', 'Техники занятий'),
(513, 367, 'ru', 'Методы занятий'),
(514, 368, 'ru', 'Места занятий'),
(515, 369, 'ru', 'Программа занятий'),
(517, 371, 'ru', 'Расписание занятий'),
(518, 372, 'ru', 'Занятия'),
(520, 374, 'ru', 'Время проведения'),
(521, 375, 'ru', 'минут'),
(522, 376, 'ru', 'Выберите вид занятия...'),
(523, 377, 'ru', 'Выберите метод...'),
(524, 378, 'ru', 'Список техник'),
(525, 379, 'ru', 'Кэш очищен.'),
(526, 380, 'ru', 'Не удалось очистить кэш.'),
(527, 381, 'ru', 'Вставить адрес в форму'),
(528, 382, 'ru', 'Координаты места'),
(530, 384, 'ru', 'Адрес Карты'),
(531, 388, 'ru', 'Дополнительный телефон'),
(532, 389, 'ru', 'Контактное лицо'),
(533, 390, 'ru', 'Координаты'),
(534, 391, 'ru', 'Адрес'),
(535, 392, 'ru', 'Зум карты'),
(536, 393, 'ru', 'Нажмите на карту, чтобы узнать адрес и координаты, затем нажмите кнопку, чтобы вставить адрес в форму'),
(537, 385, 'ru', 'Маска даты'),
(538, 386, 'ru', 'Маска времени'),
(539, 387, 'ru', 'Маска даты и времени'),
(540, 394, 'ru', 'Маска телефона'),
(541, 395, 'ru', 'Виды занятий'),
(543, 397, 'ru', 'Выберите занятие...'),
(544, 398, 'ru', 'Список занятий'),
(545, 399, 'ru', 'Выберите программу...'),
(546, 400, 'ru', 'Программа'),
(547, 401, 'ru', 'Участники'),
(548, 402, 'ru', 'Выберите участников...'),
(549, 403, 'ru', 'Календарь расписаний'),
(550, 404, 'ru', 'Дата начала события должна быть больше даты окончания.'),
(551, 405, 'ru', 'Место'),
(553, 407, 'ru', 'Занятие'),
(554, 408, 'ru', 'Кол-во встреч'),
(555, 409, 'ru', 'Добавить'),
(556, 410, 'ru', 'Добавить занятие'),
(557, 411, 'ru', 'Личное'),
(558, 412, 'ru', 'Индивидуальные'),
(559, 413, 'ru', 'Групповые'),
(560, 414, 'ru', 'Вид занятий'),
(561, 415, 'ru', 'Комментарий к расписанию'),
(562, 416, 'ru', 'Описание занятия'),
(563, 417, 'ru', 'Описание программы'),
(564, 418, 'ru', 'Фоновое изображение'),
(565, 419, 'ru', 'Первый баннер'),
(566, 420, 'ru', 'Средний баннер'),
(567, 421, 'ru', 'Ссылка кнопки'),
(568, 422, 'ru', 'Иконка кнопки'),
(569, 423, 'ru', 'Название кнопки'),
(570, 424, 'ru', 'Класс кнопки'),
(571, 425, 'ru', 'Сортировка'),
(572, 426, 'ru', 'Иконка кнопки'),
(573, 427, 'ru', 'Текст кнопки'),
(574, 428, 'ru', 'Класс кнопки'),
(575, 431, 'ru', 'Изображение контента'),
(576, 432, 'ru', 'Обратный отсчет'),
(577, 433, 'ru', 'Подсказка обратного отсчета'),
(578, 429, 'ru', 'Главный баннер'),
(579, 430, 'ru', 'Средний баннер'),
(580, 434, 'ru', 'Цвет фона'),
(581, 435, 'ru', 'Фоновое изображение'),
(582, 436, 'ru', 'Изображение'),
(583, 437, 'ru', 'Данные сортировки сохранены'),
(584, 442, 'ru', 'Требуется AJAX параметр.'),
(585, 438, 'ru', 'Сохранить порядок'),
(586, 439, 'ru', 'Изображение не найдено'),
(587, 440, 'ru', 'Изображение удалено.'),
(588, 441, 'ru', 'Изображение успешно добавлено.'),
(589, 443, 'ru', 'Фоновое изображение'),
(590, 444, 'ru', 'Изображение контента'),
(591, 445, 'ru', 'Слайды'),
(592, 446, 'ru', 'Параллаксы'),
(593, 447, 'ru', 'Класс'),
(594, 448, 'ru', 'Коэффициент фона'),
(595, 449, 'ru', 'Карусель'),
(596, 450, 'ru', 'Кол-во слайдов в окне'),
(600, 454, 'ru', 'Категория портфолио'),
(601, 455, 'ru', 'Портфолио'),
(602, 456, 'ru', 'Меню портфолио'),
(603, 457, 'ru', 'Миниатюра'),
(604, 458, 'ru', 'Ссылка на действие'),
(606, 460, 'ru', 'Вид деятельности'),
(607, 461, 'ru', 'Отзывы'),
(608, 462, 'ru', 'Узнать больше...');

-- --------------------------------------------------------

--
-- Структура таблицы `message_source`
--

CREATE TABLE `message_source` (
  `id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` text,
  `immutable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message_source`
--

INSERT INTO `message_source` (`id`, `category`, `message`, `immutable`) VALUES
(1, 'yee', '--- With selected ---', 1),
(2, 'yee', 'Activate', 1),
(3, 'yee', 'Active', 1),
(4, 'yee', 'Add New', 1),
(5, 'yee', 'All', 1),
(6, 'yee', 'Always Visible', 1),
(7, 'yee', 'An unknown error occurred.', 1),
(8, 'yee', 'Approved', 1),
(9, 'yee', 'Author', 1),
(10, 'yee', 'Banned', 1),
(11, 'yee', 'Bind to IP', 1),
(12, 'yee', 'Browse', 1),
(13, 'yee', 'Browser', 1),
(14, 'yee', 'Cancel', 1),
(15, 'yee', 'Category', 1),
(16, 'yee', 'Clear filters', 1),
(17, 'yee', 'Closed', 1),
(18, 'yee', 'Code', 1),
(19, 'yee', 'Comment Status', 1),
(20, 'yee', 'Comments Activity', 1),
(21, 'yee', 'Confirm', 1),
(22, 'yee', 'Confirmation Token', 1),
(23, 'yee', 'Content', 1),
(24, 'yee', 'Control Panel', 1),
(25, 'yee', 'Create {item}', 1),
(26, 'yee', 'Create', 1),
(27, 'yee', 'Created By', 1),
(28, 'yee', 'Created', 1),
(29, 'yee', 'Dashboard', 1),
(30, 'yee', 'Data', 1),
(31, 'yee', 'Deactivate', 1),
(32, 'yee', 'Default Language', 1),
(33, 'yee', 'Default Value', 1),
(34, 'yee', 'Delete', 1),
(35, 'yee', 'Description', 1),
(36, 'yee', 'E-mail confirmed', 1),
(37, 'yee', 'E-mail', 1),
(38, 'yee', 'Edit', 1),
(39, 'yee', 'Error', 1),
(40, 'yee', 'For example', 1),
(41, 'yee', 'Group', 1),
(42, 'yee', 'ID', 1),
(43, 'yee', 'IP', 1),
(44, 'yee', 'Icon', 1),
(45, 'yee', 'Inactive', 1),
(46, 'yee', 'Insert', 1),
(47, 'yee', 'Invalid settings for dashboard widgets', 1),
(48, 'yee', 'Key', 1),
(49, 'yee', 'Label', 1),
(50, 'yee', 'Language', 1),
(51, 'yee', 'Link ID can only contain lowercase alphanumeric characters, underscores and dashes.', 1),
(52, 'yee', 'Link', 1),
(53, 'yee', 'Login', 1),
(54, 'yee', 'Logout {username}', 1),
(55, 'yee', 'Menu ID can only contain lowercase alphanumeric characters, underscores and dashes.', 1),
(56, 'yee', 'Menu', 1),
(57, 'yee', 'Name', 1),
(58, 'yee', 'No Parent', 1),
(59, 'yee', 'No comments found.', 1),
(60, 'yee', 'Not Selected', 1),
(61, 'yee', 'OK', 1),
(62, 'yee', 'OS', 1),
(63, 'yee', 'Open', 1),
(64, 'yee', 'Order', 1),
(65, 'yee', 'PHP Version', 1),
(66, 'yee', 'Parent Link', 1),
(67, 'yee', 'Password', 1),
(68, 'yee', 'Pending', 1),
(69, 'yee', 'Processing', 1),
(70, 'yee', 'Publish', 1),
(71, 'yee', 'Published', 1),
(72, 'yee', 'Read more...', 1),
(73, 'yee', 'Records per page', 1),
(74, 'yee', 'Registration IP', 1),
(75, 'yee', 'Repeat password', 1),
(76, 'yee', 'Required', 1),
(77, 'yee', 'Revision', 1),
(78, 'yee', 'Role', 1),
(79, 'yee', 'Roles', 1),
(80, 'yee', 'Rule', 1),
(81, 'yee', 'Save All', 1),
(82, 'yee', 'Save', 1),
(83, 'yee', 'Saved', 1),
(84, 'yee', 'Settings', 1),
(85, 'yee', 'Size', 1),
(86, 'yee', 'Slug', 1),
(87, 'yee', 'Spam', 1),
(88, 'yee', 'Start', 1),
(89, 'yee', 'Status', 1),
(90, 'yee', 'Superadmin', 1),
(91, 'yee', 'System Info', 1),
(92, 'yee', 'The changes have been saved.', 1),
(93, 'yee', 'This e-mail already exists', 1),
(94, 'yee', 'Title', 1),
(95, 'yee', 'Token', 1),
(96, 'yee', 'Trash', 1),
(97, 'yee', 'Type', 1),
(98, 'yee', 'URL', 1),
(99, 'yee', 'Unpublish', 1),
(100, 'yee', 'Update \"{item}\"', 1),
(101, 'yee', 'Update', 1),
(102, 'yee', 'Updated By', 1),
(103, 'yee', 'Updated', 1),
(104, 'yee', 'Uploaded', 1),
(105, 'yee', 'User agent', 1),
(106, 'yee', 'User', 1),
(107, 'yee', 'Username', 1),
(108, 'yee', 'Value', 1),
(109, 'yee', 'View', 1),
(110, 'yee', 'Visible', 1),
(111, 'yee', 'Visit Time', 1),
(112, 'yee', 'Wrong format. Enter valid IPs separated by comma', 1),
(113, 'yee', 'Yee CMS Version', 1),
(114, 'yee', 'Yee Core Version', 1),
(115, 'yee', 'Yii Framework Version', 1),
(116, 'yee', 'Your item has been updated.', 1),
(117, 'yee', 'Your item has been created.', 1),
(118, 'yee', 'Your item has been deleted.', 1),
(119, 'yee', 'Male', 1),
(120, 'yee', 'Female', 1),
(121, 'yee', 'First Name', 1),
(122, 'yee', 'Last Name', 1),
(123, 'yee', 'Skype', 1),
(124, 'yee', 'Phone', 1),
(125, 'yee', 'Gender', 1),
(126, 'yee', 'Birthday', 1),
(127, 'yee', 'Birth month', 1),
(128, 'yee', 'Birth year', 1),
(129, 'yee', 'Short Info', 1),
(130, 'yee/translation', 'Add New Source Message', 1),
(131, 'yee/translation', 'Category', 1),
(132, 'yee/translation', 'Create Message Source', 1),
(133, 'yee/translation', 'Create New Category', 1),
(134, 'yee/translation', 'Immutable', 1),
(135, 'yee/translation', 'Message Translation', 1),
(136, 'yee/translation', 'New Category Name', 1),
(137, 'yee/translation', 'Please, select message group and language to view translations...', 1),
(138, 'yee/translation', 'Source Message', 1),
(139, 'yee/translation', 'Update Message Source', 1),
(140, 'yee/translation', '{n, plural, =1{1 message} other{# messages}}', 1),
(141, 'yee/media', 'Add files', 1),
(142, 'yee/media', 'Album', 1),
(143, 'yee/media', 'Albums', 1),
(144, 'yee/media', 'All Media Items', 1),
(145, 'yee/media', 'Alt Text', 1),
(146, 'yee/media', 'Back to file manager', 1),
(147, 'yee/media', 'Cancel upload', 1),
(148, 'yee/media', 'Categories', 1),
(149, 'yee/media', 'Category', 1),
(150, 'yee/media', 'Changes have been saved.', 1),
(151, 'yee/media', 'Changes haven\'t been saved.', 1),
(152, 'yee/media', 'Create Category', 1),
(153, 'yee/media', 'Current thumbnail sizes', 1),
(154, 'yee/media', 'Dimensions', 1),
(155, 'yee/media', 'Do resize thumbnails', 1),
(156, 'yee/media', 'File Size', 1),
(157, 'yee/media', 'Filename', 1),
(158, 'yee/media', 'If you change the thumbnails sizes, it is strongly recommended resize image thumbnails.', 1),
(159, 'yee/media', 'Image Settings', 1),
(160, 'yee/media', 'Large size', 1),
(161, 'yee/media', 'Manage Albums', 1),
(162, 'yee/media', 'Manage Categories', 1),
(163, 'yee/media', 'Media Activity', 1),
(164, 'yee/media', 'Media Details', 1),
(165, 'yee/media', 'Media', 1),
(166, 'yee/media', 'Medium size', 1),
(167, 'yee/media', 'No images found.', 1),
(168, 'yee/media', 'Original', 1),
(169, 'yee/media', 'Please, select file to view details.', 1),
(170, 'yee/media', 'Select image size', 1),
(171, 'yee/media', 'Small size', 1),
(172, 'yee/media', 'Sorry, [{filetype}] file type is not permitted!', 1),
(173, 'yee/media', 'Start upload', 1),
(174, 'yee/media', 'Thumbnails settings', 1),
(175, 'yee/media', 'Thumbnails sizes has been resized successfully!', 1),
(176, 'yee/media', 'Thumbnails', 1),
(177, 'yee/media', 'Update Category', 1),
(178, 'yee/media', 'Updated By', 1),
(179, 'yee/media', 'Upload New File', 1),
(180, 'yee/media', 'Uploaded By', 1),
(181, 'yee/menu', 'Menu', 1),
(182, 'yee/menu', 'Menus', 1),
(183, 'yee/menu', 'Link ID can only contain lowercase alphanumeric characters, underscores and dashes.', 1),
(184, 'yee/menu', 'Parent Link', 1),
(185, 'yee/menu', 'Always Visible', 1),
(186, 'yee/menu', 'No Parent', 1),
(187, 'yee/menu', 'Create Menu Link', 1),
(188, 'yee/menu', 'Update Menu Link', 1),
(189, 'yee/menu', 'Menu Links', 1),
(190, 'yee/menu', 'Add New Menu', 1),
(191, 'yee/menu', 'Add New Link', 1),
(192, 'yee/menu', 'An error occurred during saving menu!', 1),
(193, 'yee/menu', 'The changes have been saved.', 1),
(194, 'yee/menu', 'Please, select menu to view menu links...', 1),
(195, 'yee/menu', 'Selected menu doesn\'t contain any link. Click \"Add New Link\" to create a link for this menu.', 1),
(196, 'yee/page', 'Page', 1),
(197, 'yee/page', 'Pages', 1),
(198, 'yee/page', 'Create Page', 1),
(199, 'yee/post', 'Create Tag', 1),
(200, 'yee/post', 'Update Tag', 1),
(201, 'yee/post', 'No posts found.', 1),
(202, 'yee/post', 'Post', 1),
(203, 'yee/post', 'Posted in', 1),
(204, 'yee/post', 'Posts Activity', 1),
(205, 'yee/post', 'Posts', 1),
(206, 'yee/post', 'Tag', 1),
(207, 'yee/post', 'Tags', 1),
(208, 'yee/post', 'Thumbnail', 1),
(209, 'yee/settings', 'General Settings', 1),
(210, 'yee/settings', 'Reading Settings', 1),
(211, 'yee/settings', 'Site Title', 1),
(212, 'yee/settings', 'Site Description', 1),
(213, 'yee/settings', 'Admin Email', 1),
(214, 'yee/settings', 'Timezone', 1),
(215, 'yee/settings', 'Date Format', 1),
(216, 'yee/settings', 'Time Format', 1),
(217, 'yee/settings', 'Page Size', 1),
(218, 'yee/user', 'Child permissions', 1),
(219, 'yee/user', 'Child roles', 1),
(220, 'yee/user', 'Create Permission Group', 1),
(221, 'yee/user', 'Create Permission', 1),
(222, 'yee/user', 'Create Role', 1),
(223, 'yee/user', 'Create User', 1),
(224, 'yee/user', 'Log №{id}', 1),
(225, 'yee/user', 'No users found.', 1),
(226, 'yee/user', 'Password', 1),
(227, 'yee/user', 'Permission Groups', 1),
(228, 'yee/user', 'Permission', 1),
(229, 'yee/user', 'Permissions for \"{role}\" role', 1),
(230, 'yee/user', 'Permissions', 1),
(231, 'yee/user', 'Refresh routes', 1),
(232, 'yee/user', 'Registration date', 1),
(233, 'yee/user', 'Role', 1),
(234, 'yee/user', 'Roles and Permissions for \"{user}\"', 1),
(235, 'yee/user', 'Roles', 1),
(236, 'yee/user', 'Routes', 1),
(237, 'yee/user', 'Search route', 1),
(238, 'yee/user', 'Show all', 1),
(239, 'yee/user', 'Show only selected', 1),
(240, 'yee/user', 'Update Permission Group', 1),
(241, 'yee/user', 'Update Permission', 1),
(242, 'yee/user', 'Update Role', 1),
(243, 'yee/user', 'Update User Password', 1),
(244, 'yee/user', 'Update User', 1),
(245, 'yee/user', 'User not found', 1),
(246, 'yee/user', 'User', 1),
(247, 'yee/user', 'Users', 1),
(248, 'yee/user', 'Visit Log', 1),
(249, 'yee/user', 'You can not change own permissions', 1),
(250, 'yee/user', 'You can\'t update own permissions!', 1),
(251, 'yee/user', '{permission} Permission Settings', 1),
(252, 'yee/user', '{permission} Role Settings', 1),
(253, 'yee/auth', 'Are you sure you want to delete your profile picture?', 1),
(254, 'yee/auth', 'Are you sure you want to unlink this authorization?', 1),
(255, 'yee/auth', 'Authentication error occurred.', 1),
(256, 'yee/auth', 'Authorization', 1),
(257, 'yee/auth', 'Authorized Services', 1),
(258, 'yee/auth', 'Captcha', 1),
(259, 'yee/auth', 'Change profile picture', 1),
(260, 'yee/auth', 'Check your E-mail for further instructions', 1),
(261, 'yee/auth', 'Check your e-mail {email} for instructions to activate account', 1),
(262, 'yee/auth', 'Click to connect with service', 1),
(263, 'yee/auth', 'Click to unlink service', 1),
(264, 'yee/auth', 'Confirm E-mail', 1),
(265, 'yee/auth', 'Confirm', 1),
(266, 'yee/auth', 'Could not send confirmation email', 1),
(267, 'yee/auth', 'Current password', 1),
(268, 'yee/auth', 'E-mail confirmation for', 1),
(269, 'yee/auth', 'E-mail confirmed', 1),
(270, 'yee/auth', 'E-mail is invalid', 1),
(271, 'yee/auth', 'E-mail with activation link has been sent to <b>{email}</b>. This link will expire in {minutes} min.', 1),
(272, 'yee/auth', 'E-mail', 1),
(273, 'yee/auth', 'Forgot password?', 1),
(274, 'yee/auth', 'Incorrect username or password', 1),
(275, 'yee/auth', 'Login has been taken', 1),
(276, 'yee/auth', 'Login', 1),
(277, 'yee/auth', 'Logout', 1),
(278, 'yee/auth', 'Non Authorized Services', 1),
(279, 'yee/auth', 'Password has been updated', 1),
(280, 'yee/auth', 'Password recovery', 1),
(281, 'yee/auth', 'Password reset for', 1),
(282, 'yee/auth', 'Password', 1),
(283, 'yee/auth', 'Registration - confirm your e-mail', 1),
(284, 'yee/auth', 'Registration', 1),
(285, 'yee/auth', 'Remember me', 1),
(286, 'yee/auth', 'Remove profile picture', 1),
(287, 'yee/auth', 'Repeat password', 1),
(288, 'yee/auth', 'Reset Password', 1),
(289, 'yee/auth', 'Reset', 1),
(290, 'yee/auth', 'Save Profile', 1),
(291, 'yee/auth', 'Save profile picture', 1),
(292, 'yee/auth', 'Set Password', 1),
(293, 'yee/auth', 'Set Username', 1),
(294, 'yee/auth', 'Signup', 1),
(295, 'yee/auth', 'This E-mail already exists', 1),
(296, 'yee/auth', 'Token not found. It may be expired', 1),
(297, 'yee/auth', 'Token not found. It may be expired. Try reset password once more', 1),
(298, 'yee/auth', 'Too many attempts', 1),
(299, 'yee/auth', 'Unable to send message for email provided', 1),
(300, 'yee/auth', 'Update Password', 1),
(301, 'yee/auth', 'User Profile', 1),
(302, 'yee/auth', 'User with the same email as in {client} account already exists but isn\'t linked to it. Login using email first to link it.', 1),
(303, 'yee/auth', 'The username should contain only Latin letters, numbers and the following characters: \"-\" and \"_\".', 1),
(304, 'yee/auth', 'Username contains not allowed characters or words.', 1),
(305, 'yee/auth', 'Wrong password', 1),
(306, 'yee/auth', 'You could not login from this IP', 1),
(307, 'yee/seo', 'Create SEO Record', 1),
(308, 'yee/seo', 'Follow', 1),
(309, 'yee/seo', 'Index', 1),
(310, 'yee/seo', 'Keywords', 1),
(311, 'yee/seo', 'SEO', 1),
(312, 'yee/seo', 'Search Engine Optimization', 1),
(313, 'yee/seo', 'Update SEO Record', 1),
(314, 'yee/auth', 'Please confirm that you are not a bot.', 0),
(316, 'yee/post', 'Blog search', 0),
(317, 'yee/post', 'Blog topics', 0),
(318, 'yee/post', 'Keywords', 0),
(319, 'yee/post', 'Most popular', 0),
(320, 'yee/post', 'Recent Comments', 0),
(321, 'yee/post', 'Recent works', 0),
(322, 'yee', 'Expand All', 0),
(323, 'yee', 'Collapse All', 0),
(324, 'yee', 'Thank you for contacting us. We will respond to you as soon as possible.', 0),
(325, 'yee', 'There was an error sending email.', 0),
(326, 'yee/auth', 'Follow the link below to reset your password:', 0),
(327, 'yee/auth', 'Hello:', 0),
(328, 'yee', 'Full Name', 0),
(329, 'yee', 'Contact', 0),
(330, 'yee', 'Message for', 0),
(331, 'yee', 'About', 0),
(332, 'yee', 'Blog', 0),
(333, 'yee', 'Subscribe to news', 0),
(334, 'yee', 'Subscribe', 0),
(335, 'yee', 'Subscribe Off', 0),
(336, 'yee', 'Subscribe On', 0),
(337, 'yee/section', 'Learn more...', 0),
(338, 'yee', 'Leave a review...', 0),
(339, 'yee', 'Subscribe to', 0),
(340, 'yee/section', 'Sign up for class', 0),
(341, 'yee/section', 'Make an appointment', 0),
(342, 'yee', 'Sign up...', 0),
(343, 'yee', 'Contacts', 0),
(344, 'yee/post', 'Main', 0),
(345, 'yee', 'Main On', 0),
(346, 'yee/mail', 'Follow the link below to confirm your email:', 0),
(347, 'yee/mail', 'Follow the link below to reset your password:', 0),
(348, 'yee/mail', 'Hello:', 0),
(349, 'yee/mail', 'Hello, you have been registered on:', 0),
(350, 'yee/mail', 'Follow this link to confirm your E-mail and activate account:', 0),
(351, 'yee/auth', 'E-mail {email} confirmed', 0),
(352, 'yee', 'Home', 0),
(353, 'yee/auth', 'Enter', 0),
(356, 'yee/event', 'Group Number', 0),
(357, 'yee/event', 'Programm ID', 0),
(358, 'yee/event', 'Place ID', 0),
(359, 'yee/event', 'Start Time', 0),
(360, 'yee/event', 'End Time', 0),
(361, 'yee/event', 'Price', 0),
(362, 'yee', 'Created At', 0),
(363, 'yee', 'Updated At', 0),
(364, 'yee/event', 'Methods ID', 0),
(365, 'yee/event', 'Event Vid', 0),
(366, 'yee/event', 'Event Practices', 0),
(367, 'yee/event', 'Event Methods', 0),
(368, 'yee/event', 'Event Places', 0),
(369, 'yee/event', 'Event Programms', 0),
(371, 'yee/event', 'Event Schedules', 0),
(372, 'yee/event', 'Events', 0),
(374, 'yee/event', 'Time Volume', 0),
(375, 'yee/event', 'min', 0),
(376, 'yee/event', 'Select Vid...', 0),
(377, 'yee/event', 'Select Methods...', 0),
(378, 'yee/event', 'Practice List', 0),
(379, 'yee', 'Cache has been flushed.', 0),
(380, 'yee', 'Failed to flush cache.', 0),
(381, 'yee', 'Paste address to form', 0),
(382, 'yee', 'The coordinates of the place', 0),
(384, 'yee', 'Map Address', 0),
(385, 'yee/settings', 'Date Mask', 0),
(386, 'yee/settings', 'Time Mask', 0),
(387, 'yee/settings', 'Date & Time Mask', 0),
(388, 'yee', 'Phone Optional', 0),
(389, 'yee', 'Contact Person', 0),
(390, 'yee', 'Coords', 0),
(391, 'yee', 'Address', 0),
(392, 'yee', 'Map Zoom', 0),
(393, 'yee', 'Click on the map to get the address and coordinates, then click the button to insert the address into the form', 0),
(394, 'yee/settings', 'Phone Mask', 0),
(395, 'yee/event', 'Vid Name', 0),
(397, 'yee/event', 'Select Events...', 0),
(398, 'yee/event', 'Events List', 0),
(399, 'yee/event', 'Select Programm...', 0),
(400, 'yee/event', 'Programm Name', 0),
(401, 'yee/event', 'Users List', 0),
(402, 'yee/event', 'Select Users...', 0),
(403, 'yee/event', 'Schedule Calendar', 0),
(404, 'yee/event', 'The event start date must be greater than the end date.', 0),
(405, 'yee/event', 'Place Name', 0),
(407, 'yee/event', 'Event Name', 0),
(408, 'yee/event', 'Qty Items', 0),
(409, 'yee', 'Add', 0),
(410, 'yee/event', 'Add Events', 0),
(411, 'yee/event', 'Private', 0),
(412, 'yee/event', 'Individual', 0),
(413, 'yee/event', 'Group', 0),
(414, 'yee/event', 'Status Vid', 0),
(415, 'yee/event', 'Schedule Description', 0),
(416, 'yee/event', 'Event Description', 0),
(417, 'yee/event', 'Programm Description', 0),
(418, 'yee/block', 'Slide Image', 0),
(419, 'yee/block', 'Banner Top', 0),
(420, 'yee/block', 'Banner Middle', 0),
(421, 'yee/block', 'Banner Url', 0),
(422, 'yee/block', 'Btn Icon', 0),
(423, 'yee/block', 'Btn Name', 0),
(424, 'yee/block', 'Btn Class', 0),
(425, 'yee', 'Sort', 0),
(426, 'yee', 'Btn Icon', 0),
(427, 'yee', 'Btn Name', 0),
(428, 'yee', 'Btn Class', 0),
(429, 'yee/section', 'Banner Top', 0),
(430, 'yee/section', 'Banner Middle', 0),
(431, 'yee', 'Content Image', 0),
(432, 'yee/section', 'Countdown', 0),
(433, 'yee/section', 'Countdown Prompt', 0),
(434, 'yee', 'Bg Color', 0),
(435, 'yee', 'Bg Image', 0),
(436, 'yee', 'Image', 0),
(437, 'yee/media', 'Sort data saved.', 0),
(438, 'yee/media', 'To keep order', 0),
(439, 'yee/media', 'Photo not found.', 0),
(440, 'yee/media', 'Your photo has been removed.', 0),
(441, 'yee/media', 'Your photo was successfully added.', 0),
(442, 'yee', 'Requires a parameter with AJAX.', 0),
(443, 'yee/section', 'Img Src', 0),
(444, 'yee/section', 'Data Lazyload', 0),
(445, 'yee/section', 'Slides', 0),
(446, 'yee/section', 'Parallaxes', 0),
(447, 'yee/section', 'Parallax Class', 0),
(448, 'yee/section', 'Rackground Ratio', 0),
(449, 'yee/section', 'Carousel', 0),
(450, 'yee/section', 'Items Qty', 0),
(454, 'yee/section', 'Portfolio Category', 0),
(455, 'yee/section', 'Portfolio Items', 0),
(456, 'yee/section', 'Portfolio Menu', 0),
(457, 'yee/section', 'Thumbnail', 0),
(458, 'yee/section', 'Link Href', 0),
(460, 'yee', 'Business', 0),
(461, 'yee/section', 'Feedback', 0),
(462, 'yee', 'Learn more...', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `alias` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `alias`, `apply_time`) VALUES
('m000000_000000_base', '@app/migrations', 1538934042),
('m130524_201442_init', '@app/migrations', 1538934050),
('m150319_150657_alter_user_table', '@yeesoft/yii2-yee-core/migrations/', 1538934051),
('m150319_155941_init_yee_core', '@yeesoft/yii2-yee-core/migrations/', 1538934051),
('m150319_184824_init_settings', '@yeesoft/yii2-yee-core/migrations/', 1538934051),
('m150319_194321_init_menus', '@yeesoft/yii2-yee-core/migrations/', 1538934052),
('m150320_102452_init_translations', '@yeesoft/yii2-yee-translation/migrations/', 1538934052),
('m150628_124401_create_media_table', '@yeesoft/yii2-yee-media/migrations/', 1538934053),
('m150630_121101_create_post_table', '@yeesoft/yii2-yee-post/migrations/', 1538934053),
('m150703_182055_create_auth_table', '@yeesoft/yii2-yee-auth/migrations/', 1538934054),
('m150706_175101_create_comment_table', '@yeesoft/yii2-comments/migrations/', 1538934054),
('m150719_154955_add_setting_menu_links', '@yeesoft/yii2-yee-settings/migrations/', 1538934054),
('m150719_182533_add_menu_and_links', '@yeesoft/yii2-yee-menu/migrations/', 1538934054),
('m150727_175300_add_comments_menu_links', '@yeesoft/yii2-yee-comment/migrations/', 1538934054),
('m150729_121634_add_user_menu_links', '@yeesoft/yii2-yee-user/migrations/', 1538934054),
('m150729_122614_add_post_menu_links', '@yeesoft/yii2-yee-post/migrations/', 1538934054),
('m150729_131014_add_media_menu_links', '@yeesoft/yii2-yee-media/migrations/', 1538934054),
('m150731_150101_create_page_table', '@yeesoft/yii2-yee-page/migrations/', 1538934054),
('m150731_150644_add_page_menu_links', '@yeesoft/yii2-yee-page/migrations/', 1538934054),
('m150821_140141_add_core_permissions', '@yeesoft/yii2-yee-core/migrations/', 1538934054),
('m150825_202231_add_post_permissions', '@yeesoft/yii2-yee-post/migrations/', 1538934054),
('m150825_205531_add_user_permissions', '@yeesoft/yii2-yee-user/migrations/', 1538934054),
('m150825_211322_add_menu_permissions', '@yeesoft/yii2-yee-menu/migrations/', 1538934054),
('m150825_212310_add_settings_permissions', '@yeesoft/yii2-yee-settings/migrations/', 1538934054),
('m150825_212941_add_comments_permissions', '@yeesoft/yii2-yee-comment/migrations/', 1538934054),
('m150825_213610_add_media_permissions', '@yeesoft/yii2-yee-media/migrations/', 1538934054),
('m150825_220620_add_page_permissions', '@yeesoft/yii2-yee-page/migrations/', 1538934054),
('m151116_212614_add_translations_menu_links', '@yeesoft/yii2-yee-translation/migrations/', 1538934054),
('m151121_091144_i18n_yee_source', '@yeesoft/yii2-yee-core/migrations/', 1538934054),
('m151121_131210_add_translation_permissions', '@yeesoft/yii2-yee-translation/migrations/', 1538934054),
('m151121_184634_i18n_yee_translation_source', '@yeesoft/yii2-yee-translation/migrations/', 1538934054),
('m151121_225504_i18n_yee_media_source', '@yeesoft/yii2-yee-media/migrations/', 1538934054),
('m151121_232115_i18n_yee_menu_source', '@yeesoft/yii2-yee-menu/migrations/', 1538934054),
('m151121_233615_i18n_yee_page_source', '@yeesoft/yii2-yee-page/migrations/', 1538934054),
('m151121_233715_i18n_yee_post_source', '@yeesoft/yii2-yee-post/migrations/', 1538934054),
('m151121_235015_i18n_yee_settings_source', '@yeesoft/yii2-yee-settings/migrations/', 1538934054),
('m151121_235512_i18n_yee_user_source', '@yeesoft/yii2-yee-user/migrations/', 1538934054),
('m151126_061233_i18n_yee_auth_source', '@yeesoft/yii2-yee-auth/migrations/', 1538934054),
('m151226_230101_create_seo_table', '@yeesoft/yii2-yee-seo/migrations/', 1538934055),
('m151226_231101_add_seo_menu_links', '@yeesoft/yii2-yee-seo/migrations/', 1538934055),
('m151226_233401_add_seo_permissions', '@yeesoft/yii2-yee-seo/migrations/', 1538934055),
('m151226_234401_i18n_yee_seo_source', '@yeesoft/yii2-yee-seo/migrations/', 1538934055),
('m160207_123123_add_super_parent_id', '@yeesoft/yii2-comments/migrations/', 1538934055),
('m160325_140543_init_eav', '@vendor/yeesoft/yii2-yee-eav/migrations/', 1539282725),
('m160325_142311_add_eav_menu_links', '@vendor/yeesoft/yii2-yee-eav/migrations/', 1539282725),
('m160325_143610_add_eav_permissions', '@vendor/yeesoft/yii2-yee-eav/migrations/', 1539282725),
('m160325_144849_i18n_yee_eav_source', '@vendor/yeesoft/yii2-yee-eav/migrations/', 1539282725),
('m160414_212551_add_view_page', '@yeesoft/yii2-yee-page/migrations/', 1538934055),
('m160414_212558_add_view_post', '@yeesoft/yii2-yee-post/migrations/', 1538934055),
('m160419_092310_i18n_ru_yee', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_122314_i18n_ru_init_demo', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_143242_i18n_ru_menu_comments', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_143310_i18n_ru_menu_core', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_143742_i18n_ru_menu_media', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_143915_i18n_ru_menu_menu', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_144310_i18n_ru_menu_page', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_144654_i18n_ru_menu_post', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_144710_i18n_ru_menu_setting', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_145050_i18n_ru_menu_translations', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_145301_i18n_ru_menu_user', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_210059_i18n_ru_yee_translation', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_225904_i18n_ru_yee_media', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_232223_i18n_ru_yee_menu', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_233713_i18n_ru_yee_page', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_233813_i18n_ru_yee_post', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_234401_i18n_ru_yee_seo', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_235120_i18n_ru_yee_settings', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_235601_i18n_ru_menu_seo', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160419_235643_i18n_ru_yee_user', '@vendor/yeesoft/yee-i18n/ru/', 1544637337),
('m160426_122854_create_uploader_images_table', '@yeesoft/yii2-yee-media/migrations/', 1538934055),
('m160530_224510_add_url_field', '@yeesoft/yii2-comments/migrations/', 1538934055),
('m160605_214907_create_tag_table', '@yeesoft/yii2-yee-post/migrations/', 1538934056),
('m160605_215105_init_tag_settings', '@yeesoft/yii2-yee-post/migrations/', 1538934056),
('m160610_120101_init_demo', '@app/migrations', 1538934056),
('m160831_224932_alter_user_table', '@yeesoft/yii2-yee-core/migrations/', 1538934056),
('m160903_113810_update_auth_foreign_key', '@yeesoft/yii2-yee-auth/migrations/', 1538934056);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending,1-published',
  `comment_status` int(1) NOT NULL DEFAULT '1' COMMENT '0-closed,1-open',
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `revision` int(1) NOT NULL DEFAULT '1',
  `view` varchar(255) NOT NULL DEFAULT 'page',
  `layout` varchar(255) NOT NULL DEFAULT 'main'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `slug`, `status`, `comment_status`, `published_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `revision`, `view`, `layout`) VALUES
(1, 'author-course', 1, 0, 1440720000, 1440763228, 1549719177, 1, 1, 10, 'page', 'main'),
(2, 'consult', 1, 0, 1545782400, 1545840956, 1549719265, 1, 1, 7, 'page', 'main');

-- --------------------------------------------------------

--
-- Структура таблицы `page_lang`
--

CREATE TABLE `page_lang` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page_lang`
--

INSERT INTO `page_lang` (`id`, `page_id`, `language`, `title`, `content`) VALUES
(1, 1, 'en-US', 'Test Page', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p><p style=\"text-align: justify;\">Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(2, 1, 'ru', 'Авторский курс', '<h4>Образование:</h4>\r\n<p style=\"font-weight: 400;\">Психологическое образование - Институт интенционально-синергетической психологии (ИИСП), специальность психолог арт-терапевт.</p>\r\n<h4>Опыт работы:</h4>\r\n<p style=\"font-weight: 400;\">Закончив по первому образованию Экономический институт с красным дипломом, успешно работала в Банке и доросла в должности от Экономиста до Начальника отдела Ликвидности, получив второе Психологическое образование и оставив финансово-экономическую сферу деятельности, организовала Студию Елены Ишановой «Арт-Горница». Сейчас провожу психологические консультации и тренинги, и эффективно применяю самостоятельно разработанный мной курс «30 встреч» - Путь к поиску Себя!</p>\r\n<h4>О себе:</h4>\r\n<p style=\"font-weight: 400;\">Много путешествую, люблю познавать мир, интересуюсь окружающими меня людьми. Много общаюсь с друзьями, совместно выезжаю на мероприятия – на полеты в компании друзей парапланеристов. Люблю подниматься в горы. Люблю лес и люблю собирать грибы. Люблю смотреть на звезды, на облака и на воду. Люблю дождь, люблю солнце, люблю золотую осень и снег. Люблю рисовать и фотографировать. Люблю дело, которым занимаюсь.</p>\r\n<h4>Каждый клиент – это целая книга!</h4>\r\n<p style=\"font-weight: 400;\">Имея большой опыт взаимодействия с клиентами, внимательно слушаю человека и ответственно подхожу к каждой встрече. Мои профессиональные знания и опыт работы в психологии, а также в экономике помогают мне анализировать и подбирать такие техники арт-терапии, которые оптимально раскрывают тему занятия и отвечают на волнующие вопросы участников курса «30 встреч».</p>'),
(3, 2, 'ru', '30 встреч', '<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `slug` varchar(127) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `description` mediumtext,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `portfolio_category`
--

INSERT INTO `portfolio_category` (`id`, `name`, `slug`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Фото', 'photography', 0, '', 1, 1548924270, 1549011981),
(4, 'Видео', 'video', 1, '', 1, 1548925777, 1548927422),
(5, 'Посты', 'posty', 2, '', 1, 1549194125, 1549194125),
(6, 'Арт-терапия изображения', 'art-terapia-izobrazenia', 0, '', 1, 1549194646, 1549194646);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio_items`
--

CREATE TABLE `portfolio_items` (
  `id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `thumbnail` varchar(127) NOT NULL,
  `img_alt` varchar(127) DEFAULT NULL,
  `link_href` varchar(127) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `category_id`, `thumbnail`, `img_alt`, `link_href`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '/uploads/2019/02/solar-eclipse-832x468.jpg', NULL, '/uploads/2019/02/solar-eclipse-1280x720.jpg', 1, 1549222945, 1549627684),
(2, 3, '/uploads/2019/02/sunset-silhouette-832x468.jpg', NULL, '/uploads/2019/02/sunset-silhouette-1280x720.jpg', 1, 1549226874, 1549627660),
(3, 3, '/uploads/2019/02/forest-832x468.jpg', NULL, '/uploads/2019/02/forest-1280x720.jpg', 1, 1549567830, 1549627634);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio_menu`
--

CREATE TABLE `portfolio_menu` (
  `id` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(8) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `portfolio_menu`
--

INSERT INTO `portfolio_menu` (`id`, `name`, `description`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(2, 'Фотография', '', 1, 0, 1548925719, 1549193888),
(3, 'Видео', '', 1, 0, 1549193879, 1549193879),
(4, 'Проекты', '', 1, 0, 1549194157, 1549194350),
(5, 'Арт-терапия изображения', '', 1, 0, 1549194416, 1549194677);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio_menu_category`
--

CREATE TABLE `portfolio_menu_category` (
  `id` int(8) NOT NULL,
  `menu_id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `portfolio_menu_category`
--

INSERT INTO `portfolio_menu_category` (`id`, `menu_id`, `category_id`) VALUES
(2, 2, 3),
(4, 3, 4),
(5, 4, 5),
(6, 4, 4),
(9, 5, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending,1-published',
  `comment_status` int(1) NOT NULL DEFAULT '1' COMMENT '0-closed,1-open',
  `thumbnail` varchar(255) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `revision` int(1) NOT NULL DEFAULT '1',
  `view` varchar(255) NOT NULL DEFAULT 'post',
  `layout` varchar(255) NOT NULL DEFAULT 'main',
  `main_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `slug`, `category_id`, `status`, `comment_status`, `thumbnail`, `published_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `revision`, `view`, `layout`, `main_flag`) VALUES
(2, 'post_2', 2, 1, 1, NULL, 1533081600, 1440763228, 1546000094, 1, 1, 3, 'post', 'main', 1),
(3, 'post_3', 3, 1, 1, NULL, 1533168000, 1544889352, 1546000655, 1, 1, 8, 'post', 'main', 1),
(4, 'post_4', 3, 1, 1, NULL, 1533254400, 1544889352, 1549568515, 1, 1, 11, 'post', 'main', 1),
(5, 'post_5', 2, 1, 1, NULL, 1533340800, 1440763228, 1545036386, 1, 1, 5, 'post', 'main', 0),
(6, 'post_6', 2, 1, 1, NULL, 1533427200, 1440763228, 1545036397, 1, 1, 1, 'post', 'main', 0),
(7, 'post_7', 2, 1, 1, NULL, 1533513600, 1440763228, 1545575251, 1, 1, 6, 'post', 'main', 0),
(8, 'post_8', 2, 1, 1, NULL, 1533600000, 1440763228, 1545575244, 1, 1, 1, 'post', 'main', 0),
(9, 'post_9', 2, 1, 1, NULL, 1533686400, 1440763228, 1545036435, 1, 1, 7, 'post', 'main', 0),
(10, 'post_10', 3, 1, 1, NULL, 1533772800, 1544889352, 1545036444, 1, 1, 2, 'post', 'main', 0),
(11, 'post_11', 3, 1, 1, NULL, 1533859200, 1544889352, 1545036451, 1, 1, 2, 'post', 'main', 0),
(12, 'post_12', 2, 1, 1, NULL, 1533945600, 1440763228, 1545036460, 1, 1, 1, 'post', 'main', 0),
(13, 'post_13', 2, 1, 1, NULL, 1534118400, 1440763228, 1545036475, 1, 1, 14, 'post', 'main', 0),
(14, 'post_14', 2, 1, 1, NULL, 1534204800, 1440763228, 1545043839, 1, 1, 31, 'post', 'main', 0),
(15, 'post_15', 4, 1, 1, NULL, 1534291200, 1440763228, 1549655186, 1, 1, 195, 'post', 'main', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `left_border` int(11) NOT NULL,
  `right_border` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_category`
--

INSERT INTO `post_category` (`id`, `slug`, `visible`, `created_at`, `updated_at`, `created_by`, `updated_by`, `left_border`, `right_border`, `depth`) VALUES
(1, 'root', 0, 1538934053, 1545127573, NULL, 1, 1, 8, 0),
(2, 'celi-samorealizacia', 1, 1538934056, 1546704395, 1, 1, 4, 5, 1),
(3, 'resursy-motivacia', 1, 1544781484, 1546704435, 1, 1, 6, 7, 1),
(4, 'momenty-vremeni', 0, 1545053817, 1546704462, 1, 1, 2, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_category_lang`
--

INSERT INTO `post_category_lang` (`id`, `post_category_id`, `language`, `title`, `description`) VALUES
(2, 2, 'ru', 'Цели и самореализация', ''),
(3, 3, 'ru', 'Ресурсы и мотивация', ''),
(4, 4, 'ru', 'Моменты времени', ''),
(5, 1, 'ru', 'Корень', '');

-- --------------------------------------------------------

--
-- Структура таблицы `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_lang`
--

INSERT INTO `post_lang` (`id`, `post_id`, `language`, `title`, `content`) VALUES
(4, 2, 'ru', '2 пост', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(5, 3, 'ru', '3 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(6, 4, 'ru', '4 пост', '<p>2018-08-01Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.<!-- pagebreak --></p>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(7, 5, 'ru', '5 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(8, 6, 'ru', '6 пост', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(9, 7, 'ru', '7 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(10, 8, 'ru', '8 пост', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p style=\"text-align: justify;\">Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(11, 9, 'ru', '9 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(12, 10, 'ru', '10 пост', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(13, 11, 'ru', '11 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(14, 12, 'ru', '12 пост', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(15, 13, 'ru', '13 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p>\r\n<p>Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(16, 14, 'ru', '14 пост', '<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</blockquote>\r\n<p>Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),
(17, 15, 'ru', '15 пост', '<p>Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus. <!-- pagebreak --></p>\r\n<p>Быть счастливой каждый день» Начинаю серию интервью с теми людьми, которые мне кажутся очень особенными в плане личной силы. Выбираю тех, кто много лет очень нравится, с кем я ощущаю себя «в унисон». Здесь будет моя личная коллекция людей, которые вызывают только тепло и восхищение. И в первую очередь, — тех, кто достиг того, к чему все стремятся (то самое «приближаясь» в названии моего блога) — стабильной удовлетворенности от своей жизни, перманентного счастья и радости от всего, какие бы ситуации ни происходили. Мне интересно докопаться — откуда это в них, что они делали, как к этому пришли, что им помогло, что кажется важнейшим</p>\r\n<p> </p>');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tag`
--

INSERT INTO `post_tag` (`id`, `slug`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'yee-cms', 1538934056, 1538934056, 1, 1),
(2, 'yii2', 1538934056, 1538934056, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag_lang`
--

CREATE TABLE `post_tag_lang` (
  `id` int(11) NOT NULL,
  `post_tag_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tag_lang`
--

INSERT INTO `post_tag_lang` (`id`, `post_tag_id`, `language`, `title`) VALUES
(3, 2, 'ru', 'yii22'),
(4, 1, 'ru', 'yee-cmsss');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag_post`
--

CREATE TABLE `post_tag_post` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tag_post`
--

INSERT INTO `post_tag_post` (`id`, `post_id`, `tag_id`) VALUES
(3, 2, 1),
(4, 3, 2),
(10, 15, 1),
(11, 15, 2),
(12, 8, 2),
(13, 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `section_block`
--

CREATE TABLE `section_block` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `coll_num` smallint(3) NOT NULL,
  `row_num` smallint(3) NOT NULL,
  `coll_grid_size` smallint(3) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Блоки строки секции';

-- --------------------------------------------------------

--
-- Структура таблицы `section_carousel`
--

CREATE TABLE `section_carousel` (
  `id` int(8) NOT NULL,
  `name` varchar(127) DEFAULT NULL,
  `slug` varchar(127) DEFAULT NULL,
  `items` smallint(2) NOT NULL,
  `single_item` tinyint(1) NOT NULL,
  `navigation` tinyint(1) NOT NULL,
  `pagination` tinyint(1) NOT NULL,
  `transition_style` varchar(127) NOT NULL,
  `auto_play` varchar(127) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `section_carousel`
--

INSERT INTO `section_carousel` (`id`, `name`, `slug`, `items`, `single_item`, `navigation`, `pagination`, `transition_style`, `auto_play`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Карусель главная', 'karusel-main', 1, 1, 1, 1, 'fadeUp', '9000', 1, 1548704519, 1549488366),
(2, 'Обо мне', 'karousel-about', 1, 0, 0, 0, 'fade', '9000', 1, 1549439547, 1549978289);

-- --------------------------------------------------------

--
-- Структура таблицы `section_feedback`
--

CREATE TABLE `section_feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `business` varchar(127) NOT NULL,
  `content` mediumtext NOT NULL,
  `published_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `main_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='отзывы посетителей';

--
-- Дамп данных таблицы `section_feedback`
--

INSERT INTO `section_feedback` (`id`, `username`, `business`, `content`, `published_at`, `created_at`, `updated_at`, `status`, `main_flag`) VALUES
(3, 'Артур', 'Техник', '<p><strong>\"Быть счастливой каждый день\"</strong> </p>\r\n<p>Начинаю серию интервью с теми людьми, которые мне кажутся очень особенными в плане личной силы. Выбираю тех, кто много лет очень нравится, с кем я ощущаю себя «в унисон». Здесь будет моя личная коллекция людей, которые вызывают только тепло и восхищение.</p>', 1549238400, 1549656436, 1549811440, 1, 1),
(4, 'Елена Ишанова', 'Психолог', '<p><strong>И в первую очередь</strong>, — тех, кто достиг того, к чему все стремятся (то самое «приближаясь» в названии моего блога) — стабильной удовлетворенности от своей жизни, перманентного счастья и радости от всего, какие бы ситуации ни происходили.</p>', 1549670400, 1549711701, 1549804762, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `section_item`
--

CREATE TABLE `section_item` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Секции страницы';

-- --------------------------------------------------------

--
-- Структура таблицы `section_page`
--

CREATE TABLE `section_page` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `slug` varchar(127) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страницы sms';

--
-- Дамп данных таблицы `section_page`
--

INSERT INTO `section_page` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Обо мне', 'about_me', 1, 1550235943, 1550241633);

-- --------------------------------------------------------

--
-- Структура таблицы `section_parallax`
--

CREATE TABLE `section_parallax` (
  `id` int(8) NOT NULL,
  `name` varchar(127) DEFAULT NULL,
  `bg_color` varchar(127) DEFAULT NULL,
  `bg_image` varchar(127) NOT NULL,
  `parallax_class` varchar(127) DEFAULT NULL,
  `background_ratio` varchar(127) DEFAULT NULL,
  `content_image` varchar(127) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `countdown` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Включить счетчик',
  `countdown_prompt` varchar(127) NOT NULL,
  `start_timestamp` int(11) DEFAULT NULL,
  `url` varchar(127) NOT NULL,
  `btn_icon` varchar(127) NOT NULL,
  `btn_name` varchar(127) NOT NULL,
  `btn_class` varchar(127) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `section_parallax`
--

INSERT INTO `section_parallax` (`id`, `name`, `bg_color`, `bg_image`, `parallax_class`, `background_ratio`, `content_image`, `content`, `countdown`, `countdown_prompt`, `start_timestamp`, `url`, `btn_icon`, `btn_name`, `btn_class`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'rgb(0, 0, 0)', '/uploads/2019/02/tree-cat-1920x1080.jpg', 'parallax delayed', '0.8', '', '<h2>Позитивный мир  <strong>Начинается с себя!</strong></h2>\r\n<p class=\"lead\">\r\n      Сделайте шаг к переменам в своей жизни прямо сейчас!\r\n</p>\r\n<p>\r\nПочувствовать вкус к жизни и найти дорогу к Вашим целям поможет мой авторский курс<br />«30 встреч» -\r\nПуть к Поиску Себя! Благодаря взаимодействию с арт-терапией Вы осознаете, что можно жить без\r\nлишних переживаний! Вы узнаете, как сохранить жизненные силы и где найти ресурсы!\r\n</p>', 0, 'До начала занятия осталось:', 1549798200, '/site/contact', 'fa fa-chevron-circle-right', 'Sign up for class', 'btn btn-primary btn-lg', 1, 1549371857, 1549568288);

-- --------------------------------------------------------

--
-- Структура таблицы `section_slides`
--

CREATE TABLE `section_slides` (
  `id` int(8) NOT NULL,
  `name` varchar(127) NOT NULL,
  `data_transition` varchar(32) DEFAULT NULL,
  `data_slotamount` mediumint(3) DEFAULT NULL,
  `data_masterspeed` mediumint(3) DEFAULT NULL,
  `data_delay` varchar(127) DEFAULT NULL,
  `img_src` varchar(127) DEFAULT NULL,
  `img_alt` varchar(127) DEFAULT NULL,
  `data_lazyload` varchar(127) DEFAULT NULL,
  `data_fullwidthcentering` varchar(127) DEFAULT NULL,
  `data_bgfit` varchar(32) DEFAULT NULL,
  `data_bgposition` varchar(32) DEFAULT NULL,
  `data_bgrepeat` varchar(32) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(8) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `section_slides`
--

INSERT INTO `section_slides` (`id`, `name`, `data_transition`, `data_slotamount`, `data_masterspeed`, `data_delay`, `img_src`, `img_alt`, `data_lazyload`, `data_fullwidthcentering`, `data_bgfit`, `data_bgposition`, `data_bgrepeat`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Слайд 1', 'fade', 7, 300, '', '', '', '/uploads/2019/02/sunset-silhouette-1920x1080.jpg', 'on', '', '', '', 1, 3, 1548582670, 1549275331),
(2, 'Слайд 2', 'fade', 7, 300, '', '', '', '/uploads/2019/02/solar-eclipse-1920x1080.jpg', 'on', '', '', '', 1, 2, 1548582670, 1549275318),
(3, 'Слайд 3', 'fade', 7, 300, '', '', '', '/uploads/2019/02/forest-1920x1080.jpg', 'on', '', '', '', 1, 1, 1548582670, 1549458573),
(4, 'Слайд 4', 'fade', 7, 1000, '13000', '/uploads/2019/02/textslider-1920x1080.jpg', '', '', '', 'cover', 'center top', 'no-repeat', 1, 4, 1548582670, 1549114192);

-- --------------------------------------------------------

--
-- Структура таблицы `section_slides_layers`
--

CREATE TABLE `section_slides_layers` (
  `id` int(8) NOT NULL,
  `slides_id` int(8) NOT NULL,
  `content` mediumtext NOT NULL,
  `class` varchar(127) DEFAULT NULL,
  `data_x` varchar(127) DEFAULT NULL,
  `data_y` varchar(127) DEFAULT NULL,
  `data_customin` varchar(512) DEFAULT NULL,
  `data_customout` varchar(512) DEFAULT NULL,
  `data_hoffset` smallint(3) DEFAULT NULL,
  `data_voffset` smallint(3) DEFAULT NULL,
  `data_speed` smallint(3) DEFAULT NULL,
  `data_start` smallint(3) DEFAULT NULL,
  `data_easing` varchar(127) DEFAULT NULL,
  `data_splitin` varchar(127) DEFAULT NULL,
  `data_splitout` varchar(127) DEFAULT NULL,
  `data_elementdelay` varchar(127) DEFAULT NULL,
  `data_endelementdelay` varchar(127) DEFAULT NULL,
  `data_end` varchar(127) DEFAULT NULL,
  `data_endspeed` smallint(3) DEFAULT NULL,
  `data_endeasing` varchar(127) DEFAULT NULL,
  `data_captionhidden` varchar(32) DEFAULT NULL,
  `style` varchar(127) DEFAULT NULL,
  `btn_flag` tinyint(1) NOT NULL DEFAULT '0',
  `btn_url` varchar(127) DEFAULT NULL,
  `btn_icon` varchar(127) DEFAULT NULL,
  `btn_name` varchar(127) DEFAULT NULL,
  `btn_class` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `section_slides_layers`
--

INSERT INTO `section_slides_layers` (`id`, `slides_id`, `content`, `class`, `data_x`, `data_y`, `data_customin`, `data_customout`, `data_hoffset`, `data_voffset`, `data_speed`, `data_start`, `data_easing`, `data_splitin`, `data_splitout`, `data_elementdelay`, `data_endelementdelay`, `data_end`, `data_endspeed`, `data_endeasing`, `data_captionhidden`, `style`, `btn_flag`, `btn_url`, `btn_icon`, `btn_name`, `btn_class`) VALUES
(1, 1, 'Станьте творцом своей жизни!', 'tp-caption medium_text lft', '90', '180', '', '', NULL, NULL, 300, 500, 'easeOutExpo', '', '', '', '', '', NULL, '', '', '', 0, '', '', '', ''),
(2, 1, 'Любите и проявляйте себя. <br/> Сделайте это прямо сейчас!', 'tp-caption large_text lfb', '90', '222', NULL, '', NULL, NULL, 300, 800, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL),
(3, 1, 'Кнопка', 'tp-caption lfb', '90', '330', NULL, '', NULL, NULL, 300, 1100, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '/site/blog', '', 'Learn more...', 'btn btn-info btn-lg'),
(4, 2, 'Позитивный мир начинается с себя!', 'tp-caption medium_text lft', '90', '180', NULL, '', NULL, NULL, 300, 500, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL),
(5, 2, 'В нашем подсознании скрыта сила,<br/>способная перевернуть мир.', 'tp-caption large_text lfb', '90', '222', NULL, '', NULL, NULL, 300, 800, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL),
(6, 2, 'Кнопка', 'tp-caption lfb', '90', '330', NULL, '', NULL, NULL, 300, 1100, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '/site/contact', '', 'Make an appointment', 'btn btn-default btn-lg'),
(7, 3, 'Жизнь - это счастье!', 'tp-caption medium_text lft', '90', '180', '', '', NULL, NULL, 300, 500, 'easeOutExpo', '', '', '', '', '', NULL, '', '', '', 0, '', '', '', ''),
(8, 3, 'Любовь к жизни, осознанная жизнь <br/> дают ощущение счастья!', 'tp-caption large_text lfb', '90', '222', NULL, '', NULL, NULL, 300, 800, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL),
(9, 3, 'Кнопка', 'tp-caption lfb', '90', '330', NULL, '', NULL, NULL, 300, 1100, 'easeOutExpo', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '/site/contact', 'fa fa-chevron-circle-right', 'Sign up for class', 'btn btn-primary btn-lg'),
(10, 4, 'Курс \"30 встреч\"', 'tp-caption finewide_large_white customin customout tp-resizeme', 'center', 'center', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 0, -40, 500, 500, 'Power3.easeInOut', 'chars', 'chars', '0.08', '0.08', '4000', 500, '', '', 'z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(11, 4, 'ПОПРОБУЙТЕ Новое', 'tp-caption finewide_medium_white randomrotate customout tp-resizeme', 'center', 'center', '', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 0, 30, 500, 500, 'Power3.easeInOut', 'chars', 'chars', '0.08', '0.08', '4000', 500, '', '', 'z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(12, 4, '<strong>Курс \"30 встреч\"</strong>', 'tp-caption boldwide_small_white customin customout tp-resizeme', '100', '120', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', NULL, NULL, 300, 5000, 'Power3.easeInOut', 'none', 'none', '0.08', '0.08', '', 300, '', '', 'z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(13, 4, '&nbsp;', 'tp-caption whitedivider3px_vertical customin tp-resizeme', '420', '110', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', '', NULL, NULL, 300, 5500, 'Power3.easeInOut', 'none', 'none', '0.1', '0.1', '', 300, '', '', 'z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(14, 4, 'Ждет тебя', 'tp-caption finewide_small_white randomrotate customout tp-resizeme', '460', '120', '', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', NULL, NULL, 500, 6400, 'Power3.easeInOut', 'chars', 'chars', '', '', '', 300, '', '', 'z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(15, 4, 'Всегда', 'tp-caption finewide_small_white customin customout tp-resizeme', '460', '160', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', NULL, NULL, 500, 7200, 'Power3.easeInOut', 'words', 'words', '0.12', '0.12', '', 300, '', '', 'z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(16, 4, 'Присоединяйся', 'tp-caption finewide_small_white customin customout tp-resizeme', '460', '200', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', NULL, NULL, 500, 8000, 'Power3.easeInOut', 'none', 'none', '0.08', '0.08', '', 300, '', '', 'z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(17, 4, 'Курс \"30 встреч\" помогает познать себя и окружающий мир, раскрыть в себе новые способности,  не бояться изменять свою жизнь,  осознать свою способность быть счастливым и делиться этим счастьем с другими!', 'tp-caption finewide_verysmall_white_mw customin customout tp-resizem', '460', '250', 'x:0;y:50;z:0;rotationX:-120;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 0%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', NULL, NULL, 900, 8000, 'Power3.easeInOut', 'lines', 'lines', '0.2', '0.08', '', 300, '', '', 'z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;', 0, '', '', '', ''),
(18, 4, 'Кнопка', 'tp-caption lfb', '100', '320', '', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;', -90, NULL, 500, 9000, 'Back.easeOut', '', '', '', '', '', 500, 'Power4.easeIn', 'off', 'z-index: 21', 1, '/site/contact', '', 'Sign up for class', 'btn btn-default btn-lg');

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(127) NOT NULL DEFAULT '',
  `keywords` text,
  `description` text,
  `index` smallint(6) NOT NULL DEFAULT '1',
  `follow` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `seo`
--

INSERT INTO `seo` (`id`, `url`, `title`, `author`, `keywords`, `description`, `index`, `follow`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '/', '30 шагов к успеху', 'Елена Ишанова', 'арттерапия, психологическоеконсультирование, поисксебя, веритьвчудеса, радоватьсяжизни, счастьеесть', 'Студия Елены Ишановой Арт-Горница', 1, 1, 1452544164, 1544695070, 1, 1),
(2, '/blog', '', '', 'Блог 30 шагов к успеху', '', 1, 1, 1544823664, 1544823664, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `group` varchar(64) DEFAULT 'general',
  `key` varchar(64) NOT NULL,
  `language` varchar(6) DEFAULT NULL,
  `value` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `group`, `key`, `language`, `value`, `description`) VALUES
(1, 'general', 'title', 'en-US', 'artgornica.ru', NULL),
(2, 'general', 'description', 'en-US', '', NULL),
(3, 'general', 'email', NULL, 'artmarkov@mail.ru', NULL),
(4, 'general', 'timezone', NULL, 'Europe/Moscow', NULL),
(5, 'general', 'dateformat', NULL, 'dd-MM-yyyy', NULL),
(6, 'general', 'timeformat', NULL, 'HH:mm', NULL),
(7, 'general', 'title', 'ru', 'Artgornica.ru', NULL),
(8, 'general', 'description', 'ru', '', NULL),
(9, 'reading', 'page_size', NULL, '10', NULL),
(10, 'reading', 'phone_mask', NULL, '+7 (999) 999 99 99', NULL),
(11, 'reading', 'date_mask', NULL, '99-99-9999', NULL),
(12, 'reading', 'time_mask', NULL, '99:99', NULL),
(13, 'reading', 'date_time_mask', NULL, '99-99-9999 99:99', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `count` tinyint(2) NOT NULL,
  `url` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `count`, `url`) VALUES
(1, '30 встреч', 'name-1', 40, '/1'),
(2, 'Арт-терапия', 'name-2', 20, '/2'),
(3, 'Счастье есть', 'name-3', 10, '/3'),
(4, 'Исполни свою мечту', 'name-4', 50, '/4');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `superadmin` int(6) DEFAULT '0',
  `registration_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bind_to_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` int(1) DEFAULT '0',
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `first_name` varchar(124) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(124) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` int(2) DEFAULT NULL,
  `birth_month` int(2) DEFAULT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `phone` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `superadmin`, `registration_ip`, `bind_to_ip`, `email_confirmed`, `confirmation_token`, `avatar`, `first_name`, `last_name`, `birth_day`, `birth_month`, `birth_year`, `gender`, `phone`, `skype`, `info`) VALUES
(1, 'admin', '', '$2y$13$A1YDrmT5WvvcZDK2NXY/sO0Dz/SmIuZlsPuJy57sHKobW7haodi3W', NULL, 'artmarkov@mail.ru', 10, 0, 1550524675, 1, NULL, '', 1, NULL, '{\"small\":\"\\/uploads\\/avatar\\/avatar_1_1550493083-48x48.jpg\",\"medium \":\"\\/uploads\\/avatar\\/avatar_1_1550493083-96x96.jpg\",\"large\":\"\\/uploads\\/avatar\\/avatar_1_1550493083-144x144.jpg\"}', 'Артур', 'Марков', 1, 4, 1971, 1, '+79055400746', 'artmarkov_skype', '1111'),
(2, 'ishanova', 'yMdSVV0avEq9xO4p7uO4uCuAeAHpizQc', '$2y$13$G.6gfVKDmWhQsEQuvv2QmuiT/8VRRViJsr3AmXgsVzUtR25Wo/oG2', NULL, 'elenaishanova@mail.ru', 10, 1545848489, 1545901921, 0, '::1', '', 1, NULL, NULL, 'Елена', 'Ишанова', 26, 11, 1978, 2, '', '', ''),
(6, 'markov_av', 'DB6oF4FiE-4ERlXTnclkgwN4xJYuUhNR', '$2y$13$MdRtxjBZYYDPuiblQ37xdug1eCZzGE.d4NbenwWhWJrNCf6TPvgNC', NULL, 'artmarkov-71@yandex.ru', 0, 1546109689, 1547066520, 0, '::1', '', 1, NULL, NULL, '', '', NULL, 1, NULL, 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_setting`
--

CREATE TABLE `user_setting` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_visit_log`
--

CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` varchar(5) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `os` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_visit_log`
--

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `browser`, `os`, `user_id`, `visit_time`) VALUES
(1, '5c617a487775e', '127.0.0.1', 'ru', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'Chrome', 'Windows', 1, 1549892168),
(2, '5c62c9a6390f1', '127.0.0.1', 'ru', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'Chrome', 'Windows', 1, 1549978022),
(3, '5c642ace615d7', '127.0.0.1', 'ru', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'Chrome', 'Windows', 1, 1550068430),
(4, '5c6aab56c556e', '127.0.0.1', 'ru', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'Chrome', 'Windows', 1, 1550494550),
(5, '5c6ab8050412b', '127.0.0.1', 'ru', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'Chrome', 'Windows', 1, 1550497797),
(6, '5c6b17d2a2a22', '::1', 'ru', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'Chrome', 'mac', 1, 1550522322),
(7, '5c6b1c126152a', '::1', 'ru', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'Chrome', 'mac', 1, 1550523410),
(8, '5c6b1c921cc61', '::1', 'ru', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'Chrome', 'mac', 1, 1550523538),
(9, '5c6b1c9e05f0b', '::1', 'ru', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'Chrome', 'mac', 1, 1550523550),
(10, '5c6b1d1461217', '::1', 'ru', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'Chrome', 'mac', 1, 1550523668);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auth_user` (`user_id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `fk_user_id_auth_assignment_table` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `auth_item_type` (`type`),
  ADD KEY `fk_auth_item_table_rule_name` (`rule_name`),
  ADD KEY `fk_auth_item_table_group_code` (`group_code`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `fk_child_auth_item_child_table` (`child`);

--
-- Индексы таблицы `auth_item_group`
--
ALTER TABLE `auth_item_group`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_model` (`model`),
  ADD KEY `comment_model_id` (`model`,`model_id`),
  ADD KEY `comment_status` (`status`),
  ADD KEY `comment_reply` (`parent_id`),
  ADD KEY `comment_super_parent_id` (`super_parent_id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_item`
--
ALTER TABLE `event_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vid_id` (`vid_id`);

--
-- Индексы таблицы `event_item_practice`
--
ALTER TABLE `event_item_practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `practice_id` (`practice_id`);

--
-- Индексы таблицы `event_item_programm`
--
ALTER TABLE `event_item_programm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `prigramm_id` (`programm_id`);

--
-- Индексы таблицы `event_methods`
--
ALTER TABLE `event_methods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_place`
--
ALTER TABLE `event_place`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_practice`
--
ALTER TABLE `event_practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `methods_id` (`methods_id`);

--
-- Индексы таблицы `event_programm`
--
ALTER TABLE `event_programm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vid_id` (`vid_id`);

--
-- Индексы таблицы `event_schedule`
--
ALTER TABLE `event_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`programm_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `event_schedule_practice`
--
ALTER TABLE `event_schedule_practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`schedule_id`),
  ADD KEY `practice_id` (`practice_id`);

--
-- Индексы таблицы `event_schedule_users`
--
ALTER TABLE `event_schedule_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `event_vid`
--
ALTER TABLE `event_vid`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_album` (`album_id`),
  ADD KEY `fk_media_created_by` (`created_by`),
  ADD KEY `fk_media_updated_by` (`updated_by`);

--
-- Индексы таблицы `media_album`
--
ALTER TABLE `media_album`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_album_slug` (`slug`),
  ADD KEY `media_album_visible` (`visible`),
  ADD KEY `fk_album_category` (`category_id`),
  ADD KEY `fk_media_album_created_by` (`created_by`),
  ADD KEY `fk_media_album_updated_by` (`updated_by`);

--
-- Индексы таблицы `media_album_lang`
--
ALTER TABLE `media_album_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_album_lang_language` (`language`),
  ADD KEY `fk_media_album_lang` (`media_album_id`);

--
-- Индексы таблицы `media_category`
--
ALTER TABLE `media_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_category_slug` (`slug`),
  ADD KEY `media_category_visible` (`visible`),
  ADD KEY `fk_media_category_created_by` (`created_by`),
  ADD KEY `fk_media_category_updated_by` (`updated_by`);

--
-- Индексы таблицы `media_category_lang`
--
ALTER TABLE `media_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_category_lang_language` (`language`),
  ADD KEY `fk_media_category_lang` (`media_category_id`);

--
-- Индексы таблицы `media_lang`
--
ALTER TABLE `media_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_lang_language` (`language`),
  ADD KEY `fk_media_lang` (`media_id`);

--
-- Индексы таблицы `media_manager`
--
ALTER TABLE `media_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`);

--
-- Индексы таблицы `media_upload`
--
ALTER TABLE `media_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_upload_owner_class` (`owner_class`),
  ADD KEY `media_upload_owner_id` (`owner_id`),
  ADD KEY `fk_media_upload_media_id` (`media_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_created_by` (`created_by`),
  ADD KEY `fk_menu_updated_by` (`updated_by`);

--
-- Индексы таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_lang_post_id` (`menu_id`),
  ADD KEY `menu_lang_language` (`language`);

--
-- Индексы таблицы `menu_link`
--
ALTER TABLE `menu_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_menu_id` (`menu_id`),
  ADD KEY `link_parent_id` (`parent_id`),
  ADD KEY `fk_menu_link_created_by` (`created_by`),
  ADD KEY `fk_menu_link_updated_by` (`updated_by`);

--
-- Индексы таблицы `menu_link_lang`
--
ALTER TABLE `menu_link_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_link_lang_link_id` (`link_id`),
  ADD KEY `menu_link_lang_language` (`language`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_index` (`source_id`,`language`);

--
-- Индексы таблицы `message_source`
--
ALTER TABLE `message_source`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_slug` (`slug`),
  ADD KEY `page_status` (`status`);

--
-- Индексы таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_lang_post_id` (`page_id`),
  ADD KEY `page_lang_language` (`language`);

--
-- Индексы таблицы `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `portfolio_menu`
--
ALTER TABLE `portfolio_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `portfolio_menu_category`
--
ALTER TABLE `portfolio_menu_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_items_category_ibfk_1` (`menu_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_slug` (`slug`),
  ADD KEY `post_category_id` (`category_id`),
  ADD KEY `post_status` (`status`),
  ADD KEY `fk_page_created_by` (`created_by`),
  ADD KEY `fk_page_updated_by` (`updated_by`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_slug` (`slug`),
  ADD KEY `post_category_visible` (`visible`),
  ADD KEY `left_border` (`left_border`,`right_border`),
  ADD KEY `right_border` (`right_border`),
  ADD KEY `fk_post_category_created_by` (`created_by`),
  ADD KEY `fk_post_category_updated_by` (`updated_by`);

--
-- Индексы таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_lang_id` (`post_category_id`),
  ADD KEY `post_category_lang_language` (`language`);

--
-- Индексы таблицы `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_lang_post_id` (`post_id`),
  ADD KEY `post_lang_language` (`language`);

--
-- Индексы таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_slug` (`slug`),
  ADD KEY `fk_post_tag_created_by` (`created_by`),
  ADD KEY `fk_post_tag_updated_by` (`updated_by`);

--
-- Индексы таблицы `post_tag_lang`
--
ALTER TABLE `post_tag_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_lang_id` (`post_tag_id`),
  ADD KEY `post_tag_lang_language` (`language`);

--
-- Индексы таблицы `post_tag_post`
--
ALTER TABLE `post_tag_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_tag_post_id` (`post_id`),
  ADD KEY `fk_post_tag_tag_id` (`tag_id`);

--
-- Индексы таблицы `section_block`
--
ALTER TABLE `section_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `section_carousel`
--
ALTER TABLE `section_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section_feedback`
--
ALTER TABLE `section_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section_item`
--
ALTER TABLE `section_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_item_ibfk_1` (`page_id`);

--
-- Индексы таблицы `section_page`
--
ALTER TABLE `section_page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section_parallax`
--
ALTER TABLE `section_parallax`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section_slides`
--
ALTER TABLE `section_slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section_slides_layers`
--
ALTER TABLE `section_slides_layers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_id` (`slides_id`);

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD UNIQUE KEY `seo_url` (`url`),
  ADD KEY `seo_created_by` (`created_by`),
  ADD KEY `seo_author` (`created_by`),
  ADD KEY `fk_seo_updated_by` (`updated_by`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_group_lang` (`group`,`key`,`language`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `user_setting`
--
ALTER TABLE `user_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_setting_user_key` (`user_id`,`key`);

--
-- Индексы таблицы `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_log_user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `event_item`
--
ALTER TABLE `event_item`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `event_item_practice`
--
ALTER TABLE `event_item_practice`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `event_item_programm`
--
ALTER TABLE `event_item_programm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `event_methods`
--
ALTER TABLE `event_methods`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `event_place`
--
ALTER TABLE `event_place`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `event_practice`
--
ALTER TABLE `event_practice`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `event_programm`
--
ALTER TABLE `event_programm`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `event_schedule`
--
ALTER TABLE `event_schedule`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `event_schedule_practice`
--
ALTER TABLE `event_schedule_practice`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `event_schedule_users`
--
ALTER TABLE `event_schedule_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `event_vid`
--
ALTER TABLE `event_vid`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `media_album`
--
ALTER TABLE `media_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `media_album_lang`
--
ALTER TABLE `media_album_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `media_category`
--
ALTER TABLE `media_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `media_category_lang`
--
ALTER TABLE `media_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `media_lang`
--
ALTER TABLE `media_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `media_manager`
--
ALTER TABLE `media_manager`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `media_upload`
--
ALTER TABLE `media_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu_link_lang`
--
ALTER TABLE `menu_link_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- AUTO_INCREMENT для таблицы `message_source`
--
ALTER TABLE `message_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `page_lang`
--
ALTER TABLE `page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `portfolio_items`
--
ALTER TABLE `portfolio_items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `portfolio_menu`
--
ALTER TABLE `portfolio_menu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `portfolio_menu_category`
--
ALTER TABLE `portfolio_menu_category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `post_tag_lang`
--
ALTER TABLE `post_tag_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post_tag_post`
--
ALTER TABLE `post_tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `section_block`
--
ALTER TABLE `section_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `section_carousel`
--
ALTER TABLE `section_carousel`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `section_feedback`
--
ALTER TABLE `section_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `section_item`
--
ALTER TABLE `section_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `section_page`
--
ALTER TABLE `section_page`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `section_parallax`
--
ALTER TABLE `section_parallax`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `section_slides`
--
ALTER TABLE `section_slides`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `section_slides_layers`
--
ALTER TABLE `section_slides_layers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_setting`
--
ALTER TABLE `user_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_visit_log`
--
ALTER TABLE `user_visit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk_auth_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `fk_item_name_auth_assignment_table` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_auth_assignment_table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `fk_auth_item_table_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_table_rule_name` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `fk_child_auth_item_child_table` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parent_auth_item_child_table` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `event_item`
--
ALTER TABLE `event_item`
  ADD CONSTRAINT `event_item_ibfk_1` FOREIGN KEY (`vid_id`) REFERENCES `event_vid` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_item_practice`
--
ALTER TABLE `event_item_practice`
  ADD CONSTRAINT `event_item_practice_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `event_item` (`id`),
  ADD CONSTRAINT `event_item_practice_ibfk_2` FOREIGN KEY (`practice_id`) REFERENCES `event_practice` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_item_programm`
--
ALTER TABLE `event_item_programm`
  ADD CONSTRAINT `event_item_programm_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `event_item` (`id`),
  ADD CONSTRAINT `event_item_programm_ibfk_2` FOREIGN KEY (`programm_id`) REFERENCES `event_programm` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_practice`
--
ALTER TABLE `event_practice`
  ADD CONSTRAINT `event_practice_ibfk_1` FOREIGN KEY (`methods_id`) REFERENCES `event_methods` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_programm`
--
ALTER TABLE `event_programm`
  ADD CONSTRAINT `event_programm_ibfk_1` FOREIGN KEY (`vid_id`) REFERENCES `event_vid` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_schedule`
--
ALTER TABLE `event_schedule`
  ADD CONSTRAINT `event_schedule_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `event_place` (`id`),
  ADD CONSTRAINT `event_schedule_ibfk_3` FOREIGN KEY (`programm_id`) REFERENCES `event_programm` (`id`),
  ADD CONSTRAINT `event_schedule_ibfk_5` FOREIGN KEY (`item_id`) REFERENCES `event_item` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_schedule_practice`
--
ALTER TABLE `event_schedule_practice`
  ADD CONSTRAINT `event_schedule_practice_ibfk_1` FOREIGN KEY (`practice_id`) REFERENCES `event_practice` (`id`),
  ADD CONSTRAINT `event_schedule_practice_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `event_schedule` (`id`);

--
-- Ограничения внешнего ключа таблицы `event_schedule_users`
--
ALTER TABLE `event_schedule_users`
  ADD CONSTRAINT `event_schedule_users_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `event_schedule` (`id`),
  ADD CONSTRAINT `event_schedule_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_album` FOREIGN KEY (`album_id`) REFERENCES `media_album` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_album`
--
ALTER TABLE `media_album`
  ADD CONSTRAINT `fk_album_category` FOREIGN KEY (`category_id`) REFERENCES `media_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_album_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_album_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_album_lang`
--
ALTER TABLE `media_album_lang`
  ADD CONSTRAINT `fk_media_album_lang` FOREIGN KEY (`media_album_id`) REFERENCES `media_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_category`
--
ALTER TABLE `media_category`
  ADD CONSTRAINT `fk_media_category_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_category_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_category_lang`
--
ALTER TABLE `media_category_lang`
  ADD CONSTRAINT `fk_media_category_lang` FOREIGN KEY (`media_category_id`) REFERENCES `media_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_lang`
--
ALTER TABLE `media_lang`
  ADD CONSTRAINT `fk_media_lang` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_manager`
--
ALTER TABLE `media_manager`
  ADD CONSTRAINT `media_manager_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media_upload`
--
ALTER TABLE `media_upload`
  ADD CONSTRAINT `fk_media_upload_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD CONSTRAINT `fk_menu_lang` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_link`
--
ALTER TABLE `menu_link`
  ADD CONSTRAINT `fk_menu_link` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_menu_link_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_link_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_link_lang`
--
ALTER TABLE `menu_link_lang`
  ADD CONSTRAINT `fk_menu_link_lang` FOREIGN KEY (`link_id`) REFERENCES `menu_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`source_id`) REFERENCES `message_source` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD CONSTRAINT `fk_page_lang` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD CONSTRAINT `portfolio_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `portfolio_category` (`id`);

--
-- Ограничения внешнего ключа таблицы `portfolio_menu_category`
--
ALTER TABLE `portfolio_menu_category`
  ADD CONSTRAINT `portfolio_menu_category_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `portfolio_menu` (`id`),
  ADD CONSTRAINT `portfolio_menu_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `portfolio_category` (`id`);

--
-- Ограничения внешнего ключа таблицы `section_block`
--
ALTER TABLE `section_block`
  ADD CONSTRAINT `section_block_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `section_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section_item`
--
ALTER TABLE `section_item`
  ADD CONSTRAINT `section_item_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `section_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
