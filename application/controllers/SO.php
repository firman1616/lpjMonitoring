<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SO extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_SO','so');
    }

	public function index()
	{
        $data = [
            'title' => 'Sales Order',
            'table_title' => 'Sale Order List',
            'conten' => 'so/index',
            'footer_js' => array('assets/js/so.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableSO()
    {
        $data['so'] = $this->so->getSO()->result();

        echo json_encode($this->load->view('so/so-table',$data,false));
    }

    function cetak_so($so)  {
        $header_data = $this->so->cetak_so($so)->result();
        $detail_data = $this->so->cetak_so_detail($so)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $so;
        $data = [
            'title' => $name,
            'header_so' => $header_data,
            'det_so' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        // $this->load->view('po/print-po', $data, TRUE);s
        $html = $this->load->view('so/cetak_so', $data, TRUE);
        $this->pdf->createPDF($html, $name);
    }
}