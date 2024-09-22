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
        $this->_buildDataLink($datas);
        res(200, [
            'data'  => $datas,
            'links' => $this->_buildDataLink()
        ]);
    }

    private function _buildDataLink() {
        $links = [];
        $cards = $this->cm->getAllCard();
        foreach($cards as $card) {
            $subTasks = $this->cm->getAllSubTask($card['card_key']);
            $jumlahSubTasks = count($subTasks);
            if($jumlahSubTasks > 1) {
                $i = 0;
                foreach($subTasks as $st) {
                    if($i < $jumlahSubTasks-1) {
                        array_push($links, [
                            'id'        => $st['sub_task_id'].($i+1),
                            'source'    => $st['sub_task_id'],
                            'target'    => $subTasks[$i+1]['sub_task_id'],
                            'type'      => '0',
                            'sub_task_title'    => $st['sub_task_title']
                        ]);
                    }
                    $i++;
                }
            }
        }
        return $links;
    }
}