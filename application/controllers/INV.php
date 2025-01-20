<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class INV extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_INV','inv');
    }

	public function index()
	{
        $data = [
            'title' => 'Invoice',
            'table_title' => 'Invoice List',
            'conten' => 'inv/index',
            'footer_js' => array('assets/js/inv.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableINV()
    {
        $data['inv'] = $this->inv->getINV()->result();

        echo json_encode($this->load->view('inv/inv-table',$data,false));
    }

    function cetak_inv($inv)  {
        $header_data = $this->inv->cetak_inv($inv)->result();
        // $detail_data = $this->so->cetak_so_detail($so)->result();
        $name = !empty($header_data) && isset($header_data[0]->number) ? $header_data[0]->number : $inv;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_inv' => $header_data,
            // 'det_so' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('inv/cetak_inv', $data, TRUE);
        $this->pdf->createPDF($html, $name, false);
    }
}