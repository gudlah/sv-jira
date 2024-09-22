<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ChartModel', 'cm');
	}
	public function index() {
		$this->load->view('chart', [
            'id'    => 2,
			'judul'	=> 'Chart'
		]);
	}

    public function all() {
        $datas = $this->cm->getAll();
        for($i=0; $i<count($datas); $i++) {
            $datas[$i]['duration'] = ($datas[$i]['duration'] != null)? (int)$datas[$i]['duration'] : null;
            $datas[$i]['progress'] = (float)$datas[$i]['progress'];
            $datas[$i]['open'] = (bool)$datas[$i]['open'];
        }
        res(200, [
            'data' => $datas
        ]);
    }
}