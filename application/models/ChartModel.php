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
            SELECT CONCAT('column', jira_columns.column_id) AS id, jira_columns.column_name AS TEXT, jira_sprints.sprint_start_date AS start_date, DATEDIFF(jira_sprints.sprint_end_date, jira_sprints.sprint_start_date) AS duration, CONCAT('sprint', jira_columns.sprint_id) AS parent, 0 AS progress, true AS open
            FROM jira_columns
            JOIN jira_sprints ON jira_sprints.sprint_id = jira_columns.sprint_id
            UNION ALL
            SELECT CONCAT('card', jira_cards.card_key) AS id, jira_cards.card_title AS TEXT, jira_cards.card_started AS start_date, DATEDIFF(jira_sprints.sprint_end_date, jira_cards.card_started) AS duration, CONCAT('column', jira_cards.column_id) AS parent, jira_columns.persen AS progress, true AS open
            FROM jira_cards
            JOIN jira_columns ON jira_columns.column_id = jira_cards.column_id
            JOIN jira_sprints ON jira_sprints.sprint_id = jira_columns.sprint_id
            UNION ALL
            SELECT CONCAT('subtask', jira_sub_tasks.sub_task_id) AS id, jira_sub_tasks.sub_task_title AS TEXT, jira_sub_tasks.sub_task_started AS start_date, DATEDIFF(jira_sprints.sprint_end_date, jira_sub_tasks.sub_task_started) AS duration, CONCAT('card', jira_sub_tasks.card_key) AS parent, tabelStatus.persen AS progress, FALSE AS OPEN
            FROM jira_sub_tasks
            JOIN (SELECT column_id, column_name, persen FROM jira_columns) AS tabelStatus ON tabelStatus.column_id = jira_sub_tasks.status_id
            JOIN jira_cards ON jira_cards.card_key = jira_sub_tasks.card_key
            JOIN jira_columns ON jira_columns.column_id = jira_cards.column_id
            JOIN jira_sprints ON jira_sprints.sprint_id = jira_columns.sprint_id")
            ->result_array();
    }

    public function getAllCard() {
        return $this->db->select('card_key')
            ->get('jira_cards')
            ->result_array();
    }

    public function getAllSubTask($cardKey) {
        return $this->db->select('CONCAT("subtask", sub_task_id) AS sub_task_id, card_key, sub_task_title')
            ->where('card_key', $cardKey)
            ->get('jira_sub_tasks')
            ->result_array();
    }
}