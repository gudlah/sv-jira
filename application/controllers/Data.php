<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('DataModel', 'dm');
	}
	public function index() {
		$this->load->view('data', [
			'judul'	=> 'Data',
		]);
	}

	public function users() {
		$users = $this->GeneralModel->getAll('jira_users')->result_array();
		res(200, $users);
	}

	public function priorities() {
		$priorities = $this->GeneralModel->getAll('jira_priorities')->result_array();
		res(200, $priorities);
	}

	public function projects() {
		$projects = $this->GeneralModel->getAll('jira_projects')->result_array();
		res(200, $projects);
	}

	public function boards() {
		res(200, $this->dm->getAllBoards());
	}

	public function sprints() {
		res(200, $this->dm->getAllSprints());
	}

	public function columns() {
		res(200, $this->dm->getAllColumns());
	}

	public function cards() {
		res(200, $this->dm->getAllCards());
	}

	public function comments() {
		res(200, $this->dm->getAllComments());
	}

	public function attachments() {
		res(200, $this->dm->getAllAttachments());
	}

	public function subtasks() {
		res(200, $this->dm->getAllSubtasks());
	}
}
