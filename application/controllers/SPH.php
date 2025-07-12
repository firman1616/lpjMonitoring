<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPH extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_SPH','sph');
    }

	public function index()
	{
        $data = [
            'title' => 'SPH',
            'table_title' => 'SPH List',
            'conten' => 'sph/index',
            'footer_js' => array('assets/js/sph.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableSPH()
    {
        $data['sph'] = $this->sph->getSPH()->result();

        echo json_encode($this->load->view('sph/sph-table',$data,false));
    }

    function cetak_inv($inv)  {
        $header_data = $this->inv->cetak_inv($inv)->result();
        $detail_data = $this->inv->det_inv($inv)->result();
        $name = !empty($header_data) && isset($header_data[0]->number) ? $header_data[0]->number : $inv;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_inv' => $header_data,
            'det_inv' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('inv/cetak_inv', $data, true);
        $this->pdf->createPDF($html, $name);
    }
}