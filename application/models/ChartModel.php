<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChartModel extends CI_Model {
    public function getAll() {
        return $this->db->query("SELECT CONCAT('project', project_id) AS id, project_name AS text, NULL AS start_date, NULL AS duration, 0 AS parent, 0 AS progress, true AS open
            FROM jira_projects
            UNION ALL
            SELECT CONCAT('board', board_id) AS id, board_name AS text, NULL AS start_date, NULL AS duration, CONCAT('project', project_id) AS parent, 0 AS progress, true AS open
            FROM jira_boards
            UNION ALL
            SELECT CONCAT('sprint', sprint_id) AS id, sprint_name AS text, NULL AS start_date, NULL AS duration, CONCAT('board', board_id) AS parent, 0 AS progress, true AS open
            FROM jira_sprints
            UNION ALL
            SELECT CONCAT('column', column_id) AS id, column_name AS text, NULL AS start_date, NULL AS duration, CONCAT('sprint', sprint_id) AS parent, 0 AS progress, true AS open
            FROM jira_columns
            UNION ALL
            SELECT CONCAT('card', card_key) AS id, card_title AS text, card_created AS start_date, 10 AS duration, CONCAT('column', jira_cards.column_id) AS parent, jira_columns.persen AS progress, true AS open
            FROM jira_cards
            JOIN jira_columns ON jira_columns.column_id = jira_cards.column_id
            UNION ALL
            SELECT CONCAT('subtask', sub_task_id) AS id, sub_task_title AS text, sub_task_created AS start_date, 10 AS duration, CONCAT('card', card_key) AS parent, jira_columns.persen AS progress, FALSE AS open
            FROM jira_sub_tasks
            JOIN jira_columns ON jira_columns.column_id = jira_sub_tasks.status_id")
            ->result_array();
    }
}