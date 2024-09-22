-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 08:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sv_jira`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` varchar(100) NOT NULL,
  `id_request` varchar(100) DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `client_ip` varchar(100) DEFAULT NULL,
  `endpoint` varchar(100) DEFAULT NULL,
  `response_code` varchar(100) DEFAULT NULL,
  `body_request` text DEFAULT NULL,
  `body_response` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_blockeds`
--

CREATE TABLE `ip_blockeds` (
  `id` varchar(255) NOT NULL,
  `client_ip` varchar(255) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jira_attachments`
--

CREATE TABLE `jira_attachments` (
  `attachment_id` varchar(10) NOT NULL,
  `card_id` varchar(10) DEFAULT NULL,
  `attachment_file_name` varchar(100) DEFAULT NULL,
  `attachment_url` text DEFAULT NULL,
  `author_id` varchar(100) DEFAULT NULL,
  `attachment_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_attachments`
--

INSERT INTO `jira_attachments` (`attachment_id`, `card_id`, `attachment_file_name`, `attachment_url`, `author_id`, `attachment_created`) VALUES
('10000', '10000', 'Modul 3 Pengembangan TI.pdf', 'https://it-team-sharingvision.atlassian.net/rest/api/2/attachment/content/10000', '6212f56f468c2e00716df01c', '2024-09-06 11:06:47'),
('10001', '10032', 'root_cause_analysis_problem_solving_monotone_icon_in_powerpoint_pptx_png_and_editable_eps_format_sli', 'https://it-team-sharingvision.atlassian.net/rest/api/2/attachment/content/10001', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-12 02:50:42'),
('10002', '10032', 'New Project.png', 'https://it-team-sharingvision.atlassian.net/rest/api/2/attachment/content/10002', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-12 02:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `jira_boards`
--

CREATE TABLE `jira_boards` (
  `board_id` int(100) NOT NULL,
  `project_id` varchar(100) DEFAULT NULL,
  `board_name` varchar(100) DEFAULT NULL,
  `board_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_boards`
--

INSERT INTO `jira_boards` (`board_id`, `project_id`, `board_name`, `board_type`) VALUES
(1, '10000', 'SCRUM board', 'simple'),
(3, '10003', 'HV board', 'simple'),
(4, '10004', 'DJM board', 'simple');

-- --------------------------------------------------------

--
-- Table structure for table `jira_cards`
--

CREATE TABLE `jira_cards` (
  `card_id` varchar(10) NOT NULL,
  `column_id` varchar(10) DEFAULT NULL,
  `card_title` varchar(255) DEFAULT NULL,
  `card_key` varchar(10) DEFAULT NULL,
  `card_description` longtext DEFAULT NULL,
  `card_type_id` varchar(10) DEFAULT NULL,
  `priority_id` int(11) DEFAULT NULL,
  `assignee_id` varchar(100) DEFAULT NULL,
  `creator_id` varchar(100) DEFAULT NULL,
  `reporter_id` varchar(100) DEFAULT NULL,
  `card_created` datetime DEFAULT NULL,
  `card_updated` datetime DEFAULT NULL,
  `card_started` datetime DEFAULT NULL,
  `card_resolved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_cards`
--

INSERT INTO `jira_cards` (`card_id`, `column_id`, `card_title`, `card_key`, `card_description`, `card_type_id`, `priority_id`, `assignee_id`, `creator_id`, `reporter_id`, `card_created`, `card_updated`, `card_resolved`) VALUES
('10000', '10001', 'Parsing-Task', 'SV-1', 'Something here is a description hehe…', '10001', 3, '6212f56f468c2e00716df01c', '6212f56f468c2e00716df01c', '6212f56f468c2e00716df01c', '2024-09-06 11:04:14', '2024-09-10 18:53:22', '0000-00-00 00:00:00'),
('10006', '10001', 'Develop fitur A', 'SV-7', '', '10001', 3, '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-06 14:15:52', '2024-09-11 16:50:00', '0000-00-00 00:00:00'),
('10032', '10001', 'Development Fitur : Cek Hari Libur', 'SV-11', 'apa', '10001', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:28:23', '2024-09-16 02:30:07', '0000-00-00 00:00:00'),
('10046', '10012', 'Initialize Application', 'HV-1', 'get data from api with golang', '10014', 3, '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-10 00:56:42', '2024-09-18 14:24:51', '2024-09-11 16:53:01'),
('10047', '10011', 'API get data by sprint', 'HV-2', 'insert data from API with golang', '10014', 4, '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-10 01:00:08', '2024-09-18 14:25:02', '0000-00-00 00:00:00'),
('10048', '10012', 'Download csv', 'HV-3', 'download data to csv from API with golang', '10014', 1, '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-10 01:01:48', '2024-09-18 14:25:04', '2024-09-11 16:53:00'),
('10050', '10011', 'API get data by Issue', 'HV-5', '', '10014', 3, '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-11 16:53:32', '2024-09-18 14:25:11', '0000-00-00 00:00:00'),
('10051', '10010', 'Deployment to dev', 'HV-6', 'test description', '10014', 2, '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-11 16:55:02', '2024-09-18 14:26:40', '0000-00-00 00:00:00'),
('10052', '10001', 'Bug fixing fitur A', 'SV-25', '', '10002', 3, '6212f56f468c2e00716df01c', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-11 17:07:37', '2024-09-18 13:21:16', '0000-00-00 00:00:00'),
('10053', '10000', 'Coba lagi', 'SV-26', '', '10001', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-12 22:36:28', '2024-09-16 12:02:31', '0000-00-00 00:00:00'),
('10055', '10002', 'oke', 'SV-27', 'okay', '10001', 3, '', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-16 02:26:59', '2024-09-17 21:34:02', '2024-09-16 02:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `jira_columns`
--

CREATE TABLE `jira_columns` (
  `column_id` varchar(10) NOT NULL,
  `sprint_id` varchar(10) DEFAULT NULL,
  `column_name` varchar(100) DEFAULT NULL,
  `persen` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_columns`
--

INSERT INTO `jira_columns` (`column_id`, `sprint_id`, `column_name`, `persen`) VALUES
('10000', '1', 'To Do', 0),
('10001', '1', 'In Progress', 0.5),
('10002', '1', 'Done', 1),
('10010', '3', 'To Do', 0),
('10011', '3', 'In Progress', 0.666667),
('10012', '3', 'Done', 1),
('10013', '1', 'Coba', 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `jira_comments`
--

CREATE TABLE `jira_comments` (
  `comment_id` varchar(10) NOT NULL,
  `card_id` varchar(10) DEFAULT NULL,
  `author_id` varchar(100) DEFAULT NULL,
  `comment_body` longtext DEFAULT NULL,
  `comment_created` datetime DEFAULT NULL,
  `comment_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_comments`
--

INSERT INTO `jira_comments` (`comment_id`, `card_id`, `author_id`, `comment_body`, `comment_created`, `comment_updated`) VALUES
('10000', '10000', '6212f56f468c2e00716df01c', 'THIS IS COMMENT ASDASDASDASDASDASDAS', '2024-09-10 18:09:33', '2024-09-10 18:09:33'),
('10001', '10046', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'Success get data from api with golang', '2024-09-12 14:07:44', '2024-09-12 14:07:44'),
('10002', '10047', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'Token is invalid', '2024-09-12 14:12:27', '2024-09-12 14:12:27'),
('10003', '10048', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'download csv to server', '2024-09-12 14:12:57', '2024-09-12 14:12:57'),
('10004', '10051', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'deploy test', '2024-09-13 13:06:04', '2024-09-13 13:06:04'),
('10005', '10050', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'api test', '2024-09-13 13:06:17', '2024-09-13 13:06:17'),
('10006', '10050', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', 'api test 2', '2024-09-14 20:36:39', '2024-09-14 20:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `jira_priorities`
--

CREATE TABLE `jira_priorities` (
  `priority_id` int(11) NOT NULL,
  `priority_name` varchar(100) DEFAULT NULL,
  `priority_description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_priorities`
--

INSERT INTO `jira_priorities` (`priority_id`, `priority_name`, `priority_description`) VALUES
(1, 'Highest', 'This problem will block progress.'),
(2, 'High', 'Serious problem that could block progress.'),
(3, 'Medium', 'Has the potential to affect progress.'),
(4, 'Low', 'Minor problem or easily worked around.'),
(5, 'Lowest', 'Trivial problem with little or no impact on progress.');

-- --------------------------------------------------------

--
-- Table structure for table `jira_projects`
--

CREATE TABLE `jira_projects` (
  `project_id` varchar(50) NOT NULL,
  `project_key` varchar(50) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `project_type_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_projects`
--

INSERT INTO `jira_projects` (`project_id`, `project_key`, `project_name`, `project_type_key`) VALUES
('10000', 'SV', 'Parsing-API', 'software'),
('10002', 'GTMS', 'Go to market sample', 'business'),
('10003', 'HV', 'Husen-v1', 'software'),
('10004', 'DJM', 'Dashboard Jira Management', 'software');

-- --------------------------------------------------------

--
-- Table structure for table `jira_sprints`
--

CREATE TABLE `jira_sprints` (
  `sprint_id` int(11) NOT NULL,
  `board_id` int(11) DEFAULT NULL,
  `sprint_state` varchar(100) DEFAULT NULL,
  `sprint_name` varchar(100) DEFAULT NULL,
  `sprint_start_date` datetime DEFAULT NULL,
  `sprint_end_date` datetime DEFAULT NULL,
  `sprint_created_date` datetime DEFAULT NULL,
  `sprint_goal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_sprints`
--

INSERT INTO `jira_sprints` (`sprint_id`, `board_id`, `sprint_state`, `sprint_name`, `sprint_start_date`, `sprint_end_date`, `sprint_created_date`, `sprint_goal`) VALUES
(1, 1, 'active', 'SCRUM Sprint 1', '2024-09-06 11:06:01', '2024-09-13 11:06:48', '2024-09-06 11:03:22', 'End the parsing'),
(3, 3, 'active', 'HV Sprint 1', '2024-09-10 00:58:55', '2024-09-24 00:58:31', '2024-09-10 00:55:03', 'get from API with golang');

-- --------------------------------------------------------

--
-- Table structure for table `jira_sub_tasks`
--

CREATE TABLE `jira_sub_tasks` (
  `sub_task_id` varchar(10) NOT NULL,
  `card_key` varchar(50) DEFAULT NULL,
  `sub_task_key` varchar(10) DEFAULT NULL,
  `sub_task_title` varchar(100) DEFAULT NULL,
  `sub_task_description` longtext DEFAULT NULL,
  `status_id` varchar(10) DEFAULT NULL,
  `priority_id` int(11) DEFAULT NULL,
  `creator_id` varchar(100) DEFAULT NULL,
  `reporter_id` varchar(100) DEFAULT NULL,
  `assignee_id` varchar(100) DEFAULT NULL,
  `sub_task_created` datetime DEFAULT NULL,
  `sub_task_updated` datetime DEFAULT NULL,
  `sub_task_started` datetime DEFAULT NULL,
  `sub_task_resolved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_sub_tasks`
--

INSERT INTO `jira_sub_tasks` (`sub_task_id`, `card_key`, `sub_task_key`, `sub_task_title`, `sub_task_description`, `status_id`, `priority_id`, `creator_id`, `reporter_id`, `assignee_id`, `sub_task_created`, `sub_task_updated`, `sub_task_resolved`) VALUES
('10002', 'SV-1', 'SV-3', 'Req Gathering', '', '10001', 3, '6212f56f468c2e00716df01c', '6212f56f468c2e00716df01c', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-06 11:05:53', '2024-09-06 14:21:41', '0000-00-00 00:00:00'),
('10003', 'SV-1', 'SV-4', 'Development', '', '10002', 3, '6212f56f468c2e00716df01c', '6212f56f468c2e00716df01c', '712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '2024-09-06 11:06:01', '2024-09-11 09:19:45', '2024-09-11 09:19:45'),
('10007', 'SV-7', 'SV-8', 'design', '', '10002', 3, '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-06 14:16:16', '2024-09-06 14:31:08', '2024-09-06 14:18:57'),
('10008', 'SV-7', 'SV-9', 'develop', '', '10002', 3, '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-06 14:16:22', '2024-09-18 13:20:43', '2024-09-18 13:20:43'),
('10009', 'SV-7', 'SV-10', 'deploy', '', '10001', 3, '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '2024-09-06 14:16:40', '2024-09-18 13:20:40', '0000-00-00 00:00:00'),
('10033', 'SV-11', 'SV-12', 'Flow Design', '', '10002', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:32:21', '2024-09-10 04:48:14', '2024-09-10 04:48:14'),
('10034', 'SV-11', 'SV-13', 'Conversation Design', 'tes', '10002', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:33:20', '2024-09-20 08:44:17', '2024-09-10 04:48:19'),
('10035', 'SV-11', 'SV-14', 'Create Test Case', '', '10002', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:33:47', '2024-09-11 05:45:00', '2024-09-11 05:45:00'),
('10036', 'SV-11', 'SV-15', 'Development API', '', '10002', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:34:30', '2024-09-12 13:32:03', '2024-09-12 13:32:03'),
('10037', 'SV-11', 'SV-16', 'Development Process Flow', '', '10001', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:35:40', '2024-09-12 22:35:35', '0000-00-00 00:00:00'),
('10038', 'SV-11', 'SV-17', 'Load Test', '', '10001', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:37:03', '2024-09-21 17:30:40', '0000-00-00 00:00:00'),
('10039', 'SV-11', 'SV-18', 'SIT', '', '10002', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '2024-09-08 03:37:24', '2024-09-12 22:35:32', '2024-09-12 22:35:27'),
('10040', 'SV-11', 'SV-19', 'Fixing', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:37:59', '2024-09-08 03:40:36', '0000-00-00 00:00:00'),
('10041', 'SV-11', 'SV-20', 'Regression', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:38:24', '2024-09-08 03:40:40', '0000-00-00 00:00:00'),
('10042', 'SV-11', 'SV-21', 'UAT', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:38:46', '2024-09-08 03:40:43', '0000-00-00 00:00:00'),
('10043', 'SV-11', 'SV-22', 'Deployment', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:39:05', '2024-09-08 03:40:49', '0000-00-00 00:00:00'),
('10044', 'SV-11', 'SV-23', 'Post Test', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:39:19', '2024-09-08 03:40:52', '0000-00-00 00:00:00'),
('10045', 'SV-11', 'SV-24', 'Collect LC Testing', '', '10000', 3, '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '712020:1af3618d-09c5-40f0-991e-23e644b9f220', '', '2024-09-08 03:42:49', '2024-09-08 03:43:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jira_users`
--

CREATE TABLE `jira_users` (
  `user_id` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_display_name` varchar(100) DEFAULT NULL,
  `user_active` tinyint(1) DEFAULT NULL,
  `user_locale` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jira_users`
--

INSERT INTO `jira_users` (`user_id`, `user_email`, `user_display_name`, `user_active`, `user_locale`) VALUES
('6212f56f468c2e00716df01c', '', 'Taofik Rakhman Sudrajat', 1, 'en_US'),
('712020:1af3618d-09c5-40f0-991e-23e644b9f220', 'bagus.anjar@it.sharingvision.com', 'Bagus Anjar Sadewa', 1, 'en_US'),
('712020:72fc1709-040c-461d-bb9f-dbdee7ef4777', '', 'Ivan Firmansyah', 1, 'en_GB'),
('712020:cb40e252-2d4d-4a07-bfe1-b00114b76ecd', '', 'Muhamad Husen Almuntazhor', 1, 'en_US');

-- --------------------------------------------------------

--
-- Table structure for table `service_users`
--

CREATE TABLE `service_users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_users`
--

INSERT INTO `service_users` (`id`, `username`, `password`, `is_active`, `created_at`) VALUES
('b0577d97-3a3d-44c9-a82f-0ff348ca951d', 'svi', '$2a$12$HUUsrBqls5p8Sh3TxmKV0uPQjTsXa2p.O9Uob2G6iJFa.g/z5mAJu', 1, '2024-09-09 12:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

CREATE TABLE `symbols` (
  `id` int(11) NOT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `symbol`) VALUES
(1, '`'),
(2, '--'),
(6, '%'),
(7, ';'),
(8, '+'),
(9, '||'),
(10, '='),
(11, '>'),
(12, '<'),
(13, '<='),
(14, '>='),
(15, '=='),
(16, '<>'),
(17, '!='),
(19, '^^'),
(20, '&&'),
(21, '{'),
(22, '}'),
(23, '('),
(24, ')'),
(27, "'"),
(28, '"'),
(29, '?'),
(30, '!'),
(31, '['),
(32, ']'),
(33, '*');

-- --------------------------------------------------------

--
-- Table structure for table `upstream_service_request_log`
--

CREATE TABLE `upstream_service_request_log` (
  `id` varchar(100) NOT NULL,
  `id_request` varchar(100) DEFAULT NULL,
  `request_payload` longtext DEFAULT NULL,
  `response_payload` longtext DEFAULT NULL,
  `is_success` int(11) DEFAULT NULL,
  `response_timestamp` datetime DEFAULT NULL,
  `request_timestamp` datetime DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_blockeds`
--
ALTER TABLE `ip_blockeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jira_attachments`
--
ALTER TABLE `jira_attachments`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `jira_boards`
--
ALTER TABLE `jira_boards`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `jira_cards`
--
ALTER TABLE `jira_cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `jira_columns`
--
ALTER TABLE `jira_columns`
  ADD PRIMARY KEY (`column_id`);

--
-- Indexes for table `jira_comments`
--
ALTER TABLE `jira_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `jira_priorities`
--
ALTER TABLE `jira_priorities`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `jira_projects`
--
ALTER TABLE `jira_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `jira_sprints`
--
ALTER TABLE `jira_sprints`
  ADD PRIMARY KEY (`sprint_id`);

--
-- Indexes for table `jira_sub_tasks`
--
ALTER TABLE `jira_sub_tasks`
  ADD PRIMARY KEY (`sub_task_id`);

--
-- Indexes for table `jira_users`
--
ALTER TABLE `jira_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `service_users`
--
ALTER TABLE `service_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symbols`
--
ALTER TABLE `symbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upstream_service_request_log`
--
ALTER TABLE `upstream_service_request_log`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
