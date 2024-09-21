<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('DataModel', 'dm');
	}
	public function index() {
		$this->load->view('chart', [
			'judul'	=> 'Chart',
		]);
	}
}
