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

    function cetak_sph($sph)  {
        $header_data = $this->sph->cetak_sph($sph)->result();
        $detail_data = $this->sph->det_sph($sph)->result();
        $name = !empty($header_data) && isset($header_data[0]->no_sph) ? $header_data[0]->no_sph : $sph;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_sph' => $header_data,
            'det_sph' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('sph/cetak_sph', $data, true);
        $this->pdf->createPDF($html, $name, FALSE);
    }
}