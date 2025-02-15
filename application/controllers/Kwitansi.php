<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_Kwitansi','kwitansi');
    }

	public function index()
	{
        $data = [
            'title' => 'Kwitansi',
            'table_title' => 'Kwitansi List',
            'conten' => 'kwitansi/index',
            'footer_js' => array('assets/js/kwitansi.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableKwitansi()
    {
        $data['kwitansi'] = $this->kwitansi->getKwitansi()->result();

        echo json_encode($this->load->view('kwitansi/kwitansi-table',$data,false));
    }

    function cetak_kwitansi()  {
        // $header_data = $this->inv->cetak_inv($inv)->result();
        // $detail_data = $this->inv->det_inv($inv)->result();
        // $name = !empty($header_data) && isset($header_data[0]->number) ? $header_data[0]->number : $inv;
        $name = '123';
        $data = [
            'title' => $name,
            'header_inv' => '$header_data',
            'det_inv' => '$detail_data',
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('kwitansi/cetak_kwitansi', $data, TRUE);
        $this->pdf->createPDF($html, $name, false);
    }
}