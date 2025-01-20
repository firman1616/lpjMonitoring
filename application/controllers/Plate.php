<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        $this->load->model('M_Plate','plate');
    }

	public function index()
	{
        $data = [
            'title' => 'Plate',
            'table_title' => 'Plate List',
            'conten' => 'plate/index',
            'footer_js' => array('assets/js/plate.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tablePlate()
    {
        $data['plate'] = $this->plate->getPlate()->result();

        echo json_encode($this->load->view('plate/plate-table', $data,false));
    }

    function getLot($id) {
        $data = [
            'title' => 'Plate Lot',
            'table_name' => 'Plate Lot List',
            'conten' => 'plate/detail/lot-detail',
            'get_lot' => $this->plate->get_plate_pldc($id),
            'footer_js' => array('assets/js/plate.js')
        ];
        $this->load->view('template/conten',$data);
    }

    // function tableDetailLot()
    // {
    //     $data['pldc_lot'] = $this->plate->get_plate_pldc()->result();

    //     echo json_encode($this->load->view('plate/detail/lot-detail-table',$data,false));
    // }
}