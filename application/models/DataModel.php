<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_Model {
    public function getAllBoards() {
        return $this->db->select('jira_boards.board_id, jira_projects.project_name, jira_boards.board_name, jira_boards.board_type')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->get('jira_boards')
            ->result_array();
    }

    public function getAllSprints() {
        return $this->db->select('jira_sprints.*, jira_boards.board_name, jira_projects.project_name')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->get('jira_sprints')
            ->result_array();
    }

    public function getAllColumns() {
        return $this->db->select('jira_columns.*, jira_sprints.sprint_name, jira_boards.board_name, jira_projects.project_name')
            ->join('jira_sprints', 'jira_sprints.sprint_id = jira_columns.sprint_id')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->get('jira_columns')
            ->result_array();
    }

    public function getAllCards() {
        return $this->db->select('jira_cards.card_id, card_title, jira_cards.card_key, jira_cards.card_description, jira_cards.card_created, jira_cards.card_updated, IF(jira_cards.card_resolved="0000-00-00 00:00:00", "-", card_resolved) AS card_resolved, jira_columns.column_name, jira_sprints.sprint_name, jira_boards.board_name, jira_projects.project_name, jira_priorities.priority_name, jira_users.user_display_name AS creator_name, IFNULL(tabelAssignee.user_display_name, "Unassigned") AS assignee_name, tabelReporter.user_display_name AS reporter_name')
            ->join('jira_columns', 'jira_columns.column_id = jira_cards.column_id')
            ->join('jira_sprints', 'jira_sprints.sprint_id = jira_columns.sprint_id')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->join('jira_priorities', 'jira_priorities.priority_id = jira_cards.priority_id')
            ->join('jira_users', 'jira_users.user_id = jira_cards.creator_id')
            ->join('(SELECT * FROM jira_users) AS tabelAssignee', 'tabelAssignee.user_id = jira_cards.assignee_id', 'left')
            ->join('(SELECT * FROM jira_users) AS tabelReporter', 'tabelReporter.user_id = jira_cards.reporter_id', 'left')
            ->get('jira_cards')
            ->result_array();
    }

    public function getAllComments() {
        return $this->db->select('jira_comments.comment_id, jira_comments.comment_body, jira_comments.comment_created, jira_comments.comment_updated, jira_cards.card_title, jira_columns.column_name, jira_sprints.sprint_name, jira_boards.board_name, jira_projects.project_name,jira_users.user_display_name AS author_name')
            ->join('jira_cards', 'jira_cards.card_id = jira_comments.card_id')
            ->join('jira_columns', 'jira_columns.column_id = jira_cards.column_id')
            ->join('jira_sprints', 'jira_sprints.sprint_id = jira_columns.sprint_id')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->join('jira_users', 'jira_users.user_id = jira_comments.author_id')
            ->get('jira_comments')
            ->result_array();
    }

    public function getAllAttachments() {
        return $this->db->select('jira_attachments.attachment_id, jira_attachments.attachment_file_name, jira_attachments.attachment_url, jira_attachments.attachment_created, jira_cards.card_title, jira_columns.column_name, jira_sprints.sprint_name, jira_boards.board_name, jira_projects.project_name,jira_users.user_display_name AS author_name')
            ->join('jira_cards', 'jira_cards.card_id = jira_attachments.card_id')
            ->join('jira_columns', 'jira_cards.column_id = jira_cards.column_id')
            ->join('jira_sprints', 'jira_sprints.sprint_id = jira_columns.sprint_id')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->join('jira_users', 'jira_users.user_id = jira_attachments.author_id')
            ->get('jira_attachments')
            ->result_array();
    }

    public function getAllSubtasks() {
        return $this->db->select('jira_sub_tasks.sub_task_id, jira_cards.card_title, jira_sub_tasks.sub_task_key, jira_sub_tasks.sub_task_title, jira_sub_tasks.sub_task_description, jira_sub_tasks.sub_task_created, jira_sub_tasks.sub_task_updated, IF(jira_sub_tasks.sub_task_resolved="0000-00-00 00:00:00", "-", jira_sub_tasks.sub_task_resolved) AS sub_task_resolved, jira_columns.column_name, jira_sprints.sprint_name, jira_boards.board_name, jira_projects.project_name, jira_priorities.priority_name, jira_users.user_display_name AS creator_name, IFNULL(tabelAssignee.user_display_name, "Unassigned") AS assignee_name, tabelReporter.user_display_name AS reporter_name, tabelStatus.column_name AS status')
            ->join('jira_cards', 'jira_cards.card_key = jira_sub_tasks.card_key')
            ->join('jira_columns', 'jira_columns.column_id = jira_cards.column_id')
            ->join('jira_sprints', 'jira_sprints.sprint_id = jira_columns.sprint_id')
            ->join('jira_boards', 'jira_boards.board_id = jira_sprints.board_id')
            ->join('jira_projects', 'jira_projects.project_id = jira_boards.project_id')
            ->join('jira_priorities', 'jira_priorities.priority_id = jira_sub_tasks.priority_id')
            ->join('jira_users', 'jira_users.user_id = jira_sub_tasks.creator_id')
            ->join('(SELECT * FROM jira_users) AS tabelAssignee', 'tabelAssignee.user_id = jira_sub_tasks.assignee_id', 'left')
            ->join('(SELECT * FROM jira_users) AS tabelReporter', 'tabelReporter.user_id = jira_sub_tasks.reporter_id', 'left')
            ->join('(SELECT * FROM jira_columns) AS tabelStatus', 'tabelStatus.column_id = jira_sub_tasks.status_id')
            ->get('jira_sub_tasks')
            ->result_array();
    }
}