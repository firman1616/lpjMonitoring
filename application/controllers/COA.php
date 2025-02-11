<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COA extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_COA','coa');
    }

	public function index()
	{
        $data = [
            'title' => 'CoA',
            'table_title' => 'COA List',
            'conten' => 'coa/index',
            'footer_js' => array('assets/js/coa.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableCOA()
    {
        $data['coa'] = $this->coa->getCOA()->result();

        echo json_encode($this->load->view('coa/coa-table',$data,false));
    }

    function cetak_coa($coa)  {
        $header_data = $this->coa->cetak_coa($coa)->result();
        $detail_data = $this->coa->det_coa($coa)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $coa;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_coa' => $header_data,
            'det_coa' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('coa/cetak_coa', $data, TRUE);
        $this->pdf->createPDF($html, $name,false);
    }
}